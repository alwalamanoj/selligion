@extends('Frontend.layout.master')
{{$title = "Login - Selligion"}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="login-main-container">
                <a href="login.php" class="btn knwMore-Bnt">Login/Register</a>
            </div>
            <div class=" lg-box">

                <div class="text-center">
                    This is meant for Developers, Login for Users is restricted here
                </div>

                <div class="card-body">
                    <form method="POST" action="/custom/login/dev">
                        @csrf
                        <div class="row mb-3">
                            <label for="key" class="col-md-4 col-form-label text-md-end">Key</label>
                            <div class="col-md-6">
                                <input id="key" type="text" name="key" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn knwMore-Bnt">
                                    LOGIN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
