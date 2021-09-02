<?php
namespace App\Traits;

use App\Models\SettingGeneral;
use Illuminate\Support\Facades\Session;

trait FormatNumberTrait{

    public function formatNumber($number) {

        $settingGeneral = SettingGeneral::select('number_format_type')->latest()->first();
        return number_format((float)$number, $settingGeneral->number_format_type, '.', '');
    }

    public function totalFormatNumber() {

        $settingGeneral = SettingGeneral::select('number_format_type')->latest()->first();
        return $settingGeneral->number_format_type;
    }
}

?>
