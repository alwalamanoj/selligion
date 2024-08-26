@extends('Frontend.layout.master')
@section('content')
    <section class="gray-bg py-4">
        <div class="container white-bg p-4">
            <div class="row">
                <div class="col-12 mb-1">
                    <h5 class="text-center">About Us</h5>
                </div>
                <div class="col-12 col-md-6">
                    <h2 class="o_default_snippet_text"><br></h2>
                    <h2 style="text-align: justify;">About Selligion</h2>
                    <p style="text-align: justify;">At Selligion, we're reimagining computers.</p>
                    <p style="text-align: justify;">Less than 8% of Indian households with a school going child have
                        access to a computer. The primary reason for this disparity - Computer in general are
                        unaffordable for most Indian homes.&nbsp;</p>
                    <p style="text-align: justify;">Despite being a major global power with potentially the largest
                        number of computer users - India does not have a credible and indigenous compute-ecosystem.
                        Until recently, we didn't even design and build our own computers.</p>
                    <p style="text-align: justify;">At Selligion, we're trying to solve this by designing and building
                        our own range of cost effective computer hardware, that runs our own customised Operating System
                        and Cloud Infra - which is delivered to our users directly.&nbsp;</p>
                    <p style="text-align: justify;">We're building a continental network of affordable computers
                        connected to a very high-end, low latency cloud infra with a potential to deliver any processing
                        power, memory, storage, application and GPU instantly and on demand.&nbsp;<i
                            style="font-style: italic">Do the regular on your local machine - do the heavy lifting over
                            the cloud.</i></p>
                    <p style="text-align: justify;"><i style="font-style: italic"><strong style="font-weight: 700">Truly
                                the latest in computing forever</strong>.</i></p>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img loading="lazy" src="{{ asset('assets/images/triangular-device.gif') }}" alt="Selligion" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <section class="video-section">
                        <video autoplay muted loop class="video-bg">
                            <source src="{{ asset('assets/videos/Konark.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="video-overlay">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="f-W-B f-sz-70 text-white text-center mt-3">THE SELLIGION IDEOLOGY</div>
                                        <p class="text-white text-justify">
                                            The Selligion ideoglyph is inspired from an ancient symbol of Indian
                                            subcontinental
                                            origin which recurs in many forms across archeological digs, medieval coins and
                                            architecture, right from Shakāwand and Mes Aynak in modern day Afghanistan in
                                            the
                                            north to Keezhadi near Madurai, Tamil Nadu in the south. From the mysterious
                                            fire
                                            temples of Azerbaijan in the west to the picturesque Kaiyuan Temple of Fujian,
                                            China, in the east.
                                        </p>
                                        <p class="text-white text-justify">
                                            Indian epigraphist A B Walawalkar (1897-1970) claimed this symbol to be a
                                            phonograph
                                            written in a version of early linear Brahmi. According to English orientalist
                                            James
                                            Princep (1799-1840) - this perhaps was a symbol representing the flame of Mount
                                            Meru.
                                        </p>
                                        <p class="text-white text-justify">
                                            Experts do not have a consensus on the original meaning of this symbol and many
                                            claim this to mean 'yes', 'it is', 'will be' or 'health and happiness to you'.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <h2 class="text-center">Our Investors and Mentors</h2>
                </div>
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Vivekananda-Hallekere-2.png') }}" alt="Selligion - Team"
                        class="img-fluid">
                    <h6 class="text-center">Vivekananda Hallekere</h6>
                    <p class="text-center">CEO and Co-Founder at Bounce</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Alvin-Tse-2.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Alvin Tse</h6>
                    <p class="text-center">GM, Xiaomi India</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Captain-Prashant-Priya-1.png') }}" alt="Selligion - Team"
                        class="img-fluid">
                    <h6 class="text-center">Captain Prashant Priya</h6>
                    <p class="text-center">Founder, Amarante Shipping - India, Singapore</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Nishchay-AG.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Nischay AG</h6>
                    <p class="text-center">CEO and Co-Founder at Jar</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Dr-Aniruddha-Malpani.png') }}" alt="Selligion - Team"
                        class="img-fluid">
                    <h6 class="text-center">Dr Aniruddha Malpani</h6>
                    <p class="text-center">Pioneering medical professional, investor & activist.</p>
                </div>
                {{-- Team Card End --}}
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <h2 class="text-center">Team Selligion</h2>
                </div>
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Abhishek.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Abhishek Ramanuja</h6>
                    <p class="text-center">Sales</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Apeksha.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Apeksha Mehta</h6>
                    <p class="text-center">Operations + Commstrat</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Arjoo-2.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Arjoo Vishwakarma</h6>
                    <p class="text-center">Operations</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Chetan.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Chetan Pandav</h6>
                    <p class="text-center">Operations</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Joby-John.png') }}" alt="Selligion - Team"
                        class="img-fluid">
                    <h6 class="text-center">Joby John</h6>
                    <p class="text-center">Technology</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Joshua.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Joshua K</h6>
                    <p class="text-center">Product</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Naman.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Naman Chakraborty</h6>
                    <p class="text-center">Founder</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Niharika.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Niharika Sheel</h6>
                    <p class="text-center">Operations</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Reena.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Reena Onkar</h6>
                    <p class="text-center">Finance and Accounting</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Siddhi.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Siddhi Shirvatkar</h6>
                    <p class="text-center">Finance and Accounting</p>
                </div>
                {{-- Team Card End --}}
                {{-- Team Card --}}
                <div class="col-6 col-md-4 text-center">
                    <img loading="lazy" src="{{ asset('assets/images/team/Snehil.png') }}" alt="Selligion - Team" class="img-fluid">
                    <h6 class="text-center">Snehil Dandwate</h6>
                    <p class="text-center">Communications</p>
                </div>
                {{-- Team Card End --}}
            </div>
        </div>
    </section>
    <style>
        .video-section {
            position: relative;
            height: 400px;
            /* Adjust the height as needed */
            overflow: hidden;
        }

        .video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-y: scroll;
        }

        @media screen and (max-width: 630px) {
            .video-overlay {
                align-items: stretch;
            }
        }
    </style>
@endsection
