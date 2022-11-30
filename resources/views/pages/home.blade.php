@extends('layouts.app')

@section('content')
    <section>
        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="container" style="background: #ffffff;margin-top: 10px;margin-bottom: 10px;">
            <div class="row mb-2" style="padding-bottom: 10px;border-width: 2px;padding-top: 10px;">
                <div class="col-md-12">
                    <div class="d-xl-flex align-items-xl-center"><a href="/post/{{ $post->slug }}"><img
                                class="img-fluid" src="assets/img/test_image.jpg" style="height: 170px;"
                                loading="lazy"></a>
                        <div style="padding-left: 10px;">
                            <h3 class="d-xl-flex">{{ $post->title }}<br></h3>
                            <p class="d-xl-flex">{{ $post->excerpt }}<br></p>
                            <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50"
                                    height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png">
                                <div>
                                    <p class="fw-bold mb-0">John Smith</p>
                                    <p class="text-muted mb-0">Erat netus</p>
                                </div>
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
    <div class="container d-xl-flex justify-content-xl-center">
        <div class="row" style="padding: 2px;">
            <div class="col">
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" aria-label="Previous" href="#"><span
                                    aria-hidden="true">«</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                    aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
