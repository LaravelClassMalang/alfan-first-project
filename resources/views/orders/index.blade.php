@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-tachometer"></i> Orders
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">Orders</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Cari</h3>
                        </div>
                        <div class="x_content">
                        <form class="form-inline" action="{{ route('orders.index') }}" method="GET">
                                <div class="form-group">
                                    <input type="number" name="order_id" placeholder="Order ID" value="{{ Request::get('order_id') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('orders.index') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>List Order
                           
                            <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Product Name</th>
                                        <th>User Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['orders'] as $key => $order)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->products->product_name }}</td>
                                            <td>{{ $order->users->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('orders.edit', ['order_id' => $order->order_id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Delete this data ?')" href="{{ route('orders.delete', ['order_id' => $order->order_id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {!! $data['orders']->appends(request()->except('key'))->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
