@extends('layouts.app')
@section('content')
    <!-- About Section -->
    <section id="about" class="about section" style="padding: 150px 0">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div><span class="description-title">Presentation Schedule</span></div>
            <h2></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12">
                    <nav data-bs-theme="dark">
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            @foreach ($panels as $x => $panel)
                                <button class="h6 fw-bold nav-link{{ $x == 0 ? ' active' : '' }}"
                                    id="panel{{ $panel->id }}" data-bs-toggle="tab"
                                    data-bs-target="#nav-panel{{ $panel->id }}" type="button" role="tab"
                                    aria-controls="nav-panel{{ $panel->id }}"
                                    aria-selected="true">{{ $panel->name }}</button>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent" data-bs-theme="dark">
                        @foreach ($panels as $x => $panel)
                            <div class="tab-pane fade{{ $x == 0 ? ' show active' : '' }}" id="nav-panel{{ $panel->id }}"
                                role="tabpanel" aria-labelledby="nav-panel{{ $panel->id }}-tab">
                                {{-- Offline --}}
                                @if ($panel->type == 1)
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 my-3">
                                            <table class="table table-borderless h6 mb-0">
                                                <tr>
                                                    <th width="10%">Panel Name :</th>
                                                    <td width="40%">{{ $panel->name }}</td>
                                                    <th>Room Name :</th>
                                                    <td>{{ $panel->room }}</td>
                                                </tr>
                                                <tr>
                                                    <th width="10%">Moderator :</th>
                                                    <td>{!! $panel->moderator !!}</td>
                                                    <th>Timezone :</th>
                                                    <td>Western Indonesian Time (WIB) [GMT +7]</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 p-0">
                                            @php
                                                $sessions = App\Models\Session::where('active', 1)->get();
                                                $discussion = [
                                                    '10.35 - 10-45',
                                                    '11.20 - 11.30',
                                                    '12.05 - 12.15',
                                                    '13.05 - 13.15',
                                                    '13.50 - 14.00',
                                                    '14:35 - 14:45',
                                                    '15:20 - 15:30',
                                                    '16:05 - 16:15',
                                                ];
                                            @endphp
                                            @foreach ($sessions as $session)
                                                <?php $presentations = App\Models\Presentation::where('panel_id', $panel->id)->where('paper_id', '!=', 0)->where('session_id', $session->id)->orderBy('time', 'asc'); ?>

                                                @if ($presentations->count() != 0)
                                                    <div class="card mb-3">
                                                        <div class="card-header bg-main">
                                                            <h5 class="card-title fw-bold text-white mb-0">
                                                                {{ $session->name }} <span
                                                                    class="small fw-normal float-end">October 12, 2024
                                                                    ({{ $session->time_range }} WIB)
                                                                </span></h5>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <table class="table table-striped mb-0">
                                                                <tr>
                                                                    <th width="10%">Paper ID</th>
                                                                    <th width="35%">Author</th>
                                                                    <th>Title</th>
                                                                    <th width="10%">Time</th>
                                                                </tr>
                                                                @foreach ($presentations->get() as $presentation)
                                                                    <tr>
                                                                        <td align="center">
                                                                            {{ $presentation->paper_id }}
                                                                        </td>
                                                                        <td>{{ $presentation->author }}</td>
                                                                        <td>{{ $presentation->title }}</td>
                                                                        <td>{{ $presentation->time }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr class="bg-dark">
                                                                    <td class="fw-bold h6" colspan="3">
                                                                        Discussion</td>
                                                                    <td>
                                                                        {{ $discussion[$session->id - 1] }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    {{-- Online --}}
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 my-3">
                                            <table class="table table-borderless h6 mb-0">
                                                <tr>
                                                    <th width="10%">Panel Name :</th>
                                                    <td width="40%">{{ $panel->name }}</td>
                                                    <th width="10%">Room :</th>
                                                    <td>{{ $panel->room }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Timezone :</th>
                                                    <td>Western Indonesian Time (WIB) [GMT +7]</td>
                                                    <th>Zoom Link :</th>
                                                    <td><a href="{{ $panel->zoom_link }}"
                                                            target="_blank">{{ $panel->zoom_link }}</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Moderator :</th>
                                                    <td>{!! $panel->moderator !!}</td>
                                                    <th>Meeting ID :</th>
                                                    <td>{{ $panel->meeting_id }}</td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td></td>
                                                    <th>Password :</th>
                                                    <td>{{ $panel->passcode }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 p-0">
                                            @php
                                                $sessions = App\Models\Session::where('active', 1)->get();
                                                $discussion = [
                                                    '10.35 - 10-45',
                                                    '11.20 - 11.30',
                                                    '12.05 - 12.15',
                                                    '13.05 - 13.15',
                                                    '13.50 - 14.00',
                                                    '14:35 - 14:45',
                                                    '15:20 - 15:30',
                                                    '16:05 - 16:15',
                                                ];
                                            @endphp
                                            @foreach ($sessions as $session)
                                                <?php $presentations = App\Models\Presentation::where('panel_id', $panel->id)->where('paper_id', '!=', 0)->where('session_id', $session->id)->orderBy('time', 'asc'); ?>
                                                @if ($presentations->count() != 0)
                                                    <div class="card mb-3">
                                                        <div class="card-header bg-main">
                                                            <h5 class="card-title fw-bold text-white mb-0">
                                                                {{ $session->name }} <span
                                                                    class="small fw-normal float-end">October 12, 2024
                                                                    ({{ $session->time_range }} WIB)
                                                                </span></h5>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <table class="table table-striped mb-0">
                                                                <tr>
                                                                    <th width="10%">Paper ID</th>
                                                                    <th width="35%">Author</th>
                                                                    <th>Title</th>
                                                                    <th width="10%">Time</th>
                                                                </tr>
                                                                @foreach ($presentations->get() as $presentation)
                                                                    <tr>
                                                                        <td align="center">
                                                                            {{ $presentation->paper_id }}
                                                                        </td>
                                                                        <td>{{ $presentation->author }}</td>
                                                                        <td>{{ $presentation->title }}</td>
                                                                        <td>{{ $presentation->time }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr class="bg-dark">
                                                                    <td class="fw-bold text-dark h5" colspan="3">
                                                                        Discussion</td>
                                                                    <td class="text-dark">
                                                                        {{ @$discussion[$session->id - 1] }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->
@endsection
