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
            @if (isset($message))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">@lang('admin.success')</span> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @elseif (Session::has('success_create'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">@lang('admin.error')</span> {{ Session::get('success_create') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @elseif ($errors->any())
            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">@lang('admin.error')</span> {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
            </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('admin_product_import_data') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" accept=".csv">
                            <input type="submit" value="Upload data">
                        </form>
                    </div>
                    <div class="card-body">
                        <p>@lang('admin.product.file')</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">@lang('admin.dashboard.table.product')</strong>
                        <a href="{{ route('admin_product_create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i>&nbsp; @lang('admin.user.create')</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('admin.product.table.coloum.id')</th>
                                    <th>@lang('admin.product.table.coloum.name')</th>
                                    <th>@lang('admin.product.table.coloum.des')</th>
                                    <th>@lang('admin.product.table.coloum.price')</th>
                                    <th>@lang('admin.product.table.coloum.category')</th>
                                    <th>@lang('admin.user.table.coloum.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><a href="{{ route('admin_product_show', $product->id) }}" class="username"><b>{{ $product->name }}</b></a></td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}$</td>
                                    <td>
                                        @foreach ($product->categories as $category)
                                            {{ "." . $category->name . " " }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-5">
                                                <a type="button" href="{{ route('admin_product_edit', $product->id) }}" class="btn btn-outline-primary">
                                                    <i class="fa fa-pencil"></i></a>
                                            </div>
                                            <div class="col-5">
                                                <a type="button" href="{{ route('admin_product_destroy', $product->id) }}" class="btn btn-outline-danger">
                                                    <i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@include('admin.script.datatable')
@include('admin.script.modal')
@endsection
