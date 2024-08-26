@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container white-bg p-4">
            <!-- Wrapper container -->
            <div class="container py-4">
                <p><b>Careers</b></p>
                <form id="contactForm" action="/send/careers/mail" method="POST">
                    @csrf
                    <!-- Name input -->
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input name="name" class="form-control" id="name" type="text" placeholder="Name" required />
                    </div>

                    <!-- Email address input -->
                    <div class="mb-3">
                        <label class="form-label" for="emailAddress">Email Address</label>
                        <input name="email" class="form-control" id="emailAddress" type="email" placeholder="Email Address" required />
                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" required></textarea>
                    </div>

                    <!-- Form submissions success message -->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">Form submission successful!</div>
                    </div>

                    <!-- Form submissions error message -->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>

                    <!-- Form submit button -->
                    <div class="d-grid">
                        <button class="btn knwMore-Bnt" id="submitButton" type="submit">SEND</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
