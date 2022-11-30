@extends('layouts.app')

@section('content')
    <section>
        <div class="container" style="padding-top: 10px;">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4 d-lg-flex d-xl-flex d-xxl-flex justify-content-lg-center justify-content-xl-center justify-content-xxl-center">
                <div class="col">
                    <div class="card bg-primary radius-15">
                        <div class="card-body text-center">
                            <div class="p-4 radius-15"><img class="rounded-circle bg-white shadow p-1 mx-auto" src="https://i.pinimg.com/736x/af/29/b9/af29b942852b1311fc5d44737fbfe7e1.jpg" width="110" height="110" >
                                <h5 class="text-white mb-0 mt-5">Miguel Emmara</h5>
                                <p class="text-white mb-3">Software Developer</p>
                                <div class="list-inline contacts-social mt-3 mb-3"><a class="border-0 list-inline-item"><i class="bx bxl-facebook"></i></a><a class="border-0 list-inline-item"><i class="bx bxl-twitter"></i></a><a class="border-0 list-inline-item"><i class="bx bxl-linkedin"></i></a></div>
                                <div class="d-grid"><a class="btn btn-white radius-15" role="button" href="https://miguelemmara.me/" target="_blank">Contact Me</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
