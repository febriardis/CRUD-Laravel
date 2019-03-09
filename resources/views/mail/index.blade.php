@extends('layouts.layout')

@section('content')
<div class="container"><br>
    <h1>Send Email</h1>
    @if(\Session::has('alert-failed'))
        <div class="alert alert-failed">
            <div>{{Session::get('alert-failed')}}</div>
        </div>
    @endif
    @if(Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
    @endif

    <form action="{{ route('email.send') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <span class="text-danger">{{$errors->first('email')}}</span>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <span class="text-danger">{{$errors->first('nama')}}</span>
            <input type="text" class="form-control" id="name" name="nama"/>
        </div>
        <div class="form-group">
            <label for="judul">Judul</label>
            <span class="text-danger">{{$errors->first('judul')}}</span>
            <input type="text" class="form-control" id="judul" name="judul"/>
        </div>
        <div class="form-group">
            <label for="pesan">Pesan</label>
            <span class="text-danger">{{$errors->first('pesan')}}</span>
            <textarea class="form-control" id="pesan" name="pesan"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-md btn-primary">Send Email</button>
        </div>
    </form>
</div>
@endsection