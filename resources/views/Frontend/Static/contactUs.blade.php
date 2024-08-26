@extends('Frontend.layout.master')
@section('content')
    <section class="white-bg py-4">
        <div class="container white-bg">
            <!-- Wrapper container -->
            <div class="container py-2">
                <div class="row py-1">
                    <div class="col-12 col-md-2"></div>
                    <div class="col-12 col-md-10">
                        <h1 class="md-ms-4"><b>Contact Us</b></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-1 d-none d-md-block"></div>
                    <div class="col-12 col-md-2">
                        <div class="d-flex md-justify-content-center align-items-center">
                            <div class="social-container-contact-us d-flex flex-sm-row flex-md-column mt-5 align-items-center">
                                <a href="https://wa.me/917715890085" target="_blank">
                                    <img src="{{ asset('assets/images/social-contact/Whatsapp-02_50x50.webp') }}"
                                    alt="Whatsapp - Selligion">
                                </a>
                                <a href="https://www.instagram.com/selligion/">
                                    <img src="{{ asset('assets/images/social-contact/Instagram-02_50x50.webp') }}"
                                    alt="Instagram - Selligion">
                                </a>
                                <a href="https://www.facebook.com/Selligion">
                                    <img src="{{ asset('assets/images/social-contact/Facebook-02_50x50.webp') }}"
                                    alt="Facebook - Selligion">
                                </a>
                                <a href="https://www.youtube.com/@selligion">
                                    <img src="{{ asset('assets/images/social-contact/Youtube-02_50x50.avif') }}"
                                    alt="Youtube - Selligion">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <form action="/send/contactUs/mail" method="POST" class="mt-2 mt-md-5">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <!-- Name -->
                                        <div class="mb-3">
                                            <label class="form-label mb-1" for="name">Name</label>
                                            <input name="name" class="form-control" id="name" type="text"
                                                placeholder="Name" required />
                                        </div>
                                        <!-- Email address input -->
                                        <div class="mb-3">
                                            <label class="form-label mb-1" for="emailAddress">Email Address</label>
                                            <input name="email" class="form-control" id="emailAddress" type="email"
                                                placeholder="Email Address" required />
                                        </div>
                                        <!-- Phone Number input -->
                                        <div class="mb-3">
                                            <label class="form-label mb-1" for="phone_number">Phone Number</label>
                                            <input name="phone_number" class="form-control" id="phone_number" type="number"
                                                placeholder="Mobile Number" required />
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label mb-1 mb-1" for="message">Message</label>
                                            <textarea name="message" class="form-control" id="message" type="text" placeholder="Message" style="height: 12rem;"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="mb-3 mt-1 mt-1 mt-md-4 d-block">
                                            <button type="submit" class="btn knwMore-Bnt w-100">SEND</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="embed-responsive embed-responsive-16by9 mt-1">
                            <iframe tabindex="0" style="border: 0;" width="100%" height="400"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.9841188067103!2d72.83405887418381!3d19.064435852337496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9bb6794121f%3A0x5efb64371fe3ad14!2sSelligion%20Technologies%20-%20HQ!5e0!3m2!1sen!2sin!4v1705069636555!5m2!1sen!2sin"
                                allowfullscreen="" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                {{-- <form id="contactForm" action="/send/contactUs/mail" method="POST">
                    @csrf
                    <!-- Name input -->
                    <div class="mb-3">
                        <label class="form-label mb-1" for="name">Name</label>
                        <input name="name" class="form-control" id="name" type="text" placeholder="Name" required />
                    </div>

                    <!-- Email address input -->
                    <div class="mb-3">
                        <label class="form-label mb-1" for="emailAddress">Email Address</label>
                        <input name="email" class="form-control" id="emailAddress" type="email" placeholder="Email Address" required />
                    </div>

                    <!-- Phone Number input -->
                    <div class="mb-3">
                        <label class="form-label mb-1" for="phone_number">Phone Number</label>
                        <input name="phone_number" class="form-control" id="phone_number" type="number" placeholder="Mobile Number" required />
                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                        <label class="form-label mb-1" for="message">Message</label>
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

                </form> --}}

            </div>
        </div>
    </section>
@endsection
