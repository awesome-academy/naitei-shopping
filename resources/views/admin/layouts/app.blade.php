<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('bower_components/admin_template/images/logo.png') }}">

    <link rel="stylesheet"
        href="{{ asset('bower_components/admin_template/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bower_components/admin_template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bower_components/admin_template/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bower_components/admin_template/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin_template/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin_template/vendors/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bower_components/admin_template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('bower_components/admin_template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('bower_components/admin_template/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('bower_components/admin_template/vendors/selectFX/css/cs-skin-elastic.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/admin_template/vendors/chosen/chosen.min.css') }}">

</head>

<body>
    <div class="container-fluid">
        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                        aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('admin_dashboard_index') }}"><img
                            src="{{ asset('bower_components/admin_template/images/logo.png') }}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="{{ route('admin_dashboard_index') }}"><img
                            src="{{ asset('bower_components/admin_template/images/logo2.png') }}" alt="Logo"></a>
                </div>

                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{ route('admin_dashboard_index') }}"> <i
                                    class="menu-icon fa fa-dashboard"></i>@lang('admin.dashboard.name')</a>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-table"></i>@lang('admin.manage')</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a
                                        href="{{ route('admin_user_index') }}">@lang('admin.dashboard.table.user')</a></li>
                                <li><i class="fa fa-table"></i><a
                                        href="{{ route('admin_product_index') }}">@lang('admin.dashboard.table.product')</a>
                                </li>
                                <li><i class="fa fa-table"></i><a
                                        href="{{ route('admin_order_index') }}">@lang('admin.dashboard.table.order')</a></li>
                                <li><i class="fa fa-table"></i><a
                                        href="{{ route('admin_category_index') }}">@lang('admin.dashboard.table.category')</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> <i class="menu-icon fa fa-book"></i>@lang('admin.about')</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-user"></i><a href="#">@lang('admin.profile')</a></li>
                                <li><i class="menu-icon fa fa-cog"></i><a href="#">@lang('admin.setting')</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            @yield('content')
        </div><!-- /#right-panel -->

        <!-- Right Panel -->
    </div>

</body>

</html>
