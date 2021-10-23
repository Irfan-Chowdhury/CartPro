<form role="form" action="{{ route('stripe.payment') }}" method="post" class="validation" data-cc-on-file="false"
    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" class="stripSubmitForm">
    @csrf
    {{-- <input type="hidden" name="billing_first_name" id="billing_first_name">
    <input type="hidden" name="billing_last_name" id="billing_last_name">
    <input type="hidden" name="billing_country" id="billing_country_stripe">
    <input type="hidden" name="billing_address_1" id="billing_address_1">
    <input type="hidden" name="billing_city" id="billing_city">
    <input type="hidden" name="billing_state" id="billing_state">
    <input type="hidden" name="billing_zip_code" id="billing_zip_code">
    <input type="hidden" name="billing_email" id="billing_email">
    <input type="hidden" name="billing_phone" id="billing_phone">
    <input type="hidden" name="coupon_value" id="coupon_value">

    <input type="hidden" name="billing_create_account_check" id="billing_create_account_check_stripe">
    <input type="hidden" name="username" id="username">
    <input type="hidden" name="password" id="password">
    <input type="hidden" name="password_confirmation" id="password_confirmation">

    <input type="hidden" name="shipping_address_check" id="shipping_address_check_stripe">
    <input type="hidden" name="shipping_first_name" id="shipping_first_name">
    <input type="hidden" name="shipping_last_name" id="shipping_last_name">
    <input type="hidden" name="shipping_country" id="shipping_country_stripe">
    <input type="hidden" name="shipping_address_1" id="shipping_address_1">
    <input type="hidden" name="shipping_city" id="shipping_city">
    <input type="hidden" name="shipping_state" id="shipping_state">
    <input type="hidden" name="shipping_zip_code" id="shipping_zip_code">
    <input type="hidden" name="shipping_email" id="shipping_email">
    <input type="hidden" name="shipping_phone" id="shipping_phone">
    <input type="hidden" name="total" id="total"> --}}




    <div class="card">
        <div class="card-body">

            <div class='form-row row'>
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="card_name" placeholder="Name on Card *">
                </div>
            </div>

            <br>
            <div class='form-row row'>
                <div class='col-xs-12 form-group card required'>
                    <label class='control-label'>Card Number</label>
                    <input autocomplete='off' class='form-control card-num' size='20' type='text' required>
                </div>
            </div>

            <br>
            <div class='form-row row'>
                <div class='col-xs-12 col-md-4 form-group cvc required'>
                    <label class='control-label'>CVC</label>
                    <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4' type='text'>
                </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
                    <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month'
                        placeholder='MM' size='2' type='text'>
                </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
                    <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year'
                        placeholder='YYYY' size='4' type='text'>
                </div>
            </div>
            <br><br>

            <div class='form-row row'>
                <div class='col-xs-12 d-none error form-group'>
                    <div class='alert-danger alert'>Fix the errors before you begin.</div>
                </div>
            </div>

            <div class="form-row row">
                <div class="checkout-actions mar-top-30">
                    <button class="button lg style1 d-block text-center w-100" type="submit" id="payStripeBtn">{{__('file.Pay Now')}}</button>
                </div>
            </div>

        </div>
    </div>

</form>





