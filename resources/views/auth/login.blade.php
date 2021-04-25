@extends('frontend.layout.master')

@section('content')
{{-- <style>
    .custom-select,
    .form-control {
        font-size: 1rem;
        font-weight: 400;
        line-height: normal;
        color: #555;
    }

    .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + 1.625rem + 2px);
        padding: .8125rem .9375rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #555;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #888;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
    }

    button,
    input {
        overflow: visible;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    *,
    :after,
    :before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    input[type="text"i] {
        padding: 1px 2px;
    }
</style>
<div role="main" id="maincontent">s
    <div class="login-page">
        <div class="header-title text-center">
            <h1>Sign In</h1>
        </div>

        <div class="container login-body">
            <div class="row justify-content-center equal-height">
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <div class="card-body login-form-nav">

                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" onclick="window.gigya.accounts.showScreenSet({screenSet:'RegistrationLogin'

                    , startScreen:'gigya-login-screen', containerID:'gigya-login-container'});" href="#login"
                                    data-toggle="tab" role="tab" aria-controls="login" aria-selected="true" tabindex="0"
                                    id="login-tab">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" onclick="window.gigya.accounts.showScreenSet({screenSet:'RegistrationLogin'

                    , startScreen:'gigya-signup-screen', containerID:'gigya-login-container'});" href="#register"
                                    data-toggle="tab" role="tab" aria-controls="register" aria-selected="false"
                                    tabindex="-1" id="register-tab">
                                    Create Account
                                </a>
                            </li>
                        </ul>



                        <script>
                            var gigyaInterval = setInterval(function () {
                                        if (typeof window.gigya !== 'undefined') {
                                            window.gigya.accounts.showScreenSet({screenSet:'RegistrationLogin', startScreen:'gigya-login-screen'
                                                , containerID:'gigya-login-container'});
                                             clearInterval(gigyaInterval);
                                        }
                                    }, 100);
                        </script>
                        <div id="gigya-login-container"></div>


                    </div>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4 offset-lg-1">
                    <form
                        action="https://www.platinumperformance.com/on/demandware.store/Sites-platinumperformance-Site/en_US/Order-Track"
                        class="trackorder" method="GET" name="trackorder-form">
                        <div class="card-header">
                            <h2>Check order</h2>
                        </div>
                        <div class="card-body">

                            <p class="track-order-header-text">See your order even if you are not a registered user.
                                Enter the order number and the billing address ZIP code.</p>

                            <div class="form-group required">
                                <label class="form-control-label" for="trackorder-form-number">
                                    Order number
                                </label>
                                <input type="text" required="" class="form-control" aria-describedby="form-number-error"
                                    id="trackorder-form-number" name="trackOrderNumber">
                                <div class="invalid-feedback" id="form-number-error"></div>
                            </div>

                            <div class="form-group required">
                                <label class="form-control-label" for="trackorder-form-email">
                                    Order Email
                                </label>
                                <input type="text" required="" class="form-control" id="trackorder-form-email"
                                    aria-describedby="form-email-error" name="trackOrderEmail"
                                    pattern="^[\w.%+-]+@[\w.-]+\.[\w]{2,6}$" maxlength="50">
                                <div class="invalid-feedback" id="form-email-error"></div>
                            </div>
                            <!-- Billing Zip Code -->
                            <div class="form-group required">
                                <label class="form-control-label" for="trackorder-form-zip">
                                    Billing ZIP code
                                </label>
                                <input type="text" required="" class="form-control" id="trackorder-form-zip"
                                    aria-describedby="form-zipcode-error" name="trackOrderPostal"
                                    pattern="(^\d{5}(-\d{4})?$)|(^[abceghjklmnprstvxyABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Za-z]{1} *\d{1}[A-Za-z]{1}\d{1}$)">
                                <div class="invalid-feedback" id="form-zipcode-error"></div>
                            </div>




                            <input type="hidden" name="csrf_token"
                                value="kSg6nQRpOUD8Xt3lfmfdMl5P98eRT7oFVsfcXArdPn-YqblbjBh3uw28lHfqZpxXog3emjHaUWhdAV7ojE3082EVEohEQAyJW9rik9RIvSJDBYpaYpA8c11bsfW0tBauA7LbkFAr_Sdc-9cjl1KVArphmAQBiIweliNY-VkpoUP31mwCeok=">

                            <div class="form-group">
                                <button class="btn btn-outline-primary" type="submit" name="submit" value="submit">
                                    Check status
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div> --}}
@endsection

@section('additional-js')
<script>
    $(document).ready(function(){
        $(".form1 .forgotpass").click(function(){
            $(".form1").hide(100);
            $(".form2").show(200);
        });

        $(".form2 .login").click(function(){
            $(".form2").hide(100);
            $(".form1").show(200);
        });

    });

</script>
@endsection
