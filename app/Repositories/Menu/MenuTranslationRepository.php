<?php

namespace App\Repositories\Menu;

use App\Contracts\Menu\MenuTranslationContract;
use App\Models\MenuTranslation;
use App\Repositories\BaseRepository;

class MenuTranslationRepository extends BaseRepository implements MenuTranslationContract
{
    public function __construct(MenuTranslation $model){
        parent::__construct($model);
    }

    // public function destroy($tax_id){
    //     MenuTranslation::where('tax_id', $tax_id)->delete();
    // }
}
