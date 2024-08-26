@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h2>Hello {{$saleDayUser->first_name}}</h2>
                You will be Notified once the Sales Day Starts
                <a href="/">Go Home</a>
            </div>
        </div>
    </section>
@endsection
