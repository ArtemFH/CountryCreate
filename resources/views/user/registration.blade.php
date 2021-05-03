@extends('layouts.main')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-4" method="POST" action="{{ route('user.registration') }}">
        @csrf

        <div class="form-group">
            <label for="username" class="col-form-label-lg">Username</label>
            <input id="username" class="form-control" name="username" autocomplete="off" type="text" value="" placeholder="Username" required>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="col-form-label-lg">Password</label>
            <input id="password" class="form-control" name="password" type="password" value="" placeholder="Password" required>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirm_password" class="col-form-label-lg">Repeat password</label>
            <input id="confirm_password" class="form-control" name="confirm_password" type="password" value="" placeholder="Repeat password" required>
        </div>

        <fieldset class="form-group" style="margin-bottom: 0">
            <div class="row">
                <legend class="col-form-label-lg col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10" style="padding-top: 6px; padding-left: 35px">
                    @foreach($genders as $gender)
                        <div class="custom-control custom-radio" style="user-select: none">
                            <input type="radio" class="custom-control-input" id="{{$gender->id}}" name="gender_id" value="{{$gender->id}}" checked>
                            <label class="custom-control-label" for="{{$gender->id}}">{{$gender->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </fieldset>

        <div class="form-group">
            <label for="age" class="col-form-label-lg">Age</label>
            <input id="age" class="form-control" name="age" autocomplete="off" min="7" max="150" type="number" value="" placeholder="Age" required>
        </div>

        <div class="form-group center" style="padding-bottom: 20px;">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Registration</button>
        </div>
    </form>
@endsection
