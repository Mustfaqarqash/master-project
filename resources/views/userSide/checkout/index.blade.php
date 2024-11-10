@php use Illuminate\Support\Facades\Cookie; @endphp
@extends('layouts.userPage')
@section('content')
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">

                                    <a href="index.html">Home</a></li>
                                <li class="is-marked">

                                    <a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="checkout-msg-group">
                                <div class="msg u-s-m-b-30">

                                        <span class="msg__text">Returning customer?

                                            <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                    <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                        <div class="l-f u-s-m-b-16">

                                            <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                            <form method="POST" action="{{ route('login') }}" class="checkout-f__login">
                                                @csrf
                                                <div class="u-s-m-b-15">
                                                    <label class="gl-label" for="login-email">E-MAIL *</label>
                                                    <input class="input-text input-text--primary-style @error('email') is-invalid @enderror" type="email" id="login-email" name="email" required autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="u-s-m-b-15">
                                                    <label class="gl-label" for="login-password">PASSWORD *</label>
                                                    <input class="input-text input-text--primary-style @error('password') is-invalid @enderror" type="password" id="login-password" name="password" required>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="u-s-m-b-10">
                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">LOG IN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="msg">

                                        <span class="msg__text">Have a coupon?

                                            <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a>
                                        </span>
                                    <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                        <div class="c-f u-s-m-b-16">

                                            <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                            <form class="c-f__form">
                                                <div class="u-s-m-b-16">
                                                    <div class="u-s-m-b-15">

                                                        <label for="coupon"></label>

                                                        <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                                    <div class="u-s-m-b-15">

                                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="checkout-f">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>

                                <!-- Registration Form -->
                                <span class="msg__text">
                                    New Customer?
                                        <a class="gl-link"  href="#register"  data-toggle="collapse"> Create an account</a>
                                </span>
                                <div class="collapse" id="register">
                                    <form method="POST" action="{{ route('register') }}" class="checkout-f__delivery">
                                        @csrf
                                        <div class="u-s-m-b-30">
                                            <div class="u-s-m-b-15">
                                                <label class="gl-label" for="reg-name">FIRST NAME *</label>
                                                <input class="input-text input-text--primary-style @error('name') is-invalid @enderror" type="text" id="reg-name" name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <label class="gl-label" for="reg-email">E-MAIL *</label>
                                                <input class="input-text input-text--primary-style @error('email') is-invalid @enderror" type="email" id="reg-email" name="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <label class="gl-label" for="reg-password">PASSWORD *</label>
                                                <input class="input-text input-text--primary-style @error('password') is-invalid @enderror" type="password" id="reg-password" name="password" required>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <label class="gl-label" for="reg-password-confirm">CONFIRM PASSWORD *</label>
                                                <input class="input-text input-text--primary-style" type="password" id="reg-password-confirm" name="password_confirmation" required>
                                            </div>

                                            <div class="u-s-m-b-30">
                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE ACCOUNT</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <!-- Divider -->
                                <hr>

                                <!-- Delivery Information -->
                                <div class="u-s-m-b-30">
                                    <h1 class="checkout-f__h1">DELIVERY DETAILS</h1>
                                    <div class="check-box">
                                        <input type="checkbox" id="get-address">
                                        <div class="check-box__state check-box__state--primary">
                                            <label class="check-box__label" for="get-address">Use default shipping and billing address from account</label>
                                        </div>
                                    </div>
                                    <form class="checkout-f__delivery" action="{{ route('address.store') }}" method="post">
                                        @csrf <!-- CSRF protection -->

                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-street">STREET ADDRESS *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="billing-street" name="street_address" placeholder="House name and street name" required>
                                        </div>

                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-country">COUNTRY *</label>
                                            <select class="select-box select-box--primary-style" id="billing-country" name="city" required>
                                                <option selected value="">Choose Country</option>
                                                @php
                                                    $cities = \App\Models\City::all();
                                                @endphp
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->name }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-province">PROVINCE *</label>
                                            <input class="input-text input-text--primary-style" name="province" type="text" id="billing-province" required>
                                        </div>

                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="billing-zip" name="postal_code" placeholder="Zip/Postal Code" required>
                                        </div>

                                        <div class="u-s-m-b-10">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE DELIVERY INFORMATION</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                <!--====== Order Summary ======-->
                                <div class="o-summary">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__item-wrap gl-scroll">
                                            @php
                                                $cart = json_decode(Cookie::get('cart', json_encode([])), true);
                                             @endphp
                                            @forelse($cart as $item)
                                                <div class="o-card">
                                                    <div class="o-card__flex">
                                                        <div class="o-card__img-wrap">
                                                            @php
                                                                $product = \App\Models\product::find($item['product_id']);
                                                                $image= $product->images->first()->path;
                                                            @endphp

                                                            <img class="u-img-fluid" src="{{asset('storage/' . $image)}}" alt="{{ $item['name'] }}">
                                                        </div>
                                                        <div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                 <a href="{{route('productDetails' , $item['product_id'])}}">{{$item['name']}}</a>
                                                            </span>

                                                            <span class="o-card__quantity">Quantity x {{$item['quantity']}}</span>

                                                            <span class="o-card__price">total: ${{($item['price'] * $item['quantity'])}}</span>

                                                        </div>
                                                    </div>

                                                    <form action="{{ route('cart.delete', $item['product_id']) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="far fa-trash-alt table-p__delete-link" onclick="return confirm('Are you sure you want to remove this item?');"></button>
                                                    </form>
                                                </div>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Your cart is empty!</td>
                                                </tr>
                                            @endforelse


                                        </div>
                                    </div>

                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                @php
                                                    $total = collect($cart)->sum(function($item) {
                                                        return $item['price'] * $item['quantity'];
                                                    });
                                                    $tax= 10;
                                                @endphp

                                                <tr>
                                                    <td>TAX</td>
                                                    <td>{{number_format($tax , 2)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>${{ number_format($total, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>${{ number_format(($total + $tax), 2) }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                            <div class="checkout-f__payment">
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="cash-on-delivery" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="direct-bank-transfer" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-with-check" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-with-check">Pay With Check</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-with-card" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-pal" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <!--====== Check Box ======-->
                                                    <div class="check-box">

                                                        <input type="checkbox" id="term-and-condition">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->

                                                    <a class="gl-link">Terms of Service.</a>
                                                </div>
                                                <div>
                                                    @if(session('success'))
                                                        <div class="alert alert-success alert-dismissible">
                                                            {{ session('success') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                                        </div>
                                                    @endif

                                                    <form action="{{ route('checkout') }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn--e-brand-b-2" type="submit">PROCEED TO CHECKOUT</button>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Order Summary ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
    </div>
    <!--====== End - App Content ======-->

    <script>
        document.getElementById('get-address').addEventListener('change', function() {
            if (this.checked) {
                fetch("{{ route('address.getDefault') }}", {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('billing-street').value = data.street_address;
                            document.getElementById('billing-country').value = data.city;
                            document.getElementById('billing-province').value = data.province;
                            document.getElementById('billing-zip').value = data.postal_code;
                        } else {
                            alert("No default address found.");
                        }
                    })
                    .catch(error => console.error('Error fetching address:', error));
            } else {
                // Clear fields if checkbox is unchecked
                document.getElementById('billing-street').value = '';
                document.getElementById('billing-country').value = '';
                document.getElementById('billing-province').value = '';
                document.getElementById('billing-zip').value = '';
            }
        });
    </script>
@endsection
