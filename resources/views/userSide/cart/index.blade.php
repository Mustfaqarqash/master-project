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
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ route('cart.index') }}">Cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->

        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                            <div class="table-responsive">
                                <table class="table-p">
                                    <tbody>
                                    @forelse($cart as $item)
                                        <tr>
                                            <td>
                                                <div class="table-p__box">
                                                    <div class="table-p__img-wrap">

                                                    </div>
                                                    <div class="table-p__info">
{{--                                                        <span class="table-p__name">--}}
{{--                                                            <a href="{{ route('product.detail', $item['product_id']) }}">{{ $item['name'] }}</a>--}}
{{--                                                        </span>--}}
                                                        <span class="table-p__category">
                                                         
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="table-p__price">${{ number_format($item['price'], 2) }}</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.update', $item['product_id']) }}" method="POST" class="input-counter-form">
                                                    @csrf
                                                    <div class="table-p__input-counter-wrap">
                                                        <div class="input-counter">
                                                            <span class="input-counter__minus fas fa-minus" onclick="updateQuantity({{ $item['product_id'] }}, -1)"></span>
                                                            <input class="input-counter__text input-counter--text-primary-style" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" required>
                                                            <span class="input-counter__plus fas fa-plus" onclick="updateQuantity({{ $item['product_id'] }}, 1)"></span>
                                                        </div>
                                                        <button type="submit" class="btn btn--e-brand-b-2">Update</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.delete', $item['product_id']) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="far fa-trash-alt table-p__delete-link" onclick="return confirm('Are you sure you want to remove this item?');"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Your cart is empty!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="col-lg-12">
                            <div class="table-p__total">
                                @php
                                    $total = collect($cart)->sum(function($item) {
                                        return $item['price'] * $item['quantity'];
                                    });
                                @endphp
                                <h3>Total: ${{ number_format($total, 2) }}</h3>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="route-box">
                                <div class="route-box__g1">
{{--                                    <a class="route-box__link" href="{{ route('shop') }}">--}}
{{--                                        <i class="fas fa-long-arrow-alt-left"></i>--}}
{{--                                        <span>CONTINUE SHOPPING</span>--}}
{{--                                    </a>--}}
                                </div>
                                <div class="route-box__g2">
                                    <a class="route-box__link" href="{{ route('cart.clear') }}">
                                        <i class="fas fa-trash"></i>
                                        <span>CLEAR CART</span>
                                    </a>
                                    <a class="route-box__link" href="{{ route('cart.index') }}">
                                        <i class="fas fa-sync"></i>
                                        <span>UPDATE CART</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->
@endsection


{{--<!--====== Section 3 ======-->--}}
{{--<div class="u-s-p-b-60">--}}

{{--    <!--====== Section Content ======-->--}}
{{--    <div class="section__content">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">--}}
{{--                    <form class="f-cart">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-4 col-md-6 u-s-m-b-30">--}}
{{--                                <div class="f-cart__pad-box">--}}
{{--                                    <h1 class="gl-h1">ESTIMATE SHIPPING AND TAXES</h1>--}}

{{--                                    <span class="gl-text u-s-m-b-30">Enter your destination to get a shipping estimate.</span>--}}
{{--                                    <div class="u-s-m-b-30">--}}

{{--                                        <!--====== Select Box ======-->--}}

{{--                                        <label class="gl-label" for="shipping-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="shipping-country">--}}
{{--                                            <option selected value="">Choose Country</option>--}}
{{--                                            <option value="uae">United Arab Emirate (UAE)</option>--}}
{{--                                            <option value="uk">United Kingdom (UK)</option>--}}
{{--                                            <option value="us">United States (US)</option>--}}
{{--                                        </select>--}}
{{--                                        <!--====== End - Select Box ======-->--}}
{{--                                    </div>--}}
{{--                                    <div class="u-s-m-b-30">--}}

{{--                                        <!--====== Select Box ======-->--}}

{{--                                        <label class="gl-label" for="shipping-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="shipping-state">--}}
{{--                                            <option selected value="">Choose State/Province</option>--}}
{{--                                            <option value="al">Alabama</option>--}}
{{--                                            <option value="al">Alaska</option>--}}
{{--                                            <option value="ny">New York</option>--}}
{{--                                        </select>--}}
{{--                                        <!--====== End - Select Box ======-->--}}
{{--                                    </div>--}}
{{--                                    <div class="u-s-m-b-30">--}}

{{--                                        <label class="gl-label" for="shipping-zip">ZIP/POSTAL CODE *</label>--}}

{{--                                        <input class="input-text input-text--primary-style" type="text" id="shipping-zip" placeholder="Zip/Postal Code"></div>--}}
{{--                                    <div class="u-s-m-b-30">--}}

{{--                                        <a class="f-cart__ship-link btn--e-transparent-brand-b-2" href="cart.html">CALCULATE SHIPPING</a></div>--}}

{{--                                    <span class="gl-text">Note: There are some countries where free shipping is available otherwise our flat rate charges or country delivery charges will be apply.</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 col-md-6 u-s-m-b-30">--}}
{{--                                <div class="f-cart__pad-box">--}}
{{--                                    <h1 class="gl-h1">NOTE</h1>--}}

{{--                                    <span class="gl-text u-s-m-b-30">Add Special Note About Your Product</span>--}}
{{--                                    <div>--}}

{{--                                        <label for="f-cart-note"></label><textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 col-md-6 u-s-m-b-30">--}}
{{--                                <div class="f-cart__pad-box">--}}
{{--                                    <div class="u-s-m-b-30">--}}
{{--                                        <table class="f-cart__table">--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td>SHIPPING</td>--}}
{{--                                                <td>$4.00</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>TAX</td>--}}
{{--                                                <td>$0.00</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>SUBTOTAL</td>--}}
{{--                                                <td>$379.00</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>GRAND TOTAL</td>--}}
{{--                                                <td>$379.00</td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}

{{--                                        <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--====== End - Section Content ======-->--}}
{{--</div>--}}
{{--<!--====== End - Section 3 ======-->--}}
