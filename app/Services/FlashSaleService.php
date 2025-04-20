<?php
namespace App\Services;

use App\Contracts\FlashSale\FlashSaleContract;
use App\Contracts\FlashSale\FlashSaleProductContract;
use App\Contracts\FlashSale\FlashSaleTranslationContract;
use App\Models\FlashSale;
use App\Traits\ArrayToObjectConvertionTrait;
use App\Utilities\Message;

class FlashSaleService extends Message
{
    use ArrayToObjectConvertionTrait;

    private $flashSaleContract, $flashSaleTranslationContract, $flashSaleProductContract;
    public function __construct(FlashSaleContract $flashSaleContract, FlashSaleTranslationContract $flashSaleTranslationContract, FlashSaleProductContract $flashSaleProductContract){
        $this->flashSaleContract = $flashSaleContract;
        $this->flashSaleTranslationContract = $flashSaleTranslationContract;
        $this->flashSaleProductContract = $flashSaleProductContract;
    }

    public function activeById($id){
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        $this->flashSaleContract->active($id);
        return Message::activeSuccessMessage();
    }

    public function inactiveById($id){
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        $this->flashSaleContract->inactive($id);
        return Message::inactiveSuccessMessage();
    }

    public function destroy($id)
    {
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        $this->flashSaleContract->destroy($id);
        $this->flashSaleTranslationContract->destroy($id);
        $this->flashSaleProductContract->destroy($id);
        return Message::deleteSuccessMessage();
    }

    public function bulkActionByTypeAndIds($type, $ids)
    {
        if (!auth()->user()->can('flash_sale-action')){
            return Message::getPermissionMessage();
        }
        if ($type=='delete') {
            $this->flashSaleContract->bulkAction($type, $ids);
            $this->flashSaleTranslationContract->bulkAction($type, $ids);
            $this->flashSaleProductContract->bulkAction($type, $ids);
            return Message::deleteSuccessMessage();
        }else{
            $this->flashSaleContract->bulkAction($type, $ids);
            return $type=='active' ? Message::activeSuccessMessage() : Message::inactiveSuccessMessage();
        }
    }

    public function getFlashSales()
    {
        $query = FlashSale::with('translations')
        ->where('is_active',1)
        ->get()
        ->map(function($flashSale){
            return [
                'id' => $flashSale->id,
                'slug' => $flashSale->slug,
                'is_active' => $flashSale->is_active,
                'campaign_name' => $flashSale->translation->campaign_name ?? null,
            ];
        });

        return $this->arrayToObject($query);

    }
}
