@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-car"></i> Orders
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li><a href="{{ route('orders.index') }}">Orders</a></li>
<li class="active">Add New</li>
@endsection

@section('content')
 <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="box box-primary">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                        <form action="{{ route('orders.store') }}" method="POST">
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
                                <label class='col-md-3 control-label'>Product</label>
                                <div class='col-md-7'>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">-- Choose Product --</option>
                                        @foreach ($data['products'] as $key => $product)
                                        <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>User</label>
                                <div class='col-md-7'>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">-- Choose User --</option>
                                        @foreach ($data['users'] as $key => $user)
                                        <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button>
                                    <a href="{{ route('orders.index') }}" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Back</a>
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
