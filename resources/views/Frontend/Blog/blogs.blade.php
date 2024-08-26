@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-3">
                        <a href="/blogs/{{ $blog->slug }}">
                            <div class="card">
                                <img loading="lazy" src="{{ $blog->thumbnail_img_path }}" class="card-img-top  blog-img"
                                    alt="{{ $blog->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    @if (!is_null($blog->description))
                                        <p class="card-text description mb-0">{{ $blog->description }}</p>
                                        <a href="#" class="read-more">Read more</a>
                                    @else
                                        <br><br><br>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <style>
        .description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .expanded {
            -webkit-line-clamp: unset;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: var(--secondary-color);
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var readMoreButtons = document.querySelectorAll(".read-more");

            readMoreButtons.forEach(function(button) {
                button.addEventListener("click", function(e) {
                    e.preventDefault();
                    var description = button.previousElementSibling;
                    description.classList.toggle("expanded");
                    button.textContent = button.textContent === "Read more" ? "Read less" :
                        "Read more";
                });
            });
        });
    </script>
@endsection
