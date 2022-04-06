<div class="js-cookie-consent cookie-consent fixed-bottom p-2 text-center">

    <span class="cookie-consent__message">
        {!! htmlspecialchars_decode(trans('cookieConsent::texts.message')) !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree button style1 md mt-3">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

</div>
