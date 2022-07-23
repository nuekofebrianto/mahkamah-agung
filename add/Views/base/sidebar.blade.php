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

            @include('base.leftbar')

        </div>
    </div>
</nav>
