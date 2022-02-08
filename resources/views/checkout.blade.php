@extends('layouts.default')
@section('content')
<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home b-green"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ Lang::get('main.Checkout') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">{{ Lang::get('main.BillingDetails') }}</h5>
                            <div class="billing-form-wrap">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">{{ Lang::get('main.FirstName') }}</label>
                                                <input type="text" id="f_name" placeholder="First Name" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">{{ Lang::get('main.FirstName') }}</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">{{ Lang::get('main.EmailAddress') }}</label>
                                        <input type="email" id="email" placeholder="Email Address" required="">
                                    </div>


                                    <div class="single-input-item">
                                        <label for="country" class="required">{{ Lang::get('main.Country') }}</label>
                                        <select name="country nice-select" id="country">
                                            <option value="JO">{{ Lang::get('countries.JO') }}</option>
                                            <option value="KSA">{{ Lang::get('countries.KSA') }}</option>
                                            <option value="PL">{{ Lang::get('countries.PL') }}</option>
                                            <option value="UAE">{{ Lang::get('countries.UAE') }}</option>
                                            <option value="QA">{{ Lang::get('countries.QA') }}</option>
                                            <option value="KW">{{ Lang::get('countries.KW') }}</option>
                                            <option value="OM">{{ Lang::get('countries.OM') }}</option>
                                            <option value="BH">{{ Lang::get('countries.BH') }}</option>
                                            <option value="EG">{{ Lang::get('countries.EG') }}</option>
                                        </select>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address" class="required mt-20">{{ Lang::get('main.StreetAddress') }}</label>
                                        <input type="text" id="street-address" placeholder="Street address Line 1" required="">
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town" class="required">{{ Lang::get('main.City') }}</label>
                                        <input type="text" id="town" placeholder="{{ Lang::get('main.City') }}" required="">
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">{{ Lang::get('main.Phone') }}</label>
                                        <input type="text" id="phone" placeholder="{{ Lang::get('main.Phone') }}">
                                    </div>


                                    <div class="single-input-item">
                                        <label for="ordernote">{{ Lang::get('main.OrderNote') }}</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="{{ Lang::get('main.OrderNote') }}"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">{{ Lang::get('main.YourOrderSummary') }}</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <tfoot>
                                            <tr>
                                                <td>{{ Lang::get('main.subtotal') }}</td>
                                                <td><strong>${{ $subtotal }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{ Lang::get('main.shipping') }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control ">

                                                                <label class="custom-control-label" for="">${{ $shipping }}</label>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ Lang::get('main.totalamount') }}</td>
                                                <td><strong>${{ $Total }}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked="">
                                                <label class="custom-control-label" for="cashon">{{ Lang::get('main.CashOnDelivery') }}</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>{{ Lang::get('main.Paywithcashupondelivery') }}</p>
                                        </div>
                                    </div>

                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Visa" name="paymentmethod" value="Visa" class="custom-control-input">
                                                <label class="custom-control-label" for="Visa">{{ Lang::get('main.VisaMaster') }}<img src="{{ asset('img/paypal-card.jpg') }}" class="img-fluid paypal-card" alt="Visa"></label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="Visa">
                                            <form action="#">

                                                <div class="row">
                                                    <div class="single-input-item">
                                                        <label for="NameOnCard" class="required">{{ Lang::get('main.NameonCard') }}</label>
                                                        <input type="text" id="NameOnCard" placeholder="{{ Lang::get('main.NameonCard') }}" required="">
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="CardNumber" class="required">{{ Lang::get('main.CardNumber') }}</label>
                                                        <input type="number" id="CardNumber" placeholder="{{ Lang::get('main.CardNumber') }}" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="Expiry Date" class="required">{{ Lang::get('main.ExpiryDate') }}</label>
                                                            <input type="month" id="Expiry_Date" placeholder="MM / YY" required="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="Security_Code" class="required">{{ Lang::get('main.SecurityCode') }}</label>
                                                            <input type="number" id="Security_Code" placeholder="{{ Lang::get('main.SecurityCode') }}" required="">
                                                        </div>
                                                    </div>
                                                </div>

                                                </form>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">

                                        <button id="checkout_submit" class="btn btn-sqr">{{ Lang::get('main.PlaceOrder') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>




@stop
