<!-- Cartbox -->
<div class="cartbox-wrap">
    <div class="cartbox text-right">
        <button class="cartbox-close"><i class="zmdi zmdi-close"></i></button>
        <div class="cartbox__inner text-left">
            @if (Session::get('cart')['item'] != null)
                <div class="cartbox__items">
                    @foreach (Session::get('cart')['item'] as $item)
                        <!-- Cartbox Single Item -->
                        <div class="cartbox__item">
                            <div class="cartbox__item__thumb">
                                <a href="{{ route('product_detail', $item['product_id']) }}">
                                    <img src="{{ asset('bower_components/naitei-shopping/shopping-assets/images/products/' . $item['image']) }}"
                                        alt="small thumbnail">
                                </a>
                            </div>
                            <div class="cartbox__item__content">
                                <h5><a href="{{ route('product_detail', $item['product_id']) }}"
                                        class="product-name">{{ $item['name'] }}</a></h5>
                                <p>{{ __('cart.quantity') . ': ' }}<span>{{ $item['quantity'] }}</span></p>
                                <span class="price">{{ ($item['price'] * $item['quantity']) . '$' }}</span>
                            </div>
                            <a class="cartbox__item__remove" href="{{ route('cart') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                        <!-- //Cartbox Single Item -->
                    @endforeach
                </div>
                <div class="cartbox__total">
                    <ul>
                        <li><span class="cartbox__total__title">{{ __('cart.subtotal') }}</span><span
                                class="price">{{ '$' . Session::get('cart')['subtotal'] }}</span>
                        </li>
                        <li class="shipping-charge"><span
                                class="cartbox__total__title">{{ __('cart.shipping') }}</span><span
                                class="price">{{ '$' . Session::get('cart')['shipping'] }}</span></li>
                        <li class="grandtotal">{{ __('cart.total') }}
                            <span class="price">{{ '$' . (Session::get('cart')['subtotal'] + Session::get('cart')['shipping']) }}</span>
                        </li>
                    </ul>
                </div>
            @endif

            <div class="cartbox__buttons">
                <a class="food__btn" href="{{ route('cart') }}"><span>{{ __('cart.view-cart') }}</span></a>
                <a class="food__btn" href="checkout.html"><span>{{ __('cart.checkout') }}</span></a>
            </div>
        </div>
    </div>
</div>
<!-- //Cartbox -->
