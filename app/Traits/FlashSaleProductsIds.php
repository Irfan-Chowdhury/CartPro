<?php
namespace App\Traits;

use App\Models\FlashSaleProduct;

//This is temporary, change it later
trait FlashSaleProductsIds{

    public function getFlashSaleProductIds($settings){

        $active_campaign_flash_id = null;

        if(isset($settings->keyBy('key')['storefront_flash_sale_active_campaign_flash_id']->plain_value)){
            $active_campaign_flash_id = $settings->keyBy('key')['storefront_flash_sale_active_campaign_flash_id']->plain_value;
            $flash_sale_products_ids = FlashSaleProduct::where('flash_sale_id',$active_campaign_flash_id)->pluck('product_id');
        }else {
            $flash_sale_products_ids = [];
        }
        return $flash_sale_products_ids;
    }
}
