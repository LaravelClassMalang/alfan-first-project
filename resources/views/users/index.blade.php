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

    <div class="box">
        <div class="box-body">
            <div class="box-header">
                <span>List Users</span>
                <a class="btn btn-sm btn-primary pull-right" href="{{ route('users.create') }}"> 
                    <i class="fa fa-plus">&nbsp;Add User</i>
                </a>
            </div>
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 10px">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Delete this data ?')" href="{{ route('users.delete', ['user' => $user->id]) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="clearfix"></div>
            <div class="text-center">
                {!! $users->appends(request()->except('key'))->render() !!}
                <!-- {!! $users->links() !!} -->
            </div>
        </div>
    </div>
@endsection
