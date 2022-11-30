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
                            <li class="breadcrumb-item"><a href="{{ $post->slug }}"><span>{{ $post->title }}</span></a></li>
                        </ol>
                        <h1>{{ $post->title }}<br></h1><img
                            src="{{ asset('assets/img/test_image.jpg') }}" style="height: 700px;">
                        <p style="width: 1000px;"><span style="color: rgb(0, 0, 0);">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Fusce eget luctus justo, nec gravida risus. Cras a pretium tortor. Fusce
                                accumsan vitae orci vel accumsan. Cras nec dictum risus, vitae egestas enim. Cras viverra
                                velit at lectus consequat, et malesuada elit interdum. Donec pellentesque arcu ligula, vel
                                facilisis est vehicula non. Donec laoreet nisi at nulla aliquet, sed vulputate libero
                                molestie. Phasellus massa erat, pellentesque sed ante sed, sodales blandit purus. Morbi
                                tortor mauris, rhoncus sed enim in, lobortis facilisis odio. Sed elementum blandit turpis
                                vitae tristique. </span><br><br><span style="color: rgb(0, 0, 0);">Nullam vitae finibus mi,
                                quis molestie erat. Maecenas ac enim rutrum, vulputate erat ut, suscipit sapien.Aliquam
                                velit mi, gravida eu rutrum non, varius vel libero. Maecenas euismod erat sit amet massa
                                volutpat, et accumsan turpis porttitor. Nullam in ipsum ex. Maecenas ante tortor,
                                condimentum eu eros quis, viverra convallis diam. Vestibulum elementum ipsum sit amet
                                scelerisque placerat. Vestibulum a ligula tempus, commodo dui vel, ornare enim. Cras a enim
                                tortor.Aenean consectetur metus leo, a iaculis magna rhoncus sed. Praesent sapien augue,
                                imperdiet quis pellentesque eu, dictum sit amet orci. </span><br><br><span
                                style="color: rgb(0, 0, 0);">Etiam mattis leo massa, a porta sem pharetra posuere. Vivamus
                                ac est non turpis auctor pretium. Nulla velit eros, malesuada et tincidunt ut, mollis vel
                                tellus. Morbi condimentum ipsum nec diam vestibulum, id tempus ex dignissim. Donec laoreet
                                euismod metus, eget suscipit urna interdum id. Proin a nunc at sem vehicula placerat. Proin
                                vulputate risus et eros maximus, et placerat tortor dignissim. Cras et lacus justo.
                                Phasellus tincidunt ante vel erat lacinia ultrices. Donec volutpat tincidunt dictum. Aenean
                                scelerisque fringilla lorem.</span><br></p>
                    </div>
                    <div style="margin-bottom: 5px;"><a class="btn btn-primary" role="button" style="margin-right: 10px;"
                            href="lorem.html">Prev Post</a><a class="btn btn-primary" role="button"
                            style="margin-right: 10px;" href="lorem.html">Next Post</a></div>
                </div>
            </div>
        </div>
    </section>
@endsection
