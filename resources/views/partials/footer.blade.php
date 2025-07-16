<!-- Portfolio Section -->
<section id="publish" class="publish section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div><span>Start Publishing</span> <span class="description-title">Your Paper</span></div>
        <h2></h2>
    </div><!-- End Section Title -->

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 content text-center">
                <p>Please upload your paper by pressing the <i class="bi bi-upload"></i> <strong>Upload Here</strong>
                    button and make sure your paper meets our template requirements.</p>

                <div class="d-flex justify-content-center mt-3 gap-3">
                    <div class="cta-button">
                        <a class="btn" href="{{ $config['conference']->register_link }}" target="_blank"><span>Upload
                                Here</span>
                            <i class="bi bi-upload"></i></a>
                    </div>
                    <div class="cta-button">
                        <a class="btn" href="{{ $config['conference']->template_link }}"><span>Template
                                Here</span> <i class="bi bi-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Portfolio Section -->

<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-7 col-md-12 footer-about">
                <h3 class="sitename">About ICoFA 2025</h3>
                <a href="/" class="logo">
                    <img src="{{ url(asset('assets/img/' . $config['conference']->logo_alt)) }}" alt="logo_icofa">
                </a>
                <p>{{ $config['conference']->about }}</p>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Internal Link</h4>
                <ul>
                    @foreach (App\Models\Link::getTree(2) as $link)
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ $link->link }}"
                                target="_{{ $link->type == 'internal_link' ? 'self' : 'blank' }}">{{ $link->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Information</h4>
                <p>
                    <strong>Office Address :</strong>{{ $config['conference']->office_address }}</a><br>
                    <strong>Phone :</strong>{{ $config['conference']->phone }}</a><br>
                    <strong>Website :</strong> <a
                        href="{{ $config['conference']->url }}">{{ $config['conference']->url }}</a><br>
                    <strong>Email :</strong> <a
                        href="mailto:{{ $config['conference']->email }}">{{ $config['conference']->email }}</a><br>
                </p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Politeknik Negeri Jember</strong> <span>All Rights
                Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Created by <a href="https://arieeefajar.github.io" target="_blank">ariefajar</a> ( <a
                href="https://jti.polije.ac.id/lab/ksi" target="_blank">LAB KSI</a> - <a href="https://jti.polije.ac.id"
                target="_blank">Jurusan Teknologi Informasi</a> )
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>
