<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.webp" alt=""> -->
            {{-- <h1 class="sitename">Strategy</h1> --}}
            <img src="{{ url(asset('assets/img/polije_blu.svg')) }}" alt="polije_blu">
            <img src="{{ url(asset('assets/img/' . $config['conference']->logo_alt)) }}" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                @foreach (App\Models\MenuItem::getTree() as $parent)
                    <?php
					$has_child = App\Models\MenuItem::where('parent_id', $parent->id)->count();

					if($has_child == 0){ ?>
                    <li><a href="{{ $parent->link }}"
                            target="_{{ $parent->type == 'internal_link' ? 'self' : 'blank' }}">{{ $parent->name }}</a>
                    </li>
                    <?php } else { ?>
                    <li class="dropdown"><a href="{{ $parent->link }}"
                            onclick="javascript:return false"><span>{{ $parent->name }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($parent->children as $child)
                                <?php
									$has_child1 = App\Models\MenuItem::where('parent_id', $child->id)->count();
		
									if($has_child1 == 0){ ?>
                                <li><a href="{{ $child->link }}"
                                        target="_{{ $child->type == 'internal_link' ? 'self' : 'blank' }}">{{ $child->name }}</a>
                                </li>

                                <?php } else { ?>
                                <li class="dropdown"><a href="{{ $child->link }}"
                                        onclick="javascript:return false"><span>{{ $child->name }}</span> <i
                                            class="bi bi-chevron-right toggle-dropdown"></i></a>

                                    <ul>
                                        @foreach ($child->children as $child2)
                                            <li><a href="{{ $child2->link }}"
                                                    target="_{{ $child2->type == 'internal_link' ? 'self' : 'blank' }}">{{ $child2->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>
                                <?php } ?>
                            @endforeach
                        </ul>
                    </li>
                    <?php } ?>
                @endforeach
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        {{-- <a class="btn-getstarted" href="#about">Get Started</a> --}}

    </div>
</header>
