@extends('layouts.app')

@section('content')
    <section class="photo-gallery py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Categories</h2>
                </div>
            </div>
            <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3 photos" data-bss-baguettebox="">
                @forelse ($categories as $category)
                    <div class="col item article">
                        <a href="/?category={{ $category->slug }}"><img class="img-fluid" src="https://source.unsplash.com/1200x800?{{ $category->name }}">
                            <p>{{ $category->name }}</p>
                        </a>
                    </div>
                @empty
                    <p>No Category</p>
                @endforelse

            </div>
        </div>
    </section>
@endsection
