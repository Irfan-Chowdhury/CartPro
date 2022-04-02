<?php
namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait TranslationTrait{

    public function translations($translations)
    {
        $locale = Session::get('currentLocal');
        $translation_value = null;

        if ($translations) {

            if (isset($translations[0])) {
                if ($translations[0]->local == $locale) {
                    $translation_value = $translations[0];
                }
            }

            if (!$translation_value) {
                if (isset($translations[1])) {
                    if ($translations[1]->local == $locale) {
                        $translation_value = $translations[1];
                    }
                }
            }

            if (!$translation_value) {
                foreach ($translations as $value) {
                    if ($value->local=='en') {
                        $translation_value =  $value;
                        break;
                    }
                }
            }
        }

        return $translation_value;
    }
}

?>
