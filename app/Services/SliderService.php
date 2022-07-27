<?php
namespace App\Services;

use App\Contracts\Slider\SliderContract;
use App\Contracts\Slider\SliderTranslationContract;
use Illuminate\Support\Facades\File;

class SliderService
{
    private $sliderContract;
    private $sliderTranslationContract;

    public function __construct(SliderContract $sliderContract, SliderTranslationContract $sliderTranslationContract)
    {
        $this->sliderContract            = $sliderContract;
        $this->sliderTranslationContract = $sliderTranslationContract;
    }

    public function getAllSlider()
    {
        $data = $this->sliderContract->getAllSlider();
        return json_decode(json_encode($data), FALSE); //This is use when we use map()->format
    }

    public function dataTable()
    {
        if (request()->ajax())
        {
            $sliders = $this->getAllSlider();

            return datatables()->of($sliders)
            ->setRowId(function ($row)
            {
                return $row->id;
            })
            ->addColumn('slider_image', function ($row)
            {
                if ($row->slider_image_secondary!=NULL && (File::exists(public_path($row->slider_image_secondary)))){
                    $url = url("public/".$row->slider_image_secondary);
                    return  '<img src="'. $url .'"/>';
                }else  {
                    return '<img src="https://dummyimage.com/50x50/000000/0f6954.png&text=Slider">';
                }
            })
            ->addColumn('slider_title', function ($row)
            {
                return $row->slider_title;
            })
            ->addColumn('slider_subtitle', function ($row)
            {
                return $row->slider_subtitle;
            })
            ->addColumn('type', function ($row)
            {
                return ucfirst($row->type);
            })
            ->addColumn('text_alignment', function ($row)
            {
                return ucfirst($row->text_alignment);
            })
            ->addColumn('text_color_code', function ($row)
            {
                return $row->text_color;
            })
            ->addColumn('action', function($row){
                $actionBtn    = '<a href="javascript:void(0)" name="edit" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></a>
                              &nbsp;' ;
                if ($row->is_active==1) {
                    $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-warning btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-down"></i></button>';
                }else {
                    $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-up"></i></button>';
                }
                $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>';

                return $actionBtn;
            })
            ->rawColumns(['slider_image','action'])
            ->make(true);
        }
    }
}
