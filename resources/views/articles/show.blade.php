@extends('layout')
     @section('content')
        <div id="wrapper">
        @if (Auth::check())
            <div id="page" class="container">
                <div id="content">
                    <div class="title">
                        <h2>{{ $article->title}}</h2>
                     </div>
                    <p>
                        <img src="/images/banner.jpg" 
                        alt="" 
                        class="image image-full" /> 
                    </p>

                    {{$article->body}}

                    <P style="margin-top: 1em">
                        @foreach ($article->tags as $tag)
                            <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a>
                        @endforeach
                    </P>
                </div>
            </div>
        @else
        <div id="page" class="container">
            <div id="content">
            <p>You must be logged in to view all article</p>
            </div>
        </div>
        @endif
        </div>
     @endsection