
@extends('layouts.homepage.common')

@section('title', 'Home')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>#STAY NYUMBANI, STAY SAFE.</h1>
            <h2>Attend an online clinic to reduce the spread of COVID-19.</h2>
            <a href="#about" class="btn-get-started scrollto">How it works</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why clinic at home?</h3>
                            <p class="text-justify">
                                The eruption of the COVID-19 global pandemic in early 2020 has risen awareness that people with chronic diseases such Diabetes, Blood Pressure and HIV/AIDS, among others,
                                are more prone to fatality due to their weakened immune system. This Motivated us to create a module that helps such patients to attend their clinics
                                virtually, hence, reducing the need to attend hospitals where the pandemics are usually easily spread.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch ">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <img src="{{asset('assets/img/svgs/no_queue.svg')}}" class="w-50 mb-2" alt="">
                                        <h4>No queues!</h4>
                                        <p class="text-center">Patients don't have to wait in lines to get medical services.
                                            Thus, reducing chances of spreading viruses and saves time</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <img src="{{asset('assets/img/svgs/save_resources.svg')}}" class="w-50 mb-2" alt="">
                                        <h4>Save resources!</h4>
                                        <p>Some clinic visits consist of minor complaints. Patients in this case won't have to travel to specialist hospitals or doctors to get services </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <img src="{{asset('assets/img/svgs/growth.svg')}}" class="w-50 mb-2" alt="">
                                        <h4>Improved Perfomance</h4>
                                        <p>Docotors can now attend multiple patients at the same time, ensuring efficiency.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>
            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-xl-5 col-md-6 video-box d-flex justify-content-center align-items-stretch">
                        <a href="#"></a>
                    </div>

                    <div class="col-xl-7 col-md-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>About Clinic at Home.</h3>
                        <p>
                            Clinic at Home is a web based online clinic module that helps patients with long-term (chronic) diseases to attend their regular
                            clinic visits to their respective hospitals virtually.

                        </p>

                        <h4>How it works</h4>

                        <div class="icon-box">
                            <div class="icon"><i class="ri-hospital-line"></i></div>
                            <h4 class="title"><a href="">Attend first clinic</a></h4>
                            <p class="description">Go to the hospital, get registered to the system.</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="ri-home-heart-line"></i></div>
                            <h4 class="title"><a href="">Send Complaints</a></h4>
                            <p class="description">On your next visits, send a log of complaints via this module</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="icofont-microscope"></i></div>
                            <h4 class="title"><a href="">Get Tested</a></h4>
                            <p class="description">If the diagnosis requires lab tests, get tested from among the verified labs</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="ri-file-paper-line"></i></div>
                            <h4 class="title"><a href="">Get Results & Prescriptions</a></h4>
                            <p class="description">Your final results will be posted with the prescriptions and message from the doctor</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <section id="counts" class="counts">
            <div class="container">

                <div class="row">
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <i class="icofont-warning icofont-7x text-danger"></i>
                    </div>
                    <div class="col-md-9">
                        <h3>Disclaimer</h3>
                        <p>
                            This module should be used with patients with chronic/longterm diseases who experience <b>minor symptoms/complaints.</b>
                            If you experience serious symptoms please visit the hospital at once!.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>#USIWE TAKWIMU</h2>
                    <p>
                        Prevention is better than cure! Do not be statistics, follow all the neccessary precautions & advice from health professionals to prevent the spread of COVID-19. Save yourself and save others.
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-injection-syringe"></i></div>
                            <h4><a >Get vaccinated</a></h4>
                            <p>The eldery and the sick are more vulnerable to the disease. Get your shot now!</p>
                            <a href="https://chanjocovid.moh.go.tz/" target="_blank" class="btn btn-primary mt-3 w-75 p-2  rounded">Apply</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon text-white"><i class="fas fa-carrot fa-2x"></i></div>
                            <h4><a >Eat healthy</a></h4>
                            <p>Eat foods that are rich in vitamic C such as fruits and vegetables to strengthen the body's immunity. Eat citrus fruits, hot ginger tea and avoid cold meals/drinks.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="icofont-gym-alt-2"></i></div>
                            <h4><a >Exercise</a></h4>
                            <p>Don't stay idle, perfom exercises atleast once a day. Walking, jogging, skipping are recommended to keep the body active. Go to the gym if you can.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-people-arrows text-white fa-2x"></i></div>
                            <h4><a >Social Distance</a></h4>
                            <p>Avoid gatherings as much as you can. If you find yourself in situations where gatherings are inevitable, keep a 6-feet (2m) minimum distance between people.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="ri-surgical-mask-line"></i></div>
                            <h4><a >Wear Face Mask</a></h4>
                            <p>Always wear a face mask when in public to prevent droplets which carry the virus from leaving and infecting others or entering and infecting you.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="ri-hand-sanitizer-line"></i></div>
                            <h4><a>Sanitize</a></h4>
                            <p>Always wash your hands with soap and running water to kill viruses on your hands. Sanitize yourself if possible, with hand sanitizer or alcohol.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Appointment Section ======= -->
        <section id="appointment" class="appointment section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Work with us</h2>
                    <p>
                        Let us know if you wish for your hospital to integrate this module, or if you have any questions or suggestions, feel free to let us know.
                    </p>
                </div>

                <form action="#" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col-md-4 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email Address" >
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone number" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <input type="text" name="hospital" class="form-control" id="name" placeholder="Your Hospital (Optional)" >
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    </div>

                    <div class="text-center"><button type="submit">Contact us</button></div>
                </form>

            </div>
        </section><!-- End Appointment Section -->

    </main><!-- End #main -->

@endsection
