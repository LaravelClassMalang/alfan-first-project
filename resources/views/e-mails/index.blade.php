@extends('layouts.app')

@section('page-title')
<h1>
    <i class="fa fa-envelope"></i> E-Mail
</h1>
@endsection

@section('breadcrumb')
<li><a href="#">Dashboard</a></li>
<li class="active">e-Mails</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h3>Input Email</h3>
                        </div>
                        <div class="x_content">
                            <div class="box-body">
                                <form action="{{ route('e-mails.send') }}" method="POST">
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
                                        <label class='col-md-3 control-label'>To</label>
                                        <div class='col-md-7'>
                                            <input type="email" name="to" id="to" class="form-control" placeholder="Dikirim kepada ...">
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label class='col-md-3 control-label'>Subject</label>
                                        <div class='col-md-7'>
                                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Judul Pesan ...">
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label class='col-md-3 control-label'>Messages</label>
                                        <div class='col-md-7'>
                                            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Pesan yang dikirim ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-envelope"></i> Send</button>
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
