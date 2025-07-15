@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 content-col" data-aos="fade-up">
                    <div class="content">

                        <div class="main-heading">
                            <h1>{{ $config['conference']->name }}</h1>
                        </div>

                        <div class="divider"></div>

                        <div class="description">
                            <p>{{ $config['conference']->theme }}</p>
                        </div>

                        <div class="d-flex flex-column flex-md-row gap-3">
                            <div class="cta-button">
                                <a href="#services" class="btn">
                                    <span>Introduction</span>
                                    <i class="bi bi-info-circle"></i>
                                </a>
                            </div>

                            <div class="cta-button">
                                <a href="#services" class="btn">
                                    <span>Submit Here</span>
                                    <i class="bi bi-upload"></i>
                                </a>
                            </div>

                            <div class="cta-button">
                                <a href="#services" class="btn">
                                    <span>Poster ICoFA 2025</span>
                                    <i class="bi bi-file-earmark-post"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="zoom-out">
                    <div class="visual-content">
                        <div class="fluid-shape">
                            <img src="{{ url(asset('assets/img/' . $config['conference']->logo)) }}"
                                alt="Abstract Fluid Shape" class="fluid-img">
                        </div>

                        <div class="stats-card">
                            <div class="stats-label">
                                <p class="text_uppercase">{{ $config['conference']->host }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span>About</span> <span class="description-title">Conference</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gx-5">
                <!-- Kolom teks -->
                <div class="col-lg-8 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-content">
                        {!! $config['conference']->introduction !!}
                    </div>
                </div>

                <!-- Kolom gambar -->
                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-image text-center">
                        <img src="{{ url(asset('assets/img/' . $config['conference']->chairman_picture)) }}"
                            class="img-fluid rounded-4 shadow-sm mx-auto d-block mb-3" alt="About Image" loading="lazy">

                        <div class="chairman-badge px-4 py-3">
                            <strong class="name d-block">{{ $config['conference']->chairman_name }}</strong>
                            <small class="position d-block">{{ $config['conference']->chairman_position }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonials-slider swiper init-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row">
                                <iframe width="100%" height="568" src="{{ $config['conference']->youtube_stream }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div><!-- End Testimonial Item -->
                </div>
            </div>

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <div><span>Conference</span> <span class="description-title">Dates</span></div>
                <h2></h2>
            </div><!-- End Section Title -->
            <div class="text-center">
                <p>{!! $config['conference']->date_description !!}</p>
                <a href="#important-dates" class="btn-get-started mt-5"><i class="bi bi-calendar-check"></i> Important
                    Dates</a>
            </div>
            <div class="container mt-5" data-aos="fade-up">
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-6">
                        <div class="container">
                            <div id="countdown" class="row justify-content-center align-items-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Testimonials Section -->

    <!-- Call for Paper Section -->
    <section id="callforpaper" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span>Call of</span> <span class="description-title">Paper</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                @foreach ($callforpaper as $paper)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card position-relative z-1">
                            <div class="service-icon">
                                <i class="{{ $paper->icon }}"></i>
                            </div>
                            <a href="{{ $paper->link }}"
                                class="card-action d-flex align-items-center justify-content-center rounded-circle">
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                            <h3>
                                <a href="{{ $paper->link }}">
                                    {{ $paper->name }}
                                </a>
                            </h3>
                            <p>
                                {{ $paper->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Speakers Section -->
    <section id="speaker" class="team section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span class="description-title">Opening Speech</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                @foreach ($opening as $item)
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member text-center">
                            <div class="member-img">
                                <img src="{{ url(asset('assets/img/speakers/' . $item->picture)) }}" class="img-fluid"
                                    alt="" loading="lazy">
                            </div>
                            <div class="member-info">
                                <h4>{{ $item->name }}</h4>
                                {!! $item->description !!}
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>

        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <div><span class="description-title">Keynote Speech</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center gap-3">
                @foreach ($speakers as $speaker)
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member text-center">
                            <div class="member-img">
                                <img src="{{ url(asset('assets/img/speakers/' . $speaker->picture)) }}" class="img-fluid"
                                    alt="" loading="lazy">
                            </div>
                            <div class="member-info">
                                <h4>{{ $speaker->name }}</h4>
                                {!! $speaker->description !!}
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            </div>
        </div>

    </section><!-- /Team Section -->

    <!-- Important Dates Section -->
    <section id="steps" class="steps section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span>Important</span> <span class="description-title">Dates</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="steps-wrapper">
                @foreach ($schedules as $index => $item)
                    <div class="step-item" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}"
                        data-aos-delay="200">
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="step-info">
                                <span class="step-number">Step 0{{ $index + 1 }}</span>
                                <h3>{{ $item->name }}</h3>
                                <p>{!! $item->date !!}</p>
                            </div>
                        </div>
                    </div><!-- End Step Item -->
                @endforeach
            </div>
        </div>
    </section><!-- /Steps Section -->

    <!-- Links Section -->
    <section id="call-to-action" class="call-to-action section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <?php $locations = ['Hosted By', 'Supported By', 'Published By', 'Proceeding Indexed By']; ?>
                @foreach ($locations as $index => $location)
                    <?php $logos = App\Models\Logo::where('type', $index + 1)->where('active', 1)->orderBy('lft','asc');
                if($logos->count() > 0){ ?>
                    <div class="col-lg-6 col-md-6">
                        <h3 class="text-center">{{ $location }}</h3>
                        <div class="row justify-content-center">
                            @foreach ($logos->get() as $logo)
                                <div class="col-lg-6">
                                    <div class="bg-white border rounded p-1 mb-3">
                                        <a href="{{ @$logo->link }}" target="_blank">
                                            <img src="{{ url(asset('assets/img/logo/' . @$logo->picture)) }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <?php } ?>
                @endforeach
            </div>
        </div>
    </section><!-- /Links Section -->

    <!-- Conference Venue Section -->
    <section id="venue" class="testimonials section light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span>Conference</span> <span class="description-title">Venue</span></div>
            <h2></h2>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-12">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <h3>{{ $config['conference']->venue }}</h3>
                        <p>{{ $config['conference']->venue_address }}</p>
                    </div>
                </div><!-- End Info Item -->

                <!-- Swiper Testimonials -->
                <div class="col-lg-6">
                    <div class="testimonials-slider swiper init-swiper h-100">
                        <div class="swiper-wrapper">
                            @for ($i = 1; $i <= 7; $i++)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="featured-img-wrapper">
                                                    <img src="{{ url(asset('assets/img/venue/venue-' . $i . '.jpg')) }}"
                                                        class="featured-img w-100" alt="Testimonial {{ $i }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Testimonial Item -->
                            @endfor
                        </div>
                        <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center mt-2">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>

                <!-- Google Map -->
                <div class="col-lg-6">
                    <div class="h-100 rounded overflow-hidden shadow-sm">
                        <iframe src="{{ $config['conference']->location_map }}" frameborder="0"
                            style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Conference Venue Section -->
@endsection
