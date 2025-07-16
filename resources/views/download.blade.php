@extends('layouts.app')
@section('content')
    <!-- About Section -->
    <section id="about" class="about section" style="padding: 150px 0">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span class="description-title">Download</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-dark table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-white"></th>
                                <th class="text-white text-center">Keterangan</th>
                                <th class="text-white text-center">Link Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($downloads as $download)
                                <tr>
                                    <td width="5%" align="center"><i class="{{ $download->icon }} h1"></i></td>
                                    <td>
                                        <h4>{!! $download->name !!}</h4>
                                    </td>
                                    <td width="20%" align="center"><a href="{{ $download->link }}"
                                            class="btn btn-primary" target="_blank"><i class="bi bi-download"></i>
                                            {{ $download->link_text }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
@endsection
