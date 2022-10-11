<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tax\TaxStoreRequest;
use App\Models\Country;
use App\Models\Tax;
use App\Models\TaxTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Traits\ActiveInactiveTrait;
use Illuminate\Support\Facades\App;

use App\Services\CountryService;
use App\Services\TaxService;

class TaxController extends Controller
{
    use ActiveInactiveTrait;

    private $countryService;
    public function __construct(CountryService $countryService, TaxService $taxService){
        $this->countryService = $countryService;
        $this->taxService     = $taxService;
    }

    // protected function test()
    // {
    //     $countries = $this->countryService->getAllCountry();
    //     $taxes     = $this->taxService->getAllTax();

    //     // $obj_merged = (object) array_merge((array) $countries, (array) $taxes);
    //     return $taxes;
    // }

    public function index(){

        // return $this->test();

        if (auth()->user()->can('tax-view')){
            $countries = $this->countryService->getAllCountry();
            return view('admin.pages.tax.index',compact('countries'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function dataTable(){
        return $this->taxService->dataTable();
    }

    public function store(TaxStoreRequest $request){
        return $this->taxService->taxStore($request);
    }



    public function edit(Request $request)
    {
        $locale = Session::get('currentLocal');
        $tax = Tax::find($request->tax_id);
        $taxTranslation = TaxTranslation::where('tax_id',$request->tax_id)->where('locale',$locale)->first();

        if (!isset($taxTranslation)) {
            $taxTranslation = TaxTranslation::where('tax_id',$request->tax_id)->where('locale','en')->first();
        }
        return response()->json(['tax' => $tax, 'taxTranslation'=>$taxTranslation]);
    }

    public function update(Request $request)
    {
        if (auth()->user()->can('tax-edit'))
        {
            $validator = Validator::make($request->only('tax_name','based_on','country','tax_class'),[
                'tax_class'  => 'required',
                'based_on'  => 'required',
                'country'  => 'required',
                'tax_name'  => 'required|unique:tax_translations,tax_name,'.$request->tax_translation_id,
            ]);

            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            if ($request->ajax())
            {
                $tax = [];
                $tax['country']  = $request->country;
                $tax['zip']      = $request->zip;
                $tax['rate']     = $request->rate;
                $tax['based_on'] = $request->based_on;
                $tax['is_active']= $request->is_active;

                DB::beginTransaction();
                try {
                    Tax::find($request->tax_id)->update($tax);

                    TaxTranslation::UpdateOrCreate(
                        [
                            'tax_id' => $request->tax_id,
                            'locale' => Session::get('currentLocal')
                        ],
                        [
                            'tax_class' => $request->tax_class,
                            'tax_name'  => $request->tax_name,
                            'state'     => $request->state,
                            'city'      => $request->city,
                        ],
                    );

                    DB::commit();
                }
                catch (Exception $e)
                {
                    DB::rollback();

                    return response()->json(['error' => $e->getMessage()]);
                }

                return response()->json(['success' => 'Data Updated Successfully']);
            }
        }
    }


    public function active(Request $request)
    {
        if (auth()->user()->can('tax-action'))
        {
            if ($request->ajax()){
                return $this->activeData(Tax::find($request->id));
            }
        }

    }

    public function inactive(Request $request)
    {
        // return response()->json('ok fahim');

        if (auth()->user()->can('tax-action'))
        {
            if ($request->ajax()){
                return $this->inactiveData(Tax::find($request->id));
            }
        }

    }

    public function bulkAction(Request $request)
    {
        if (auth()->user()->can('tax-action'))
        {
            if ($request->ajax()) {
                return $this->bulkActionData($request->action_type, Tax::whereIn('id',$request->idsArray));
            }
        }

    }
}
