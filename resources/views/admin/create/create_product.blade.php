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
                    <h2 class="card-header"><strong>@lang('admin.product.create')</strong></h2><br>
                    <form class="card-body card-block" action="{{ route('admin_product_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.name')</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class=" form-control-label">@lang('admin.product.table.coloum.img')</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.price')</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.des')</label>
                                            <textarea type="text" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="password-input" class=" form-control-label">@lang('admin.product.table.coloum.category')</label>
                                        <select multiple class="standardSelect" name="categories[]">
                                            @foreach($categories as $c)
                                                <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                            @endforeach
                                        </select>
                                    </div><br><br> 
                                    <br>
                                    <div class="col-12 card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button type="submit" class="form-control btn btn-success"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <a href="{{ route('admin_product_index') }}" class="form-control btn btn-danger"><i class="fa fa-mail-reply"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
