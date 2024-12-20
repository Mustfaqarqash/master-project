@php
    use Illuminate\Support\Facades\Cookie;
    $cart = json_decode(Cookie::get('cart', json_encode([])), true);
@endphp
<div class="modal fade" id="add-to-cart-{{$product->id}}">
    <div id="add-to-cart">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-radius modal-shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="success u-s-m-b-30">
                                <div class="success__text-wrap"><i class="fas fa-check"></i>

                                    <span>Item is added successfully!</span></div>
                                <div class="success__img-wrap">

                                    <img class="u-img-fluid" src="{{ asset('storage/' . $product->image->path) }}"
                                         alt=""></div>
                                <div class="success__info-wrap">

                                    <span class="success__name">{{$product->name}}</span>

                                    <span class="success__quantity">Quantity: 1</span>

                                    <span class="success__price">${{ number_format( $product->price , 2)}}</span></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="s-option">
                                @php
                                    $itemCount = collect($cart)->sum('quantity');
                                @endphp
                                <span class="s-option__text">{{$itemCount}} item (s) in your cart</span>
                                <div class="s-option__link-box">

                                    <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE
                                        SHOPPING</a>

                                    <a class="s-option__link btn--e-white-brand-shadow" href="{{route('cart.index')}}">VIEW CART</a>

                                    <a class="s-option__link btn--e-brand-shadow" href="{{route('checkoutView')}}">PROCEED TO
                                        CHECKOUT</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
