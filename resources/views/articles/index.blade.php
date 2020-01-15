@extends('layout')
    @section('content')
    <div id="wrapper">
        <div id="page" class="container">
             @if(Auth::check())
                @forelse ($articles as $article)
                <div class="content">
                    <div class="title">
                        <h2>
                            <a href="{{$article->path()}}">
                                {{$article->title}}
                            </a>
                        </h2>
                    </div>
                </div>
                <p>{!! $article->excerpt!!}</p>

                <p>
                    <img src="/images/banner.jpg" alt="" class="image image-full">
                </p>
                @empty
                <p>No relevant articles yet.</p>
                @endforelse
            @else
                <p>You must be logged in to view all articles on this page!</p>
            @endif
        </div>

    </div>
    @endsection