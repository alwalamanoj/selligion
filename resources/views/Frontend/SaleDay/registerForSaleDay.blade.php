@extends('Frontend.layout.master')
@section('content')
    {{-- <section class="gray-bg py-4">
        <div class="container-fluid" style="background-image: url('https://cdn.web-global.fds.api.mi-img.com/mcfe--mi-account/static/static/media/background.981a7fc6..png'); background-size:  auto;background-position:top; background-repeat: no-repeat; padding-top:0px; background-size:cover;background-position:center top;background-repeat: no-repeat">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section> --}}
    <section class="desc-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6" data-aos="fade-right">
                    <form id="contactForm" action="/saleday/register" method="POST" class="py-4">
                        @csrf
                        <!-- First Name input -->
                        <div class="mb-3">
                            <label class="form-label text-white text-white" for="first_name" >First Name*</label>
                            <input name="first_name" class="form-control" id="first_name" type="text" placeholder="First Name" required />
                        </div>
                        <!-- Last Name input -->
                        <div class="mb-3">
                            <label class="form-label text-white" for="last_name">Last Name</label>
                            <input name="last_name" class="form-control" id="last_name" type="text" placeholder="Last Name" />
                        </div>

                        <!-- Email address input -->
                        <div class="mb-3">
                            <label class="form-label text-white" for="emailAddress">Email Address*</label>
                            <input name="email" class="form-control" id="emailAddress" type="email" placeholder="Email Address" required />
                        </div>

                        <!-- Email address input -->
                        <div class="mb-3">
                            <label class="form-label text-white" for="mobile_number">Mobile Number*</label>
                            <input type="number" name="mobile_number" class="form-control" id="mobile_number"  placeholder="Mobile Number" required />
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
                            <button class="btn knwMore-Bnt" id="submitButton" type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center" data-aos="fade-up">
                    <div class="text-white f-W-B f-sz-70 ">Register Now</div>
                    <p class="text-white text-justify">
                        A Linux based operating system which is most compatible for IDE platforms like Pycharm, Visual code
                        studio to help students learn coding. With guaranteed over the air updates till year 2028, Selligion
                        Abacca is designed to deliver a robust compute performance with constant updates that promise to
                        improve the user experience and functionalities with time.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
