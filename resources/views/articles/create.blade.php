@extends('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endseciont
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
        @if (Auth::check())
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="POST" action="/articles">
                @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input type="text"
                         class="input @error('title') is-danger @enderror" 
                         name="title" 
                         id="title"
                         value="{{old('title')}}">
                        @error('title')
                        <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">excerpt</label>

                    <div class="control">
                        <textarea name="excerpt"
                         id="excerpt" 
                         class="textarea @error('excerpt') is-danger @enderror">{{old('excerpt')}}</textarea>
                        @error('excerpt')
                            <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div  class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body">{{old('body')}}</textarea>
                        @error('body')
                            <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>


                <div class="field">
                    <label class="label" for="body">Tags</label>

                    <div  class="select is-mulitple control">
                        <select name="tags[]" 
                        multiple
                        id="">
                             
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">submit</button>
                    </div>
                </div>

            </form>

        @else

            <p>You need to be logged in to create new articles!</p>
        @endif

        </div>
    </div>
@endsection