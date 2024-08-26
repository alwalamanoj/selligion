@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container">
            @if (!is_null($order))
            <div class="alert alert-success" role="alert">
                Your Order has been Confirm
                <a href="/my/orders">View Orders</a>
              </div>
            @endif
        </div>
    </section>
@endsection
