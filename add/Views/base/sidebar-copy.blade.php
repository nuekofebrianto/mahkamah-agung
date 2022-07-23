<nav id="mainnav-container" class="mainnav">
    <div class="mainnav__inner">

        <!-- Navigation menu -->
        <div class="mainnav__top-content scrollable-content pb-5">

            <!-- Profile Widget -->
            <div class="mainnav__profile mt-3 d-flex3">

                <div class="mt-2 d-mn-max"></div>

                <!-- Profile picture  -->
                <div class="mininav-toggle text-center py-2">
                    <img class="mainnav__avatar img-md rounded-circle border"
                        src="/upload/profile-photos/{{ $basicInfo['infoUser']->user->id }}.jpg" alt="Profile Picture"
                        id="potoProfileLeftBar">
                </div>

                <div class="mininav-content collapse d-mn-max">
                    <div class="d-grid">
                        <!-- User name and position -->
                        <button class="d-block btn shadow-none">
                            <span class="justify-content-center align-items-center">
                            </span>
                            <h6 class="mb-0">{{ $basicInfo['infoUser']->user->username }}</h6>
                            <small class="">{{ $basicInfo['infoUser']->nama }}</small>
                        </button>

                    </div>
                </div>

            </div>

            <div class="mainnav__categoriy py-3 ">
                <ul class="mainnav__menu nav flex-column ">

                    <li class="">
                        <h6 class="mainnav__caption mt-0 px-3 fw-bold  text-primary" style="font-size: 16px;">Home</h6>
                    </li>

                    <li class="nav-item ">
                        <a href="/home" url="/home" class="nav-link mininav-toggle ">
                            <i class="ti-home  fs-5 me-2"></i>

                            <span class="nav-label mininav-content ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="/home" url="/pos" class="nav-link mininav-toggle ">
                            <i class="ti-shopping-cart-full  fs-5 me-2"></i>

                            <span class="nav-label mininav-content ms-1">Point Of Sale</span>
                        </a>
                    </li>

                    <li class="">
                        <hr class="">
                    </li>

                    <li class="">
                        <h6 class="mainnav__caption mt-0 px-3 fw-bold  text-primary" style="font-size: 16px;">Master
                        </h6>
                    </li>

                    <li class="nav-item has-sub ">

                        <a href="#" class="mininav-toggle nav-link collapsed  ">
                            <i class="ti-crown fs-5 me-2"></i>
                            <span class="nav-label ms-1">Akses</span>
                        </a>

                        <ul class="mininav-content collapse nav ">
                            <li class="nav-item ">
                                <a href="{{ route('role.index') }}" url="/role" class="nav-link ">Role</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('user.index') }}" url="/user" class="nav-link ">User</a>
                            </li>

                        </ul>

                    </li>
                    <li class="nav-item has-sub ">

                        <a href="#" class="mininav-toggle nav-link collapsed  ">
                            <i class="ti-link fs-5 me-2"></i>
                            <span class="nav-label ms-1">Umum</span>
                        </a>

                        <ul class="mininav-content collapse nav ">
                            <li class="nav-item ">
                                <a href="{{ route('gudang.index') }}" url="/gudang" class="nav-link ">
                                    <i class="ti-home  fs-5 me-2"></i>
                                    <span>Gudang</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="#" url="" class="nav-link ">
                                    <i class="ti-home  fs-5 me-2"></i>
                                    <span>Akun Bank</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                </ul>

            </div>

        </div>
    </div>
</nav>
