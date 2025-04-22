<?php
namespace App\Services;

use App\Contracts\AttributeSet\AttributeSetContract;
use App\Contracts\AttributeSet\AttributeSetTranslationContract;
use App\Models\AttributeSet;
use App\Traits\ArrayToObjectConvertionTrait;
use App\Traits\WordCheckTrait;

class AttributeSetService
{
    use WordCheckTrait, ArrayToObjectConvertionTrait;

    private $attributeSetContract;
    private $attributeSetTranslationContract;
    public function __construct(AttributeSetContract $attributeSetContract, AttributeSetTranslationContract $attributeSetTranslationContract)
    {
        $this->attributeSetContract            = $attributeSetContract;
        $this->attributeSetTranslationContract = $attributeSetTranslationContract;
    }

    public function getAllAttributeSet()
    {
        $onlyActive = !$this->wordCheckInURL('attribute-sets');

        return $this->getAllSets($onlyActive);
    }

    public function getAllSets($onlyActive = false)
    {
        $query = AttributeSet::with('translations')
                    ->orderBy('is_active', 'DESC')
                    ->orderBy('id', 'DESC');

        if ($onlyActive) {
            $query->where('is_active', 1);
        }

        $result = $query->get()
                    ->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'is_active' => $item->is_active,
                            'name' => $item->translation->attribute_set_name ?? null
                        ];
                    });

        return $this->arrayToObject($result);
    }




    public function getAllWithAttributesAndValues()
    {
        return $this->attributeSetContract->getAllWithAttributesAndValues();
    }

    public function dataTable()
    {
        if (request()->ajax()){
            $attributeSets = $this->getAllAttributeSet();

            return datatables()->of($attributeSets)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('attribute_set_name', function ($row)
            {
                return $row->name;
            })
            ->addColumn('action', function ($row)
            {
                $actionBtn = "";
                if (auth()->user()->can('attribute_set-edit'))
                {
                    $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
                            &nbsp; ';
                }
                if (auth()->user()->can('attribute_set-action'))
                {
                    if ($row->is_active==1) {
                        $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-warning btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                    }else {
                        $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                    }
                }
                // $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" title="Delete" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>
                //             &nbsp; ';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function storeAttributeSet($request)
    {
        if (request()->ajax()){
            if (env('USER_VERIFIED')!=1) {
                return response()->json(['demo' => 'Disabled for demo !']);
            }
            $data              = $this->requestHandleData($request);
            $attribute_set     = $this->attributeSetContract->storeAttributeSet($data);

            $dataTranslation                       = [];
            $dataTranslation['attribute_set_id']   = $attribute_set->id;
            $dataTranslation['locale']             = session('currentLocale');
            $dataTranslation['attribute_set_name'] = $request->attribute_set_name;
            $this->attributeSetTranslationContract->storeAttributeSetTranslation($dataTranslation);
            return response()->json(['success' => __('Data Successfully Saved')]);
        }
    }

    public function findAttributeSet($id)
    {
        return $this->attributeSetContract->getById($id);
    }

    public function findAttributeSetTranslation($attribute_set_id)
    {
        $attributeSetTranslation = $this->attributeSetTranslationContract->getByIdAndLocale($attribute_set_id,session('currentLocale'));
        if (!isset($attributeSetTranslation)) {
            $attributeSetTranslation =  $this->attributeSetTranslationContract->getByIdAndLocale($attribute_set_id,'en');
        }
        return $attributeSetTranslation;
    }

    public function updateAttributeSet($request)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }

        $data = $this->requestHandleData($request);
        $this->attributeSetContract->updateAttributeSetById($request->attribute_set_id, $data);
        $this->attributeSetTranslationContract->updateOrInsertAttributeSetTranslation($request);
        return response()->json(['success' => 'Data Updated Successfully']);
    }

    protected function requestHandleData($request){
        $data              = [];
        $data['is_active'] = $request->input('is_active', 0);
        return $data;
    }

    public function activeById($id)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        return $this->attributeSetContract->active($id);
    }

    public function inactiveById($id)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        return $this->attributeSetContract->inactive($id);
    }

    public function bulkActionByTypeAndIds($type, $ids)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        return $this->attributeSetContract->bulkAction($type, $ids);
    }

    public function destroy($id)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        $this->attributeSetContract->destroy($id);
        $this->attributeSetTranslationContract->destroy($id); //attribute_id
        return response()->json(['success' => 'Data Deleted Successfully']);
    }

}
