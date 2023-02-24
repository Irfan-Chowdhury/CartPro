<?php
namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait TranslationTrait{

    // public function translations($translations)
    // {
    //     //In our database some translation table's column name with local and updated column with locale that's why we have to check both name. We will update later.

    //     $locale = Session::get('currentLocal');
    //     $translation_value = null;

    //     if ($translations) {


    //         //When current local / locale
    //         if (isset($translations[0])) {
    //             if (isset($translations[0]->local)) { //local
    //                 foreach ($translations as $value) {
    //                     if ($value->local == $locale) {
    //                         $translation_value = $value;
    //                     }
    //                 }
    //             }elseif(isset($translations[0]->locale)) { //locale
    //                 foreach ($translations as $value) {
    //                     if ($value->locale == $locale) {
    //                         $translation_value = $value;
    //                     }
    //                 }
    //             }
    //         }


    //         // When current local / locale does not exits then default 'en'
    //         if (!$translation_value) {
    //             foreach ($translations as $value) {
    //                 if (isset($value->local)) { //Have to remove this line later
    //                     if ($value->local=='en') { //local
    //                         $translation_value =  $value;
    //                         break;
    //                     }
    //                 }else if(isset($value->locale)){
    //                     if ($value->locale=='en') { //locale
    //                         $translation_value =  $value;
    //                         break;
    //                     }
    //                 }

    //             }
    //         }

    //     }

    //     return $translation_value;
    // }


    /*
    |------------------------------------------------------------------------------------
    |In our database some translation table's column name with local and updated column
    |with locale that's why we have to check both name. We will update later.
    |------------------------------------------------------------------------------------
    */
    public function translations($translationsData)
    {

        $locale = Session::get('currentLocal');
        $translations = json_decode(json_encode($translationsData), FALSE);

        if ($translations) {
            //When current local / locale
            if (isset($translations[0])) {
                return $this->getTranslationDataByExpectedLocale($translations, $locale);
            }
            // When current local / locale does not exits then default 'en'
            return $this->getTranslationDataByDefaultLocale($translations, $locale);
        }
        return null;
    }


    protected function getTranslationDataByExpectedLocale($translations, $locale){
        //When current local / locale
        if (isset($translations[0]->local)) { //local
            foreach ($translations as $value) {
                if ($value->local == $locale) {
                    return $value;
                }
            }
        }elseif(isset($translations[0]->locale)) { //locale
            foreach ($translations as $value) {
                if ($value->locale == $locale) {
                    return $value;
                }
            }
        }
        return null;
    }

    protected function getTranslationDataByDefaultLocale($translations){
        $translation_value = null;
        foreach ($translations as $value) {
            if (isset($value->local)) { //Have to remove this line later
                if ($value->local=='en') { //local
                    $translation_value =  $value;
                    break;
                }
            }else if(isset($value->locale)){
                if ($value->locale=='en') { //locale
                    $translation_value =  $value;
                    break;
                }
            }
        }
        return $translation_value;
    }


    public function translationsTest($translations)
    {
        //In our database some translation table's column name with local and updated column with locale that's why we have to check both name. We will update later.

        $locale = Session::get('currentLocal');
        $translation_value = null;

        if ($translations && gettype($translations)==='array') {
            //When current local / locale

            $data = json_decode(json_encode($translations), FALSE);


            if (isset($translations[0]) && isset($translations[0]->local)) {
                foreach ($translations as $value) {
                    if ($value->local == $locale) {
                        $translation_value = $value;
                    }
                }
            }


            // When current local / locale does not exits then default 'en'
            if (!$translation_value) {
                foreach ($translations as $value) {
                    if (isset($value->local)) { //Have to remove this line later
                        if ($value->local=='en') { //local
                            $translation_value =  $value;
                            break;
                        }
                    }
                }
            }

        }

        return $translation_value;
    }
}

?>
