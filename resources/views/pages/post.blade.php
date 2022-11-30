@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span>Home</span></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><span>Posts</span></a></li>
                            <li class="breadcrumb-item"><a href="{{ $post->slug }}"><span>{{ $post->title }}</span></a>
                            </li>
                        </ol>
                        <h1>{{ $post->title }}
                            <br>
                        </h1>

                        <img src="https://picsum.photos/300/200"style="height: 700px;">

                        <article class="my-2 fs-5">
                            {!! $post->body !!}
                        </article>

                    </div>
                    <div style="margin-bottom: 5px;"><a class="btn btn-primary" role="button" style="margin-right: 10px;"
                            href="{{ App\Http\Controllers\PostController::prevPost($post->id) }}">Prev Post</a><a
                            class="btn btn-primary" role="button" style="margin-right: 10px;"
                            href="{{ App\Http\Controllers\PostController::nextPost($post->id) }}">Next Post</a></div>
                </div>
            </div>
        </div>
    </section>
@endsection
