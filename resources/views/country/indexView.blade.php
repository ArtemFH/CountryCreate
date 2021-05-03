@extends('layouts.main')
@section('head')
    @parent
    <title>{{ $title }}</title>
@endsection
@section('body')
    <form class="col-4 columns" method="POST" action="{{ route('country.comment', $country->id) }}">
        @csrf
        <div class="card-body">
            <p class="mb-1">ID: {{ $country->id }}</p>
            <p class="mb-1">Code: {{ $country->code }}</p>
            <p class="card-text">Name: {{ $country->name }}</p>
            <p class="card-text">Population: {{ $country->population }}</p>
            <p class="card-text">Was added: {{ $country->created_at }}</p>
        </div>
        <div class="card-body">
            <h2>Comments</h2>
            @foreach(\App\Models\Comment::where('country_id', $country->id)->get() as $comment)
                <div>{{$comment->description}}</div>
            @endforeach
        </div>
        @if(auth()->user())
            @if(auth()->user()->role_id == '30')
                <a class="nav-link" href="/deleteCountry/{{$country->id}}">Удалить страну</a>
            @endif
        @endif
        @if(auth()->user())
            <div class="form-group">
                <label for="comment" class="col-form-label-lg">Add comment</label>
                <input id="comment" class="form-control" name="description" type="text" placeholder="Comment" required>
            </div>

            <div class="form-group center" style="padding-bottom: 20px;">
                <button class="buttonSuccess btn btn-lg btn-primary" type="submit" name="send" value="1">Post comment</button>
            </div>
        @endif
    </form>
@endsection
