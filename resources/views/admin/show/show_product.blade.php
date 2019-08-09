@extends('admin.layouts.app')

@section('content')
<!-- Header-->
@include('admin.layouts.header')
<!-- Header-->

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>@lang('admin.dashboard.name')</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">@lang('admin.product.name')</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="container">
                <div class="card">
                    <h2 class="card-header"><strong>@lang('admin.product.show')</strong></h2><br>
                    <form class="card-body card-block">
                        <div class="row">
                            <div class="col-5">

                                <div class="row form-group">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.name')</label>
                                            <input type="text" class="form-control" value="{{ $product->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.des')</label>
                                            <input type="email" class="form-control" value="{{ $product->description }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.price')</label>
                                            <input type="text" class="form-control" value="{{ $product->price }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-10">
                                        <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.category')</label><br>
                                        @foreach ($product->categories as $category)
                                            <span class="badge badge-success">{{ $category->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="row form-group">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-10">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.img')</label><br>
                                            </div>
                                            <div class="card-body">
                                                <img src="{{ asset('dataImages/' . $product->img) }}" class="img-product">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                            <div class="col-1">
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <a href="{{ route('admin_product_edit', $product->id) }}" class="form-control btn btn-primary"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <a href="{{ route('admin_product_index') }}" class="form-control btn btn-danger"><i class="fa fa-mail-reply"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@include('admin.script.datatable')
@include('admin.script.dashboard')
@include('admin.script.select_m')

@endsection
