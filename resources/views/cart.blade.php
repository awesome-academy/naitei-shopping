@extends('layout.app')
@section('content')
<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr class="title-top">
                                <th class="product-thumbnail">{{ __('cart.image') }}</th>
                                <th class="product-name">{{ __('cart.product') }}</th>
                                <th class="product-price">{{ __('cart.price') }}</th>
                                <th class="product-quantity">{{ __('cart.table-quantity') }}</th>
                                <th class="product-subtotal">{{ __('cart.total') }}</th>
                                <th class="product-remove">{{ __('cart.update') }}</th>
                                <th class="product-remove">{{ __('cart.remove') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Session::get('cart')['item'] != null)
                                @foreach(Session::get('cart')['item'] as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product_detail', $item['product_id']) }}">
                                                <img src="{{ asset('bower_components/naitei-shopping/shopping-assets/images/products/' . $item['image']) }}"
                                                    alt="product img" />
                                            </a>
                                        </td>
                                        <td class="product-name"><a
                                                href="{{ route('product_detail', $item['product_id']) }}">{{ $item['name'] }}</a>
                                        </td>
                                        <td class="product-price"><span class="amount">{{ $item['price'] . '$' }}</span></td>
                                        <form method="POST" action="{{ route('cart.update') }}">
                                            @csrf
                                            <td class="product-quantity">
                                                <input type="number" name="product_id" value="{{ $item['product_id'] }}"
                                                    hidden />
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" />
                                            </td>
                                            <td class="product-subtotal">{{ ($item['price'] * $item['quantity']) . '$' }}</td>
                                            <td><button class="btn btn-success" type="submit">{{ __('Update') }}</button></td>
                                        </form>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', $item['product_id']) }}"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="product-remove" colspan="7">
                                        <h3>
                                            {{ __('message.no-product-in-cart') }}
                                        </h3>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if (Session::get('cart')['item'] != null)
                    <div class="cartbox__btn">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <div class="cart-shipping">
                                    <span class="cartbox__total__title">{{ __('cart.shipping') }}</span>
                                    <span class="price">{{ Session::get('cart')['shipping'] . '$' }}</span>
                                </div>
                                <a class="cart__total__amount">
                                    <span>{{ __('cart.total') }}</span>
                                    <span>{{ (Session::get('cart')['subtotal'] + Session::get('cart')['shipping']) . '$' }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (Session::get('cart')['item'] != null)
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">
                        <a class="cart__total__amount" href="{{ route('home') }}">
                            <span>{{ __('cart.check-out') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- cart-main-area end -->
@endsection
