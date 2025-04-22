@php
    use Stichoza\GoogleTranslate\GoogleTranslate;
    $local = Session::get('currentLocale');
    $tr    = new GoogleTranslate($local);
@endphp
