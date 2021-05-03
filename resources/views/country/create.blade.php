@extends('layouts.main')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-4" method="POST" action="{{ route('country.create') }}">
        @csrf
        <div class="form-group">
            <label for="code" class="col-form-label-lg">Code</label>
            <input id="code" class="form-control" name="code" type="text" placeholder="Code" required>
        </div>
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Name</label>
            <input id="name" class="form-control" name="name" type="text" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="population" class="col-form-label-lg">Population</label>
            <input id="population" class="form-control" name="population" type="number" placeholder="Population" required>
        </div>
        <div class="form-group center" style="padding-bottom: 20px;">
            <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Create Country</button>
        </div>
    </form>
@endsection
