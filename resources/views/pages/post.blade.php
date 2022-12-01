@extends('layouts.app')

@section('content')
    <section>
        <div class="container pb-3 pt-3 mb-3 mt-3" style="background: #ffffff;">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="d-none d-sm-block">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><span>Home</span></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><span>Posts</span></a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ $post->slug }}"><span>{{ $post->title }}</span></a>
                                </li>
                            </ol>
                        </nav>

                        <h1>{{ $post->title }}
                            <br>
                        </h1>

                        <div class="d-flex mb-3"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50"
                                height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                            <div>
                                <p class="fw-bold mb-0">{{ $post->author->name }}</p>
                                <p class="text-muted mb-0 article"><a href="{{ route('categories') }}">Category</a>:
                                    {{ $post->category->name }}</p>
                            </div>
                        </div>

                        <img src="https://picsum.photos/1000/600" class="img-fluid">

                        <article class="my-2 fs-5">
                            {!! $post->body !!}
                        </article>

                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <a class="btn btn-primary" role="button" style="margin-right: 10px;"
                            href="{{ App\Http\Controllers\PostController::prevPost($post->id) }}">Prev Post</a>
                        <a class="btn btn-primary" role="button" style="margin-right: 10px;"
                            href="{{ App\Http\Controllers\PostController::nextPost($post->id) }}">Next Post</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
