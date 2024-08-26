@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="white-bg  p-3 mt-2">
                        <p><b>{{$blog->title}}</b></p>
                    <div class="blog-content">
                        {!! $blog->body !!}
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="white-bg p-3 mt-2">
                        <p><b>Other Blogs </b></p>
                        @foreach ($blogs as $blogItem)
                            <div>
                                <a href="{{ $blogItem->slug }}">
                                    {{ $blogItem->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: var(--secondary-color);
        }
        .blog-content img:not(.logo){
            width: 100% !important;
            object-fit: cover;
        }
        iframe{
            width: 100%;
        }
    </style>
@endsection
