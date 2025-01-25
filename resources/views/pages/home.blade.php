@extends('layouts.app')

@section('content')
    <section>
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="container" style="background: #ffffff;margin-top: 10px;margin-bottom: 10px;">
                    <div class="row mb-2" style="padding-bottom: 10px;border-width: 2px;padding-top: 10px;">
                        <div class="col-md-3 justify-content-center">
                            <a href="{{ $post->slug }}">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" style="width: 290px;max-height:181px"
                                        class="img-fluid" loading="lazy">
                                @else
                                    <img src="https://picsum.photos/1200/800"
                                        style="width: 290px;max-height:181px" class="img-fluid" loading="lazy">
                                @endif
                            </a>
                        </div>

                        <div class="col">
                            <div class="mt-4">
                                <div class="article">
                                    <a href="{{ $post->slug }}">
                                        <h3 class="d-xl-flex">{{ $post->title }}
                                            <br>
                                        </h3>
                                    </a>
                                </div>
                                <p class="d-xl-flex">{{ $post->excerpt }}
                                    <br>
                                </p>
                                <div class="d-flex">
                                    @if ($post->author->haveAvatar == true)
                                        <a href="/?author={{ $post->author->username }}"><img
                                                class="rounded-circle flex-shrink-0 me-3 fit-cover" width="40"
                                                src="{{ asset('storage/' . $post->author->avatar) }}"></a>
                                    @else
                                        <a href="/?author={{ $post->author->username }}"><img
                                                class="rounded-circle flex-shrink-0 me-3 fit-cover" width="40"
                                                src="{{ asset($post->author->default_avatar) }}"></a>
                                    @endif

                                    <div>
                                        <p class="fw-bold mb-0 article">
                                            <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                        </p>
                                        <p class="text-muted mb-0 article">
                                            <a href="{{ route('show-categories') }}">Category</a>:
                                            <a href="/?category={{ $post->category->slug }}">{{ $post->category->name }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center fs-4">No Post Found!</p>
        @endif
    </section>
    {{-- Pagination --}}
    <div class="container d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
