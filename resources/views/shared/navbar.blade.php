<header class="htc__header bg--white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-4 col-md-6 order-1 order-lg-1">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img id="logo-image"
                                src="{{ asset('/bower_components/naitei-shopping/shopping-assets/images/foody.png') }}"
                                alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-4 col-md-2 order-3 order-lg-2">
                    <div class="main__menu__wrap">
                        <nav class="main__menu__nav d-none d-lg-block">
                            <ul class="mainmenu">
                                <li><a href="#">{{ __('home.navbar.about') }}</a></li>
                                <li><a href="#">{{ __('home.navbar.menu') }}</a>
                                </li>
                                <li><a href="#">{{ __('home.navbar.gallery') }}</a></li>
                                <li class="drop"><a href="#">{{ __('home.navbar.contact') }}</a>
                                    <ul class="dropdown__menu">
                                        <li><a href="#">{{ __('home.navbar.contact-to-admin') }}</a></li>
                                        <li><a href="#">{{ __('home.navbar.contact-to-store') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
                <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                    <div class="header__right d-flex justify-content-end">
                        <div class="log__in dropdown">
                            <a class="accountbox-trigger dropdown-toggle" data-toggle="dropdown"><i
                                    class="zmdi zmdi-account-o"></i></a>
                            @if (Auth::check())
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">{{ __('home.profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('auth.logout') }}</a>
                                </div>
                            @else
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                </div>
                            @endif
                        </div>
                        <div class="shopping__cart">
                            <a class="minicart-trigger" href="#"><i class="zmdi zmdi-shopping-basket"></i></a>
                            @if (Session::get('cart') != null)
                                <div class="shop__qun">
                                    <span>{{ count(Session::get('cart')['item']) }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none"></div>
            <!-- Mobile Menu -->
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

@include('shared.minicart')
