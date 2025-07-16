@extends('layouts.app')
@section('content')
    <!-- About Section -->
    <section id="about" class="about section" style="padding: 150px 0">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span class="description-title">{{ $page['title'] }}</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            {!! $page['content'] !!}
        </div>
    </section><!-- /About Section -->
@endsection
