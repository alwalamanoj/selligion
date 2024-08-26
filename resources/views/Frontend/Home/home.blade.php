@extends('Frontend.layout.master')
@section('content')
    <header>
        <div class="hero-Banner">
            <div class="bannerWrap">

                <div class="heroRound-Shape round5 d-none d-lg-block"><img loading="lazy" class="clock-Rotate"
                        src="{{ asset('assets/images/circle-shapes-5.png') }}" alt="Selligion"> </div>
                <div class="heroRound-Shape round4"><img loading="lazy" class="anticlock-Rotate"
                        src="{{ asset('assets/images/circle-shapes-4.png') }}" alt="Selligion"> </div>
                <div class="heroRound-Shape round3"><img loading="lazy" class="clock-Rotate"
                        src="{{ asset('assets/images/circle-shapes-3.png') }}" alt="Selligion"> </div>
                <div class="heroRound-Shape round2"><img loading="lazy" class="anticlock-Rotate"
                        src="{{ asset('assets/images/circle-shapes-2.png') }}" alt="Selligion"> </div>
                <div class="heroRound-Shape round1"><img loading="lazy" class="clock-Rotate"
                        src="{{ asset('assets/images/circle-shapes-1.png') }}" alt="Selligion"> </div>
                <div class="wrapperCont">
                    <div class="container lg-container-vw">
                        <div class="herosec-Text text-center mt-more" data-aos="zoom-in">
                            <div class="hero-Heading mb__35 d-flex justify-content-center">
                                <img loading="lazy" src="{{ asset('assets/images/praho.png') }}"
                                    alt="Selligion Praho 2" class="mt-1 img-fluid" width="150px"></div>
                            <div class="heroTitle clr-pink text-center mt-4">
                                <h1 class="anvier-text secondary-text mt-4">A POWERFUL <br> COMPUTER FOR EVERY  INDIAN CHILD.</h1>
                            </div>
                            {{-- <div class="clr-blue mb__20">
                                <span class="f-W-B">THE MOST POWERFUL COMPUTER IN IT'S CLASS-3 YEARS DEVICE REPLACEMENT
                                    WARRANTY - UNIQUE OS DESIGNED FOR LEARNING
                            </div> --}}
                            <div class="row mb-4">
                                <div class="col-4">
                                    <img loading="lazy" src="{{ asset('assets/images/flaticons/linux.png') }}" class="img-fluid mb-2" width="40px">
                                    <p class="text-center sm-text"><small>LINUX BASED <br> SELLIGION ABACCA <br> EDUCATION OS</small></p>
                                </div>
                                <div class="col-4">
                                    <img loading="lazy" src="{{ asset('assets/images/flaticons/medal.png') }}" class="img-fluid mb-2" width="40px">
                                    <p class="text-center sm-text"><small>3 YEARS' DEVICE <br> REPLACEMENT <br> WARRANTY</small></p>
                                </div>
                                <div class="col-4">
                                    <img loading="lazy" src="{{ asset('assets/images/flaticons/fastest-growing.png') }}" class="img-fluid mb-2" width="40px">
                                    <p class="text-center sm-text"><small> FASTEST GROWING <br> INDIAN COMPUTER <br> BRAND</small></p>
                                </div>
                            </div>
                            <div class="head-btnWrap">
                                <a href="/product/selligion-praho-2" class="btn knwMore-Bnt-pink text-uppercase">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="window-oppor" style="background-image: url({{ asset('assets/images/new-window-Bg.png') }});">
            <div class="container lg-container-vw">
                <div class="opportunities-Wrp">
                    <div class="new-windowTxt position-relative">
                        <div class="new-windowTitle text-uppercase mb__30" data-aos="fade-n-up">
                            A new <br class="d-none d-md-block">window of <br class="d-none d-md-block">opportunities.
                        </div>
                        <div class="new-windowInfo" data-aos="fade-n-up">
                            <p>An overwhelming majority of Indian homes with a school going child, do not have access to a
                                computer. One of the primary reasons for this disparity - computers in general are
                                unaffordable for most Indians. We understand that a child without a computer today, is a
                                citizen without opportunity tomorrow. </p>
                        </div>
                    </div>
                    <div class="windowInfo-SecImg" data-aos="fade-n-up" data-aos-duration="1500"
                        data-aos-anchor-placement="top-bottom">
                        <img loading="lazy" src="{{ asset('assets/images/new-window-img.png') }}" alt="Selligion" class="w-100">
                    </div>
                    <div class="knowMore-Txt" data-aos="fade-n-up">
                        <p>At Selligion, we hope to solve this critical India challenge by delivering powerful computer
                            hardware along with a simple and reliable operating system and cloud infrastructure to help
                            empower every child in India who dreams. We hope to deliver opportunities - we hope to deliver a
                            powerful computer to every Indian home.</p>
                        <a href="/product/selligion-praho-2" class="btn knwMore-Bnt">KNOW MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="pretty-awesome section-padding">
            <div class="container lg-container-vw">
                <div class="pretty-awsInner text-center">
                    <div class="section-title" data-aos="fade-n-up">Pretty. Pretty. Awesome.</div>
                    {{-- <div class="f-sz-30 f-W-B subTitle" data-aos="fade-n-up">FOR ₹499/- A MONTH</div> --}}
                    <div class="pretty-info" data-aos="fade-n-up">
                        <p><strong>Selligion Praho 2</strong> is designed to perform - to deliver on all the needs of a
                            learner</p>
                        <p>As an introductory offer, each Selligion Praho 2 comes with a set of free wired keyboard and
                            wired mouse. You can connect a Selligion Praho 2 with up to 3 displays or a regular TV.</p>
                    </div>
                    <div class="accessoriesImg" data-aos="fade-n-up">
                        <img loading="lazy" src="{{ asset('assets/images/accessories.png') }}" alt="Selligion" class="w-100">
                    </div>
                    <a href="/product/selligion-praho-2" class="btn knwMore-Bnt" data-aos="fade-n-up">KNOW MORE</a>
                </div>
            </div>
        </div>
    </section>
    <section class="mb__300">
        <div class="latest-sec" style="background-image: url({{ asset('assets/images/latest-com-Bg.png') }});">
            <div class="container lg-container-vw">
                <div class="con_Forever">
                    <div class="section-title text-white text-center " data-aos="fade-n-up">THE LATEST IN COMPUTING. FOREVER.
                    </div>
                    <div class="computing-innr">
                        <div class="row row-vw">
                            <div class="col-md-4 col-lg-3 p-md-0">
                                <div class="computing-feature" data-aos="fade-n-up">
                                    <div class="featureTxt text-right">
                                        <div class="fTitle f-W-SB">UNIQUE DESIGN</div>
                                        <p>Small Design - Packed for Performance and Durability.</p>
                                    </div>
                                    <div class="featureIcon">
                                        <img loading="lazy" src="{{ asset('assets/images/con-icon-1.png') }}" alt="Selligion"
                                            class="w-100">
                                    </div>
                                </div>
                                <div class="computing-feature" data-aos="fade-n-up">
                                    <div class="featureTxt text-right">
                                        <div class="fTitle f-W-SB">UNCOMPROMISING</div>
                                        <p>128 GB Storage | 8 GB RAM | ~2.9 GHz Quadcore.</p>
                                    </div>
                                    <div class="featureIcon">
                                        <img loading="lazy" src="{{ asset('assets/images/con-icon-2.png') }}" alt="Selligion"
                                            class="w-100">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-6 position-relative order-1 order-md-0">
                                <div class="computingImg" data-aos="fade-n-up" data-aos-duration="1500"
                                    data-aos-anchor-placement="top-bottom">
                                    <img loading="lazy" src="{{ asset('assets/images/latest-computing.png') }}" alt="Selligion"
                                        class="w-100">
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3 p-md-0">
                                <div class="computing-feature iteam-reverse" data-aos="fade-n-up">
                                    <div class="featureTxt text-left">
                                        <div class="fTitle f-W-SB">TRIPLE DISPLAY</div>
                                        <p>Connect to either a TV or upto 3 Monitors.</p>
                                    </div>
                                    <div class="featureIcon">
                                        <img loading="lazy" src="{{ asset('assets/images/con-icon-3.png') }}" alt="Selligion"
                                            class="w-100">
                                    </div>
                                </div>
                                <div class="computing-feature iteam-reverse" data-aos="fade-n-up">
                                    <div class="featureTxt text-left">
                                        <div class="fTitle f-W-SB ml-2">HIGHEST QUALITY</div>
                                        <p>Quality Manufacturing and Design</p>
                                        {{-- <p>Quality Manufacturing and Design - Comes with 3 years of Replacement Warranty.</p> --}}
                                    </div>
                                    <div class="featureIcon">
                                        <img loading="lazy" src="{{ asset('assets/images/con-icon-4.png') }}" alt="Selligion"
                                            class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="silligion-product" style="background-image: url({{ asset('assets/images/product-bg.png') }});">
            <div class="container lg-container-vw">
                <div class="row secCtm-row col-border">
                    <div class="col-md-4">
                        <div class="porcha-product text-center" data-aos="fade-n-up">
                            <div class="font-Adobe text-white f-sz-70 mb__30">
                                <span class="proIcon"><img loading="lazy" src="{{ asset('assets/images/product-icon.png') }}"
                                        alt="Selligion" class="w-100"></span>praho
                            </div>
                            <div class="sellPro-info text-white mb__30">
                                {{-- <div class="f-sz-28 f-W-SB mb__10">UNIQUE DESIGN</div> --}}
                                <div data-eq="busSect-head-eq">
                                    <p>World's first Hardware-OS-Cloud ecosystem designed and conceptualized in India.</p>
                                </div>
                            </div>
                            <a href="/product/selligion-praho-2" class="btn knwMore-Bnt">KNOW MORE</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="porcha-product text-center" data-aos="fade-n-up">
                            <div class="font-Adobe text-white f-sz-70 mb__30">
                                <span class="proIcon"><img loading="lazy" src="{{ asset('assets/images/product-icon.png') }}"
                                        alt="Selligion" class="w-100"></span>abacca
                            </div>
                            <div class="sellPro-info text-white mb__30">
                                {{-- <div class="f-sz-28 f-W-SB mb__10">UNIQUE DESIGN</div> --}}
                                <div data-eq="busSect-head-eq">
                                    <p>Powerful, light and fast OS - comes with 5 years of updates, guaranteed.</p>
                                </div>
                            </div>
                            <a href="#" class="btn knwMore-Bnt">KNOW MORE</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="porcha-product text-center" data-aos="fade-n-up">
                            <div class="font-Adobe text-white f-sz-70 mb__30">
                                <span class="proIcon"><img loading="lazy" src="{{ asset('assets/images/product-icon.png') }}"
                                        alt="Selligion" class="w-100"></span>discovery
                            </div>
                            <div class="sellPro-info text-white mb__30">
                                {{-- <div class="f-sz-28 f-W-SB mb__10">UNIQUE DESIGN</div> --}}
                                <div data-eq="busSect-head-eq">
                                    <p>Learn and play in 14 Indian languages. Coming soon!</p>
                                </div>
                            </div>
                            <a href="#" class="btn knwMore-Bnt">KNOW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="opportunities-sec">
            <div class="container lg-container-vw">
                <div class="opport-inner">
                    <div class="text-center mb__30">
                        <div class="section-title text-center" data-aos="fade-n-up">A new window of <br> opportunities.
                        </div>
                        <div class="f-sz-28 f-W-B subTitle" data-aos="fade-n-up">Great design - Outstanding performance -
                            Extraordinary Service</div>
                    </div>
                    <div class="opport-img" data-aos="fade-n-up">
                        <img loading="lazy" src="{{ asset('assets/images/opportunities-img.png') }}" alt="Selligion" class="w-100">
                    </div>
                    <div class="text-center opport-para" data-aos="fade-n-up">
                        <p>
                            In case you've come this far and are trying to read this paragraph - here's a quick and special
                            note, just for you. This fully stacked, no compromise home computer is the most value for money,
                            power packed, computer designed to perform for years. The best part, you don't even need to
                            believe us - feel free to place an order and try a selligion praho 2 for up to 7 days - in case
                            you don't like it - just return the device and claim a full refund from us - no questions asked.
                            Let's get computing today.
                        </p>
                    </div>
                    <div class="row row-vw mt-45 ">
                        <div class="col-md-12 col-lg-12 m-auto" data-aos="fade-n-up">
                            <div class="row row-vw justify-content-center">
                                <div class="col-6 col-md-2">
                                    <div class="window-function text-center">
                                        <div class="function-Icon">
                                            <img loading="lazy" src="{{ asset('assets/images/icon-3years.png') }}" alt="Selligion"
                                                class="w-100">
                                        </div>
                                        <div class="functionTxt">
                                            <div class="f-W-SB">3 Year</div>
                                            <span class="f-sz-14 f-W-SB">3 Year Replacement Warranty</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2">
                                    <div class="window-function text-center">
                                        <div class="function-Icon">
                                            <img loading="lazy" src="{{ asset('assets/images/icon-Intel.png') }}" alt="Selligion"
                                                class="w-100">
                                        </div>
                                        <div class="functionTxt">
                                            <div class="f-W-SB">Intel </div>
                                            <span class="f-sz-14 f-W-SB">Intel Based No Compromise Computer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2">
                                    <div class="window-function text-center">
                                        <div class="function-Icon">
                                            <img loading="lazy" src="{{ asset('assets/images/icon-abacca.png') }}" alt="Selligion"
                                                class="w-100">
                                        </div>
                                        <div class="functionTxt">
                                            <div class="f-W-SB">Abacca OS </div>
                                            <span class="f-sz-14 f-W-SB">Selligion Abacca OS - 5 year Support</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2">
                                    <div class="window-function text-center">
                                        <div class="function-Icon">
                                            <img loading="lazy" src="{{ asset('assets/images/icon-3display.png') }}" alt="Selligion"
                                                class="w-100">
                                        </div>
                                        <div class="functionTxt">
                                            <div class="f-W-SB">3 Displays </div>
                                            <span class="f-sz-14 f-W-SB">Supports up to 3 Displays</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2">
                                    <div class="window-function text-center">
                                        <div class="function-Icon">
                                            <img loading="lazy" src="{{ asset('assets/images/icon-connects-tv.png') }}" alt="Selligion"
                                                class="w-100">
                                        </div>
                                        <div class="functionTxt">
                                            <div class="f-W-SB">Connects TV </div>
                                            <span class="f-sz-14 f-W-SB">Connects to a TV</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2">
                                    <div class="window-function text-center">
                                        <div class="function-Icon">
                                            <img loading="lazy" src="{{ asset('assets/images/icon-education.png') }}" alt="Selligion"
                                                class="w-100">
                                        </div>
                                        <div class="functionTxt">
                                            <div class="f-W-SB">Education  </div>
                                            <span class="f-sz-14 f-W-SB">Best for Education and Learning</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="everythn-sec" style="background-image: url({{ asset('assets/images/everthing-bg.png') }});">
            <div class="container lg-container-vw">
                <div class="row every-row">
                    <div class="col-md-5 position-relative">
                        <div class="every-ImageWrp">
                            <div class="postImg" data-aos="fade-n-down">
                                <img loading="lazy" src="{{ asset('assets/images/post-img-1.png') }}" alt="Selligion" class="w-100">
                            </div>
                            <div class="postImg postbottom" data-aos="fade-n-up">
                                <img loading="lazy" src="{{ asset('assets/images/post-img-2.png') }}" alt="Selligion" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="everyTxt-Wrp">
                            <div class="need-title f-sz-70 text-white fw-bold mb__35" data-aos="fade-n-up">Everything you
                                need. anything you want.</div>
                            <div class="mb__40 text-white" data-aos="fade-n-up">
                                <p> Selligion Praho solves for almost all use cases in education and learning. Browse a
                                    website, attend an online class, design a creative, write some code, build an app,
                                    stream some videos, read a book, write a report, run a community, edit a song -
                                    Everything you need, anything you want - <strong>Selligion Praho 2</strong> is primed
                                    for your next creative adventure. </p>
                            </div>
                            <a href="/product/selligion-praho-2" class="btn knwMore-Bnt" data-aos="fade-n-up">KNOW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="ecom-brand">
            <div class="container lg-container-vw">
                <div class="ecom-brandWrp" data-aos="fade-n-up">
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/pycharm.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Pycharm </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Browser </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/steam.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Steam </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Share </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Libre-Office-Writer.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Writer </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Study </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Libre-Office-Calc.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Calc </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Libre-Office-Impress.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Impress </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/firefox.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Firefox </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Google-Classroom.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Google Classroom </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Microsoft-Teams.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Teams </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Take a free course online </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Canva.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Canva </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Learn to code Online </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Chat-GPT.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Chat GPT </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Save and Sync Files </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Visual-Studio.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> VS Code </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Top Universities </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Zoho-Books.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Zoho Books </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Google-Scholar.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> G Scholar </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Khan-Academy.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Khan Academy </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Telegram.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Telegram </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Figma.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Figma </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Chrome.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Chrome </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Office-365.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Office 365 </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Blender.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Blender </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/FileZilla.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> FileZila </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/GIMP.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> GIMP </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/VLC.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> VLC </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/WhatsApp.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Whataspp </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Adobe-Reader.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Adobe Reader </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Arduino.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Arduino </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Audacity.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Audacity </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/C-Builder.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> C Builder </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/CS-Go.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> CS Go </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Discord.png') }}"
                                alt="Selligion" class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Discord </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
                    <div class="ecomBlock text-center">
                        <div class="brandImage mb__20"> <img loading="lazy" src="{{ asset('assets/images/Dota.png') }}" alt="Selligion"
                                class="w-100">
                        </div>
                        <div class="ecomTitle f-W-SB mb__10"> Dota </div>
                        {{-- <div class="ecom-subTitle f-sz-14"> Read </div> --}}
                    </div>
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
                            Fortune favours the connected
                        </div>
                        <div class="f-sz-25 f-W-M">4 USB Ports - 2 HDMI Ports - 1 SD Port - Connects to up to three
                            displays and even a TV</div>
                    </div>
                    <div class="connect-topImg">
                        <img loading="lazy" src="{{ asset('assets/images/coonect-port-img.png') }}" alt="Selligion" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="computing" style="background-image: url({{ asset('assets/images/computing.png') }});">
            <div class="container lg-container-vw">
                <div class="computinTxt text-center text-white">
                    <div class="font-Adobe f-sz-70" data-aos="fade-n-up">let's get computing.</div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://integration.beyondchats.com/chat-widget?orgId=selligion.com"></script>
@endsection
