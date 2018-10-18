@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-car"></i> Products
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li><a href="{{ route('products.index') }}">Products</a></li>
<li class="active">Add New</li>
@endsection

@section('content')
 <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="box box-primary">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            {!! csrf_field() !!}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif                      
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Category Name</label>
                                <div class='col-md-7'>
                                    <input type='text' class='form-control' name='category_name' placeholder="Category Name" required value="{{ old('category_name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
