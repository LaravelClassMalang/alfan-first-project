@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-users"></i> Users
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li><a href="{{ route('users.index') }}">Users</a></li>
<li class="active">Detail User</li>
@endsection

@section('content')
 <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8">
        <div class="box box-primary">
            <div class="x_panel">
                <div class="x_content">
                    <div class="box-body">
                        <form action="#" method="POST">
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
                                <label class='col-md-3 control-label'>Name</label>
                                <p class='col-md-7'>:&nbsp;{{ $data['user']->name }}</p>
                            </div>
                            <div class='form-group row'>
                                <label class='col-md-3 control-label'>Email</label>
                                <p class='col-md-7'>:&nbsp;{{ $data['user']->email }}</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover jambo_table bulk_action">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data['user']->products) === 0)
                                        <tr>
                                            <td colspan="2" class="text-center">Data not available</td>
                                        </tr>
                                        @else
                                            @foreach ($data['user']->products as $key => $product)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $product->product_name }}</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <!-- <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button> -->
                                    <a href="{{ route('users.index') }}" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> Back</a>
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
