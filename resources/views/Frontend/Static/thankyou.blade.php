@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h2>Hello {{$name}}</h2>
                Your email has been sent successfully. We appreciate your message and will get back to you soon.
            </div>
        </div>
    </section>
@endsection
