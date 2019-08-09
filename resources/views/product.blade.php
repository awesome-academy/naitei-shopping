@extends('layout.app')
@section('content')
<!-- Start Blog List View Area -->
<section class="blog__list__view section-padding--lg menudetails-right-sidebar bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="food__menu__container">
                    <div class="food__menu__inner flex-wrap flex-md-nowrap flex-lg-nowrap">
                        <div class="row">
                            <div class="food__menu__thumb">
                                <img src="{{ asset('bower_components/naitei-shopping/shopping-assets/images/products/' . $product->img) }}" alt="images">
                            </div>
                        </div>
                        <div class="row">
                            <div class="food__menu__details col-md-12">
                                <div class="food__menu__content">
                                    <h2>{{ $product->name }}</h2>
                                    <h5 class="food__dtl__prize d-flex">{{ $product->price . '$' }}</h5>
                                    <p>{{ $product->description }}</p>
                                    <div class="product-action-wrap">
                                        <div class="prodict-statas">
                                            <span>{{ __('product.types') . ' :' }}
                                                @foreach ($product->categories as $category)
                                                    {{ $category->name . ', ' }}
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="product-quantity">
                                            <form id="myform" method="POST" action="{{ route('cart.add') }}">
                                                @csrf
                                                <div class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input value="{{ $product->id }}" hidden name="product_id">
                                                        <input id="quantity" class="cart-plus-minus-box" name="quantity" value="1">
                                                        <div class="dec qtybutton">-</div>
                                                        <div class="inc qtybutton">+</div>
                                                        <div class="add__to__cart__btn">
                                                            <button class="food__btn" type="submit">{{ __('cart.add-to-cart') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Product Descrive Area -->
                    <div class="menu__descrive__area">
                        <h2>{{ __('home.comment') }}</h2>
                        <form method="POST" action="{{ route('user.comment')}}">
                            @csrf
                            @if (Auth::check())
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <textarea class="comment-box" name="comment"></textarea>
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <button class="btn btn-primary send-button pull-right">{{ __('form.send') . ' ' }}<i class="fa fa-check"></i></button>
                            @else 
                                <textarea class="comment-box" name="comment" disabled placeholder="{{ __('message.login-to-comment') }}"></textarea>
                            @endif
                        </form>
                        <h4 class="side__title">{{ __('product.reviews') }}</h4>
                        <!-- Start Tab Content -->
                        <!-- Start Single Content -->
                        <div class="review__wrapper">
                            @foreach ($product->comments as $comment)
                                <!-- Start Single Review -->
                                <div class="single__review d-flex">
                                    <div class="review__details">
                                        <h3>{{ $comment->user->name }}</h3>
                                        <div class="rev__meta d-flex justify-content-between">
                                            <span>{{ $comment->created_at }}</span>
                                        </div>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                                <!-- End Single Review -->
                            @endforeach
                        </div>
                        <!-- End Single Content -->
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Product Descrive Area -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 md--mt--40 sm--mt--40">
                <div class="food__sidebar">
                    <!-- Start Recent Post -->
                    <div class="food__recent__post mt--60">
                        <h4 class="side__title">{{ __('product.popular') }}</h4>
                        <div class="recent__post__wrap">
                            <!-- Start Single Post -->
                            <!-- End Single Post -->
                        </div>
                    </div>
                    <!-- End Recent Post -->
                    <!-- Start Category Area -->
                    <div class="food__category__area mt--60">
                        <h4 class="side__title">{{ __('product.categories') }}</h4>
                        <ul class="food__category">
                        </ul>
                    </div>
                    <!-- End Category Area -->
                    <!-- End Sidebar Newsletter -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog List View Area -->
@endsection
