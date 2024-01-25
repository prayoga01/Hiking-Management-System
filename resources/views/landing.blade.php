@extends('layouts.user')

@section('content')
    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About Us</h2>
                    <p> This system is a collaborative project between MSU and the state Forestry Department to manage and
                        track the access
                        of visitors requesting to hike the local mountains. Each mountain managed by the local Forestry
                        Department has a limit of approved hikers that are allowed to hike the mountain. </p>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/img/mountain3.jpg') }}" class="img-fluid" alt="">

                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>Voluptatem dignissimos <strong>provident quasi corporis voluptates</strong></h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident.
                        </p>

                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Counts Section ======= -->
        <section class="counts section-bg">
            <div class="container">

                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Happy Clients</strong> consequuntur quae qui deca rode</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Projects</strong> adipisci atque cum quia aut numquam delectus</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> aut commodi quaerat. Aliquam ratione</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Hard Workers</strong> rerum asperiores dolor molestiae doloribu</p>
                            <a href="#">Find out more &raquo;</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Cta Section ======= -->
        <section class="cta" style="background-image: url({{ asset('assets/img/mountain2.jpg') }});">
            <div class="container">

                <div class="text-center">
                    <h3>Call To Action</h3>
                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.</p>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Mountain List ======= -->
        <section class="more-services section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Mountain List</h2>
                </div>

                <div class="row">
                    @foreach ($mountains as $mountain)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="card">
                                <div style="max-height: 150px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $mountain->mountain_img) }}" class="card-img-top"
                                        alt="...">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title"><a href="">{{ $mountain->nm_mountain }}</a></h5>
                                    <p class="card-text text-center"><i class="fa-solid fa-location-dot"
                                            style="color: #fa0000;"></i> {{ $mountain->address_mountain }}</p>
                                    <p class="card-text text-center">
                                        @if ($mountain->check_active == '1')
                                            <span class="badge text-bg-success">Active</span>
                                        @elseif($mountain->check_active == '0')
                                            <span class="badge text-bg-warning">Inactive</span>
                                        @endif
                                    </p>
                                    <a href="/mountaindetails/{{ $mountain->id }}" class="btn">More Info</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>
        <!-- End Mountain List -->

        <!-- ======= Our Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>HIKING TIPS FOR BEGINERS</h2>
                    <p>"If you're a beginner in hiking, don't worry! We have some advice to help you plan a successful and
                        enjoyable hiking trip."</p>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-group-arrows-rotate" style="color: #1e3050;"></i>
                            </div>
                            <h4 class="title"><a href="">Hike With Partner/Group</a></h4>
                            <p class="description">It's
                                Hike with a partner/group for safety and enjoyment.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-location-dot" style="color: #1e3050;"></i></i>
                            </div>
                            <h4 class="title"><a href="">Pick A Distance You Can Handle</a></h4>
                            <p class="description">Choose a distance that matches your fitness level and experience.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-bullhorn" style="color: #1e3050;"></i></div>
                            <h4 class="title"><a href="">Tell Someone</a></h4>
                            <p class="description">Always tell someone where you're going.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch  mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-person-walking" style="color: #1e3050;"></i></div>
                            <h4 class="title"><a href="">Don't Be Too Ambitious</a></h4>
                            <p class="description">Don't take on more than you can handle.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch  mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-person-running" style="color: #22304e;"></i>
                            </div>
                            <h4 class="title"><a href="">Take Practice At A Local Park</a></h4>
                            <p class="description">Practice at a local park to build up your fitness level.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch  mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-id-card-clip" style="color: #1e3050;"></i></div>
                            <h4 class="title"><a href="">Join A Hiking Club</a></h4>
                            <p class="description">Join a hiking club to learn from experienced hikers.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch  mb-lg-0 mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fa-solid fa-trash" style="color: #1e3050;"></i></div>
                            <h4 class="title"><a href="">Don't Leave Trash In The Woods</a></h4>
                            <p class="description">Pack out your trash and leave the environment as you found it.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Our Services Section -->


    </main>
@endsection
