@extends('Frontend.layout.master')
@section('content')
    <header class="hero-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="hero-header-section" data-aos="fade-n-right">
                        <div class="f-W-B f-sz-70 primary-text">SELLIGION PRAHO 2</div>
                        <p class="mb-0 d-none d-md-block">
                            Meticulously conceptualized and designed in India to meet your child’s varied computing
                            requirements. This cutting-edge device is designed to effortlessly connect with your TV and
                            convert it into a powerful computer. It can connect with a maximum of three screens at the same
                            time expanding your canvas of creativity.
                        </p>
                        <div class="f-W-M f-sz-30">	&#8377; {{ number_format($product->product_price,2,'.',',') }}</div>
                        <small class="mb-2">Including Taxes ({{ $product->tax->tax_name }})</small>
                        {{-- <button class="buy-now-btn">Buy Now</button> --}}
                        <form action="/checkout" method="GET">
                            @csrf
                            <input type="hidden" value="{{ base64_encode($product->id) }}" name="product_id">
                            @if ($product->quantity > 0)
                                <button type="submit" class="btn knwMore-Bnt w-50">BUY NOW</button>
                            @else
                                <button type="submit" class="btn btn-danger w-50" disabled>OUT OF STOCK</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container my-3">
            <div class="row">
                @foreach ($combinations as $combination)
                    <div class="col-12 col-sm-6 col-md-4 combo-card-container border py-2">
                        <div class="card h-100 combo-card">
                            <img loading="lazy" src="{{ asset($combination->combination_img_path) }}" class="card-img-top  blog-img"
                                alt="Selligion">
                            <div class="card-body combo-card-body">
                                <form action="/checkout" method="GET">
                                    @csrf
                                    <input type="text" readonly name="combination_id"
                                        value="{{ base64_encode($combination->id) }}" class="d-none">
                                    @php
                                        $comboDiscount = 0;
                                        $subTotal = 0;
                                        $grandTotal = 0;

                                        foreach ($combination->products as $productInCombination) {
                                            $subTotal += $productInCombination->product->product_price;
                                        }
                                        if ($combination->combination_discount_price) {
                                            $comboDiscount = $combination->combination_discount_price;
                                        }
                                        $grandTotal = $subTotal - $comboDiscount;
                                    @endphp
                                    <p class="text-black"><b>{{ $combination->combination_name }}</b></p>
                                    <p class="text-black">{{ $combination->combination_description }}</p>
                                    <p class="text-black mb-0">Actual Price:
                                        &#8377;<s>{{ number_format($subTotal, 2, '.', ',') }}</s></p>
                                    <p class="text-black">Get this Combo at Just </p>
                                    <div class="d-flex">
                                        <small>&#8377;</small>
                                        <h5> {{ number_format($grandTotal, 2, '.', ',') }} &nbsp;</h5>
                                    </div>
                                </form>
                            </div>
                            @if ($product->quantity > 0)
                            <a href="/checkout?combination_id={{ base64_encode($combination->id) }}"
                                class="btn knwMore-Bnt w-100">BUY NOW</a>
                            @else
                            <a  class="btn btn-danger w-100">OUT OF STOCK</a>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="specific-parts">
        <div class="container" data-aos="fade-n-up">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/abacca.png') }}" alt="Selligion Praho" class="img-fluid">
                        <p class="mt-1 text-center">Selligion Abacca</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/Intel.png') }}" alt="Selligion Praho" class="img-fluid">
                        <p class="mt-1 text-center">Intel J4105 Quadcore</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/RAM-2.png') }}" alt="Selligion Praho" class="img-fluid">
                        <p class="mt-1 text-center">8 GB On Board LPDDR4</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/Intel.png') }}" alt="Selligion Praho" class="img-fluid">
                        <p class="mt-1 text-center">Intel 7265. IEEE 802.11 a, b/g, n, ac</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/Bluetooth-1.png') }}" alt="Selligion Praho"
                            class="img-fluid">
                        <p class="mt-1 text-center">Intel 7265. Bluetooth 4.2</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/ROM-1.png') }}" alt="Selligion Praho" class="img-fluid">
                        <p class="mt-1 text-center">128 GB Storage. EMMC.</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/USB.png') }}" alt="Selligion Praho" class="img-fluid">
                        <p class="mt-1 text-center">Intel 7265. Bluetooth 4.2</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="specification-chip">
                        <img loading="lazy" src="{{ asset('assets/images/config/Triple-Display.png') }}" alt="Selligion Praho"
                            class="img-fluid">
                        <p class="mt-1 text-center">2xHDMI1+1xVGA Triple Display</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="ecom-brand">
            <div class="container lg-container-vw">
                <h5 data-aos="fade-n-up" class="text-center mb-1 ecomTitle f-W-SB mb__10"><b>Party of pre-loaded apps</b></h5>
                <p data-aos="fade-n-up" class="text-center mb-3">To groove and make your child's learning fun, Selligion Praho
                    2 comes with a party of pre-loaded apps. These apps support activities such as </p>
                <div>
                    <div class="ecom-Wrp-2" data-aos="fade-n-up">
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/firefox.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Firefox </div>
                            <div class="ecom-subTitle f-sz-14"> Browsing </div>
                        </div>

                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Chrome.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Chrome </div>
                            <div class="ecom-subTitle f-sz-14"> Browsing </div>
                        </div>
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Discord.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Discord </div>
                            <div class="ecom-subTitle f-sz-14"> Homework </div>
                        </div>
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/libreOffice.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Libre Office </div>
                            <div class="ecom-subTitle f-sz-14"> Homework </div>
                        </div>
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/zoom.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Zoom </div>
                            <div class="ecom-subTitle f-sz-14"> Homework </div>
                        </div>
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Canva.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Canva </div>
                            <div class="ecom-subTitle f-sz-14"> Designing </div>
                        </div>
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/GIMP.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> GIMP </div>
                            <div class="ecom-subTitle f-sz-14"> Designing </div>
                        </div>
                        <div class="ecomBlock text-center">
                            <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Visual-Studio.png') }}"
                                    alt="Selligion" class="w-100">
                            </div>
                            <div class="ecomTitle f-W-SB mb__10"> Visual Studio Code </div>
                            <div class="ecom-subTitle f-sz-14"> Coding </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-images">
        <div class="container py-3">
            <div class="row">
                <h5 class="ms-2" data-aos="fade-n-up">See it in Action</h5>
                <div class="owl-carousel product-carousel" data-aos="fade-n-up">
                    @foreach ($product->images as $image)
                        <div class="product-carousel-img-container zoom-img">
                            <a href="{{ asset($image->product_img_path) }}">
                                <img loading="lazy" src="{{ asset($image->product_img_path) }}" alt="Selligion Praho 2">
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <section class="py-4 specifications-container">
        <div class="container">
            <div class="row">
                <h5 class="ms-2" data-aos="fade-n-up">Specifications</h5>
                <div class="col-12 col-md-6">
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Product Type and Dimensions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Product Type</th>
                                <td>:</td>
                                <td>Mini PC</td>
                            </tr>
                            <tr>
                                <td scope="row">Dimension</th>
                                <td>:</td>
                                <td>130mm*130mm*45.5mm</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">CPU</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Processor</th>
                                <td>:</td>
                                <td>Intel Gemini Lake J4105.</td>
                            </tr>
                            <tr>
                                <td scope="row">Processor Frequency Base</th>
                                <td>:</td>
                                <td>1.5 GHz</td>
                            </tr>
                            <tr>
                                <td scope="row">Max Turbo Speed</th>
                                <td>:</td>
                                <td>2.5 GHz.</td>
                            </tr>
                            <tr>
                                <td scope="row">Total Cores</th>
                                <td>:</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td scope="row">Total Threads</th>
                                <td>:</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td scope="row">Instruction Set</th>
                                <td>:</td>
                                <td>64-Bit</td>
                            </tr>
                            <tr>
                                <td scope="row">Lithography</th>
                                <td>:</td>
                                <td>14 nm</td>
                            </tr>
                            <tr>
                                <td scope="row">Cache</th>
                                <td>:</td>
                                <td>4 MB</td>
                            </tr>
                            <tr>
                                <td scope="row">TDP</th>
                                <td>:</td>
                                <td>10 W</td>
                            </tr>
                            <tr>
                                <td scope="row">Processor Graphics</th>
                                <td>:</td>
                                <td>Intel UHD Graphics 600</td>
                            </tr>
                            <tr>
                                <td scope="row">Graphics Base Frequency</th>
                                <td>:</td>
                                <td>250 MHz</td>
                            </tr>
                            <tr>
                                <td scope="row">Graphics Burst Frequency</th>
                                <td>:</td>
                                <td>750 MHz</td>
                            </tr>
                            <tr>
                                <td scope="row">4K Support</th>
                                <td>:</td>
                                <td>Yes, at 60 Hz</td>
                            </tr>
                            <tr>
                                <td scope="row">DirectX Support</th>
                                <td>:</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td scope="row">Open GL Support</th>
                                <td>:</td>
                                <td>4.4</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Storage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">EMMC</th>
                                <td>:</td>
                                <td>128GB</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Display</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Supports Triple Display</td>
                                <td>:</td>
                                <td>2x HDMI1 + 1x VGA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-6">
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Memory</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Model</th>
                                <td>:</td>
                                <td>LPDDR4</td>
                            </tr>
                            <tr>
                                <td scope="row">Capacity</th>
                                <td>:</td>
                                <td>8 GB</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Connectivity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Network Adapter</td>
                                <td>:</td>
                                <td>Intel 7265 on Board</td>
                            </tr>
                            <tr>
                                <td scope="row">Wi-Fi</td>
                                <td>:</td>
                                <td>IEEE 802.11 a, b/g, n, ac</td>
                            </tr>
                            <tr>
                                <td scope="row">Bluetooth</td>
                                <td>:</td>
                                <td>Bluetooth 4.2</td>
                            </tr>
                            <tr>
                                <td scope="row">Ethernet</td>
                                <td>:</td>
                                <td>Lan 1 - 10M/100M/1000M Self-adaption</td>
                            </tr>
                            <tr>
                                <td scope="row">USB 2.0</td>
                                <td>:</td>
                                <td>USB2.0 Type-A x2</td>
                            </tr>
                            <tr>
                                <td scope="row">USB 3.0</td>
                                <td>:</td>
                                <td>USB3.0 Type-A x2</td>
                            </tr>
                            <tr>
                                <td scope="row">HDMI</td>
                                <td>:</td>
                                <td>HDMI 1.4b Type-A x2</td>
                            </tr>
                            <tr>
                                <td scope="row">VGA</td>
                                <td>:</td>
                                <td>VGA x1</td>
                            </tr>
                            <tr>
                                <td scope="row">RJ45</td>
                                <td>:</td>
                                <td>Gigabyte Ethernet - RJ45 x1</td>
                            </tr>
                            <tr>
                                <td scope="row">Antenna 1</td>
                                <td>:</td>
                                <td>WiFi 2.4+BT x1</td>
                            </tr>
                            <tr>
                                <td scope="row">Antenna 2</td>
                                <td>:</td>
                                <td>WIFI 5.0</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Power Supply</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Power Supply</td>
                                <td>:</td>
                                <td>Input 100~240V 50/60Hz Output 12V/2.5A, 5.5*2.1mm</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Temperature and Humidity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Working Temperature</td>
                                <td>:</td>
                                <td>0~40℃</td>
                            </tr>
                            <tr>
                                <td scope="row">Memory Temperature</td>
                                <td>:</td>
                                <td>-20~60℃</td>
                            </tr>
                            <tr>
                                <td scope="row">Humidity</td>
                                <td>:</td>
                                <td>90% @ 40 °C (No Condensation)</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-striped prod-desc-table m-2 p-2" data-aos="fade-n-up">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Audio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Audio In/Out</td>
                                <td>:</td>
                                <td>3.5mm Jack x1 (2 in 1)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="desc-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6" data-aos="fade-n-up">
                    <div class="text-white f-W-B f-sz-70 ">OPERATING SYSTEM</div>
                    <p class="text-white mb-2">
                        <b>
                            Selligion Abacca
                        </b>
                    </p>
                    <p class="text-white">
                        A Linux based operating system which is most compatible for IDE platforms like Pycharm, Visual code
                        studio to help students learn coding. With guaranteed over the air updates till year 2028, Selligion
                        Abacca is designed to deliver a robust compute performance with constant updates that promise to
                        improve the user experience and functionalities with time.
                    </p>
                </div>
                <div class="col-12 col-md-6 img-desc-container" data-aos="fade-n-right">
                    <img loading="lazy" src="{{ asset('assets/images/config/abacca.png') }}" alt="Selligion Praho" class="img-fluid"
                        width="150px">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="fortune-sec position-relative overflow-hidden"
            style="background-image: url({{ asset('assets/images/Fortune-bg.png') }});">
            <div class="container lg-container-vw">
                <div class="outer-img">
                    <div class="conect-leftWrp">
                        <img loading="lazy" src="{{ asset('assets/images/connect-img-1.png') }}" alt="Selligion" class="w-100">
                    </div>
                    <div class="conect-RightWrp">
                        <img loading="lazy" src="{{ asset('assets/images/connect-img-1.png') }}" alt="Selligion" class="w-100">
                    </div>
                </div>
                <div class="fortune-Inner">
                    <div class="connect-topImg">
                        <img loading="lazy" src="{{ asset('assets/images/coonect-port-img.png') }}" alt="Selligion" class="w-100">
                    </div>
                    <div class="coonecter-Text text-center" data-aos="fade-n-up">
                        <div class="section-title">
                            Efficiency thrives on connectivity
                        </div>
                        <div class="f-sz-25 f-W-M">With Selligion Praho, we have made sure that connectivity is never an
                            issue. It comes with built-in connectivity options which include Bluetooth, Wi-Fi, 2x HDMI Ports
                            + 1x VGA port, 2x USB 3.0, 2x USB 2.0, 3.5 mm audio jack and much more. </div>
                    </div>
                    <div class="connect-topImg">
                        <img loading="lazy" src="{{ asset('assets/images/coonect-port-img.png') }}" alt="Selligion" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="desc-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12" data-aos="fade-n-up">
                    <h2 class="text-center text-white">3 years commitment to transforming your child's life journey</h2>
                    <p class="text-center text-white">
                        We realize its important that your child has a continuous tech support and in order to achieve this
                        we have increased our warranty to a whopping 36 months and an easy access to customer service
                        support.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="desc-container-white">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-12" data-aos="fade-n-up">
                    <p class="text-center">
                        Light weight heavy duty computer catapulting your child into a brighter future and as a value add,
                        it also adds a stylish touch to your child's study desk.
                    </p>
                </div>
                <div class="col-12 col-md-12 img-desc-container" data-aos="fade-n-right">
                    <img loading="lazy" src="{{ asset('assets/images/desk.jpg') }}" alt="Selligion Praho" class="img-fluid"
                        width="350px">
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="desc-container-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6" data-aos="fade-n-up">
                    <h1>3 years commitment to transforming your child's life journey</h1>
                    <p class="mb-2">
                        <b>
                            Fortune favours the connected.
                        </b>
                    </p>
                    <p>
                        Selligion Praho 2 is a powerful, low maintenance computer that is designed to perform – Selligion
                        Praho 2 delivers on almost all the needs and wants of a learner for less than ₹14 a day. Selligion
                        Praho connect to a TV or up to 3 monitors – Comes with a 12 months long device replacement warranty
                        – and as an introductory offer, each Selligion Praho 2 comes with a set of free set of full-sized
                        wired keyboard and mouse to help kick start the learning immediately.
                    </p>
                    <p>
                        Selligion Praho 2 comes with built in standard connectivity options like Wi-Fi, Bluetooth, HDMI and
                        Ethernet port along with 4 USB slots to connect your computer to other devices easily.
                    </p>
                </div>
            </div>
        </div>
    </section> --}}

    <style>
        body {
            position: relative;
        }

        .combo-card-body {
            flex: 1 1 auto;
            padding: 1rem 1rem;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            justify-content: flex-end;
        }

        .combo-card-container {
            margin-bottom: 12px;
        }

        .combo-card {
            border-radius: 0px;
            border: none;
        }
    </style>
@endsection
