@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endseciont

@section('content')
<div id="wrapper">
        <div id="page" class="container">
        @if (Auth::check())
            <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>

            <form method="POST" action="/articles/{{$article->id}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input type="text" class="input" name="title" id="title" value="{{$article->title}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">excerpt</label>

                    <div class="control">
                        <textarea name="excerpt" id="excerpt" class="textarea">{{$article->excerpt}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div  class="control">
                        <textarea class="textarea" name="body" id="body">{{$article->body}}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">submit</button>
                    </div>
                </div>

            </form>
        @else
            <p>You need to be logged in to edit the article You choosed</p>
        @endif

        </div>
    </div>
@endsection