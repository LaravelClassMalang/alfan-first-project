@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-users"></i> Data User
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">Users</li>
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
                            <form class="form-inline" action="{{ route('users.index') }}" method="GET">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Nama" value="{{ Request::get('name') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" value="{{ Request::get('email') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i> </button>
                                </div>
                                <a href="{{ route('users.index') }}" class="btn btn-info btn-search pull-right"><i class="fa fa-database"></i> Tampilkan Semua</a>
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
                            <form class="form-inline" action="{{ route('users.index') }}" method="GET">
                                <div class="form-group">
                                    <label style="font-size:24px;font-family:'Source Sans Pro',sans-serif;font-weight:500;">List Users</label>
                                </div>                                
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-info btn-search pull-right"><i class="fa fa-plus"></i> Add New</a>
                                <a href="{{ route('users.export_xls_') }}" class="btn btn-sm btn-success btn-search pull-right" style="margin-right:5px;"><i class="fa fa-file-excel-o"></i> Export XLS</a>
                                <!-- <a href="{{ route('users.export_xls') }}" class="btn btn-sm btn-success btn-search pull-right" style="margin-right:5px;"><i class="fa fa-file-excel-o"></i> Export XLS</a> -->
                            </form>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['users'] as $key => $user)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('users.show', ['user_id' => $user->id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('users.edit', ['user_id' => $user->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('users.delete', ['user_id' => $user->id]) }}" method="POST" style="display:inline !important">
                                                    <!-- Method Post Will be replaced with this below -->
                                                    {{method_field('DELETE')}} {{csrf_field()}}
                                                    <button onclick="return confirm('Delete this data ?')" class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    {!! $data['users']->appends(request()->except('key'))->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
