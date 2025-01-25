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
                        <a href="/?category={{ $category->slug }}">

                            @if ($category->image)
                                <img class="img-fluid" style="width: 800px;height:250px" src="{{ asset('storage/' . $category->image) }}">
                            @else
                                <img class="img-fluid" style="width: 800px;height:250px" src="https://picsum.photos/1200/800">
                            @endif

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
