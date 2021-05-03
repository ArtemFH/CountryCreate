@extends('layouts.main')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-3" method="POST" action="{{ route('user.login') }}">
        @csrf
        <div class="form-group">
            <label for="username" class="col-form-label-lg">Username</label>
            <input id="username" class="form-control" name="username" autocomplete="off" type="text" value="" placeholder="Username">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Password</label>
            <input id="password" class="form-control" name="password" type="password" value="" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group center" style="padding-bottom: 20px;">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Login</button>
        </div>
    </form>
@endsection
