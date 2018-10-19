@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-dashboard"></i> Dashboard
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">Kendaraan</li>
@endsection

@section('content')

<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Users</span>
            <span class="info-box-number">{{ $data['users'] }}</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Categories</span>
            <span class="info-box-number">{{ $data['categories'] }}</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Products</span>
            <span class="info-box-number">{{ $data['products'] }}</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-cart-plus"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Orders</span>
            <span class="info-box-number">{{ $data['orders'] }}</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<h3>
    <i class="fa fa-trash"></i> Data in Trash
</h3>
<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Users</span>
            <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Categories</span>
            <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Products</span>
            <span class="info-box-number">{{ $data['products_trash'] }}</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-cart-plus"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Data Orders</span>
            <span class="info-box-number">0</span>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection
