@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-tags"></i> Data Categories
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">Categories</li>
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
                            <form class="form-inline" action="{{ route('categories.index') }}" method="GET">
                                <div class="form-group">
                                    <input type="text" name="category_name" placeholder="Category Name" value="{{ Request::get('category_name') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('categories.index') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
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
                            <div class="form-group">
                                <label style="font-size:24px;font-family:'Source Sans Pro',sans-serif;font-weight:500;">List Categories</label>
                            </div>                                
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['categories'] as $key => $category)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('categories.edit', ['category_id' => $category->category_id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                <a onclick="return confirm('Delete this data ?')" href="{{ route('categories.delete', ['category_id' => $category->category_id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {!! $data['categories']->appends(request()->except('key'))->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
