@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-envelope"></i> Upload Images
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li>Images</li>
<li class="active">Blob</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Input Images</h3>
                        </div>
                        <div class="x_content">
                            <div class="box-body">
                                <form action="{{ route('image_blob.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <div class="col-md-3">
                                            <input type="file" class="form-control" name="image_blob" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
