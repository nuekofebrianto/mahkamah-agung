<header class="header">
    <div class="header__inner">

        <!-- Brand -->
        <div class="header__brand" style="width: 220px;justify-content: center;">
            <div class="brand-wrap">

                <!-- Brand logo -->
                <a href="/home" class=" stretched-link" style="text-decoration: none;color:white;">
                    {{-- <img src="{{ asset('img/logo_ma.jpeg')}}" alt="Nifty Logo" class="Nifty logo" width="120" height="40"> --}}
                   <h3 style="color: white !important;">Mahkamah Agung</h3>
                </a>

                <!-- Brand title -->
                <!-- <div class="brand-title">Nifty</div> -->

                <!-- You can also use IMG or SVG instead of a text element. -->

            </div>
        </div>
        <!-- End - Brand -->

        <div class="header__content">

            <!-- Content Header - Left Side: -->
            <div class="header__content-start">

                <!-- Navigation Toggler -->
                <button type="button" class="nav-toggler header__btn btn btn-icon btn-sm" aria-label="Nav Toggler">
                    <i class="demo-psi-view-list"></i>
                </button>

                <!-- Searchbox -->
                <!--<div class="header-searchbox">

                    <label for="header-search-input" class="header__btn d-md-none btn btn-icon rounded-pill shadow-none border-0 btn-sm" type="button">
                        <i class="demo-psi-magnifi-glass"></i>
                    </label>

                    <form class="searchbox searchbox--auto-expand searchbox--hide-btn input-group">
                        <input id="header-search-input" class="searchbox__input form-control bg-transparent" type="search" placeholder="Type for search . . ." aria-label="Search">
                        <div class="searchbox__backdrop">
                            <button class="searchbox__btn header__btn btn btn-icon rounded shadow-none border-0 btn-sm" type="button" id="button-addon2">
                                <i class="demo-pli-magnifi-glass"></i>
                            </button>
                        </div>
                    </form>
                </div> -->
            </div>
            <!-- End - Content Header - Left Side -->

            <!-- Content Header - Right Side: -->
            <div class="header__content-end">

                <div class="dropdown">

                    <!-- Toggler -->
                    <button class="header__btn btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown" aria-label="Notification dropdown" aria-expanded="false">
                        <span class="d-block position-relative">
                            <i class="ti-user"></i>
                           <!--  <span class="badge badge-super rounded bg-danger p-1">

                                <span class="visually-hidden">unread messages</span>
                            </span> -->
                        </span>
                    </button>

                    <!-- Notification dropdown menu -->
                    <div class="dropdown-menu dropdown-menu-end w-md-300px">
                        <div class="border-bottom px-3 py-2 mb-3">
                            <h5>Akun Kamu</h5>
                        </div>

                        <div class="list-group list-group-borderless">

                            <!-- List item -->
                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ti-id-badge fs-2 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="{{ route('user.profile') }}" class="h6 d-block mb-0 stretched-link text-decoration-none">Profile</a>
                                    <small class="">Ubah data profile kamu</small>
                                </div>
                            </div>

                            <!-- List item -->
                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ti-unlock fs-2 text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ">
                                    <a href="{{ route('user.gantipassword') }}" class="h6 d-block mb-0 stretched-link text-decoration-none">Ubah Password</a>
                                    <small class="">Ubah password berkala demi keamanan</small>
                                </div>
                            </div>

                            <!-- List item -->
                            <div class="list-group-item list-group-item-action d-flex align-items-start mb-3">
                                <div class="flex-shrink-0 me-3">
                                    <i class="ti-power-off text-danger fs-2"></i>
                                </div>
                                <div class="flex-grow-1 ">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <a href="{{route('logout')}}" class="h6 mb-0 stretched-link text-decoration-none">Log out</a>
                                        <!-- <span class="badge bg-info rounded ms-auto">NEW</span> -->
                                    </div>
                                    <!-- <small class="text-muted">You have 1,256 unsorted comments.</small> -->
                                </div>
                            </div>

                           

                        </div>
                    </div>
                </div>
               
               

            </div>
        </div>
    </div>
</header>