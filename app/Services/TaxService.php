<?php
namespace App\Services;

use App\Contracts\Tax\TaxContract;
use App\Contracts\Tax\TaxTranslationContract;
use App\Traits\SlugTrait;
use App\Traits\WordCheckTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaxService
{
    use SlugTrait, WordCheckTrait;

    private $taxContract, $taxTranslationContract;
    public function __construct(TaxContract $taxContract, TaxTranslationContract $taxTranslationContract){
        $this->taxContract = $taxContract;
        $this->taxTranslationContract = $taxTranslationContract;
    }


    public function getAllTax(){
        if ($this->wordCheckInURL('taxes')) {
            return $this->taxContract->getAll();
        }else{
            return $this->taxContract->getAllActiveData();
        }
    }

    public function dataTable()
    {
        $taxes = $this->getAllTax();

        return datatables()->of($taxes)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('action', function ($row){
                $actionBtn = "";
                if (auth()->user()->can('tax-edit')){
                    $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
                    &nbsp; ';
                }
                if (auth()->user()->can('tax-action')){
                    if ($row->is_active==1) {
                        $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                    }else {
                        $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                    }
                    // $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>';
                }
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function taxStore($request)
    {
        if (auth()->user()->can('tax-store'))
        {
            $data   = $this->requestHandleData($request);
            DB::beginTransaction();
            try{
                $tax = $this->taxContract->store($data);
                $data['tax_id'] = $tax->id;
                $this->taxTranslationContract->store($data);
                DB::commit();
            }catch (Exception $e){
                DB::rollback();
                return response()->json(['errors' => [$e->getMessage()]], 422);
            }
            return response()->json(['success' => __('Data Successfully Saved')]);
        }
    }

    protected function requestHandleData($request)
    {
        $data  = [];
        $data['country']  = $request->country;
        $data['zip']      = $request->zip;
        $data['rate']     = $request->rate;
        $data['based_on'] = $request->based_on;
        $data['is_active']= $request->is_active;

        $data['locale']   = Session::get('currentLocal');
        $data['tax_class']= $request->tax_class;
        $data['tax_name'] = $request->tax_name;
        $data['state']    = $request->state;
        $data['city']     = $request->city;

        return $data;
    }
}
