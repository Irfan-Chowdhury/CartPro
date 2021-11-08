<div class="js-cookie-consent cookie-consent">
    <div class="alert alert-primary alert-dismissible fade show cookie-alert" role="alert">
        <div class="d-flex justify-content-center align-items-center">
            <i class="ion-ios-information"></i>

    <span class="cookie-consent__message">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree">
        {{ trans('cookieConsent::texts.agree') }}
    </button>
    
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
