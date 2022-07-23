@extends('base.app_mini')
@section('main')
    <div class="card card-sidebar">
        <div class="card-header d-flex align-items-center border-0">
            <div class="me-auto">
                <h3 class="h4 m-0">Sidebar Setup</h3>
                <p>Klik tombol simpan untuk menyimpan perubahan</p>
            </div>
            <div class="toolbar-end">

                <a href="/sidebar" class="undisplay" id="reloadPage">reload page</a>
                <a href="#" class="btn btn-primary btn-sm m-r-2" id="reload">reset</a>
                <button class="btn btn-mint btn-sm" onclick="simpanSidebar()">simpan</button>
            </div>
        </div>

        <div class="card-body mt-4">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" id="label" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6 offset-3 text-center">
                    <button class="btn btn-outline-primary btn-sm m-r-2" onclick="addGroupHead()">Gorup Head</button>
                    <button class="btn btn-outline-warning btn-sm m-r-2" onclick="addGroupChild()">Group Child</button>
                    <button class="btn btn-outline-danger btn-sm m-r-2" onclick="addSpasi()">Space</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-2">

                    <div class="template-sidebar py-3 dd">
                        <ul id="sortable" class="list-group">
                            {{-- <li class="list-group-item group-head">
                                <span class="nav-label ms-1">HOME</span>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-list" url="/home">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">Dashboard</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                            </li>

                            <li class="list-group-item group-space">
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-head">
                                <span>Master</span>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-child">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">Akses</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-list" url="/role">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">Role</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-list" url="/user">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">User</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-child">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">Umum</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>
                            <li class="list-group-item group-list" url="/gudang">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">Gudang</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card card-icon undisplay">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="d-flex justify-content-center">
                        <div id="_dm-iconContainer" class="w-100 align-self-center p-0" style="max-width: 900px;">

                            <!-- Arrows & Direction Icons -->
                            <div class="px-3">
                                <h4 class="text-center mt-5 mb-3 pb-3 border-bottom">Arrows &amp; Direction Icons</h4>
                                <div class="_dm-iconWrap d-flex flex-wrap justify-content-center gap-1">

                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrows-vertical"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrows-horizontal"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-double-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-double-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-double-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-angle-double-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-move"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-fullscreen"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-top-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-top-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-circle-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-circle-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-circle-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrow-circle-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-arrows-corner"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-split-v"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-split-v-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-split-h"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-point-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-point-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-point-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-point-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-back-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-back-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-exchange-vertical"></i></button>

                                </div>
                            </div>
                            <!-- END : Arrows & Direction Icons -->

                            <!-- Web App Icons -->
                            <div class="px-3 pt-5">
                                <h4 class="text-center mt-5 mb-3 pb-3 border-bottom">Web App Icons</h4>
                                <div class="_dm-iconWrap d-flex flex-wrap justify-content-center gap-1">
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-wand"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-save"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-save-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-direction"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-direction-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-user"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-link"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-unlink"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-trash"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-target"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-tag"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-desktop"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-tablet"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-mobile"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-email"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-star"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-spray"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-signal"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shopping-cart"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shopping-cart-full"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-settings"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-search"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-zoom-in"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-zoom-out"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-cut"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-ruler"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-ruler-alt-2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-ruler-pencil"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-ruler-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bookmark"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bookmark-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-reload"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-plus"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-minus"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-close"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pin"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pencil"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pencil-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-paint-roller"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-paint-bucket"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-na"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-medall"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-medall-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-marker"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-marker-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-lock"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-unlock"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-location-arrow"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layers"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layers-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-key"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-image"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-heart"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-heart-broken"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-stop"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-open"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hand-drag"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-flag"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-flag-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-flag-alt-2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-eye"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-import"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-export"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-cup"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-crown"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-comments"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-comment"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-comment-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-thought"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-clip"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-check"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-check-box"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-camera"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-announcement"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-brush"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-brush-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-palette"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-briefcase"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bolt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bolt-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-blackboard"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bag"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-world"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-wheelchair"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-car"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-truck"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-timer"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-ticket"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-thumb-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-thumb-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-stats-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-stats-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shine"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shift-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shift-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shift-right-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shift-left-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shield"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-notepad"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-server"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pulse"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-printer"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-power-off"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-plug"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pie-chart"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-panel"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-package"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-music"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-music-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-mouse"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-mouse-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-money"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-microphone"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-menu"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-menu-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-map"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-map-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-location-pin"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-light-bulb"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-info"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-infinite"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-id-badge"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-hummer"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-home"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-help"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-headphone"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-harddrives"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-harddrive"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-gift"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-game"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-filter"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-files"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-file"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-zip"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-folder"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-envelope"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-dashboard"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-cloud"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-cloud-up"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-cloud-down"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-clipboard"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-calendar"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-book"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bell"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-basketball"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bar-chart"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-bar-chart-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-archive"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-anchor"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-alert"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-alarm-clock"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-agenda"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-write"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-wallet"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-video-clapper"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-video-camera"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-vector"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-support"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-stamp"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-slice"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-shortcode"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-receipt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pin2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pin-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pencil-alt2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-eraser"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-more"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-more-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-microphone-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-magnet"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-line-double"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-line-dotted"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-line-dashed"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-ink-pen"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-info-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-help-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-headphone-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-gallery"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-face-smile"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-face-sad"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-credit-card"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-comments-smiley"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-time"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-share"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-share-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-rocket"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-new-window"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-rss"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-rss-alt"></i></button>
                                </div>
                            </div>
                            <!-- END : Web App Icons -->

                            <!-- Control Icons -->
                            <div class="px-3 pt-5">
                                <h4 class="text-center mt-5 mb-3 pb-3 border-bottom">Control Icons</h4>
                                <div class="_dm-iconWrap d-flex flex-wrap justify-content-center gap-1">
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-stop"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-shuffle"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-play"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-pause"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-forward"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-backward"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-volume"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-skip-forward"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-skip-backward"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-record"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-control-eject"></i></button>
                                </div>
                            </div>
                            <!-- END : Control Icons -->

                            <!-- Text Editor -->
                            <div class="px-3 pt-5">
                                <h4 class="text-center mt-5 mb-3 pb-3 border-bottom">Text Editor</h4>
                                <div class="_dm-iconWrap d-flex flex-wrap justify-content-center gap-1">
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-paragraph"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-uppercase"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-underline"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-text"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-Italic"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-smallcap"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-list"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-list-ol"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-align-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-align-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-align-justify"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-align-center"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-quote-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-quote-left"></i></button>
                                </div>
                            </div>
                            <!-- END : Text Editor -->

                            <!-- Layout Icons -->
                            <div class="px-3 pt-5">
                                <h4 class="text-center mt-5 mb-3 pb-3 border-bottom">Layout Icons</h4>
                                <div class="_dm-iconWrap d-flex flex-wrap justify-content-center gap-1">
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-width-full"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-width-default"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-width-default-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-tab"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-tab-window"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-tab-v"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-tab-min"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-slider"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-slider-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-sidebar-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-sidebar-none"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-sidebar-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-placeholder"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-menu"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-menu-v"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-menu-separated"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-menu-full"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-right-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-overlay"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-overlay-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-overlay-alt-2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-left-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-center"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-media-center-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-list-thumb"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-list-thumb-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-list-post"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-list-large-image"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-line-solid"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid4"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid3"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid2-thumb"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-cta-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-cta-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-cta-center"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-cta-btn-right"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-cta-btn-left"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-column4"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-column3"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-column2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-accordion-separated"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-accordion-merged"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-accordion-list"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-widgetized"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-widget"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-widget-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-view-list"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-view-list-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-view-grid"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-upload"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-download"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-loop"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-sidebar-2"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid4-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid3-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-grid2-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-column4-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-column3-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-layout-column2-alt"></i></button>
                                </div>
                            </div>
                            <!-- END : Layout Icons -->

                            <!-- Brand Icons -->
                            <div class="px-3 pt-5">
                                <h4 class="text-center mt-5 mb-3 pb-3 border-bottom">Brand Icons</h4>
                                <div class="_dm-iconWrap d-flex flex-wrap justify-content-center gap-1">
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-flickr"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-flickr-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-instagram"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-google"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-github"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-facebook"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-dropbox"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-dropbox-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-dribbble"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-apple"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-android"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-yahoo"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-trello"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-stack-overflow"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-soundcloud"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-sharethis"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-sharethis-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-reddit"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-microsoft"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-microsoft-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-linux"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-jsfiddle"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-joomla"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-html5"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-css3"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-drupal"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-wordpress"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-tumblr"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-tumblr-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-skype"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-youtube"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-vimeo"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-vimeo-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-twitter"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-twitter-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-linkedin"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pinterest"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-pinterest-alt"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-themify-logo"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-themify-favicon"></i></button>
                                    <button class="_dm-iconButton btn btn-icon btn-primary btn-hover fs-2 p-2"><i
                                            class="ti-themify-favicon-alt"></i></button>
                                </div>
                            </div>

                            <div class="toast-container position-fixed p-2 bottom-0 start-50 translate-middle-x"
                                style="z-index:999999">
                                <div id="_dm-toastIcons" class="toast fade bg-primary w-auto" data-bs-autohide="false"
                                    data-bs-animation2="false">
                                    <div class="toast-body d-md-flex align-items-center px-4">
                                        <h5 id="_dm-iconName"
                                            class="text-capitalize text-white text-nowrap w-250px w-md-auto my-md-0 me-3">
                                            Icon Name here</h5>
                                        <div class="ms-auto">
                                            <input id="_dm-iconTag"
                                                class="form-control bg-white bg-opacity-10 border-0 text-center text-white shadow-none w-md-350px font-monospace"
                                                onclick="this.select();" type="text" value="Readonly input here..."
                                                aria-label="readonly input example" readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="{{ asset('libraries/jquery-ui/jquery-ui.min.css') }}">
    <style>
        .btn-add-icon {
            position: absolute;
            right: 45px;
            top: 2px;
        }

        .btn-remove-list {
            position: absolute;
            right: 5px;
            top: 2px;
        }

        .list-group-item {
            margin: 5px;

        }

        .group-head:hover {
            box-shadow: 1px 1px 10px 1px var(--bs-primary);
            cursor: move;
        }


        .group-list:hover {
            box-shadow: 1px 1px 10px 1px var(--bs-gray);
            cursor: move;
        }

        .group-child:hover {
            box-shadow: 1px 1px 10px 1px var(--bs-warning);
            cursor: move;
        }

        .group-space:hover {
            box-shadow: 1px 1px 10px 1px var(--bs-primary);
            cursor: move;
        }

        .group-head {
            font-weight: bold;
            color: var(--bs-primary);
        }

        .group-child {
            font-weight: bold;
            color: var(--bs-warning);
        }

        .group-space {
            background: aliceblue;
            height: 40px;
        }
    </style>
    <script src="{{ asset('libraries/jquery-ui/jquery-ui.min.js') }}" defer></script>

    <script>
        var listUrl = [];
        var stokUrl = [];
        var menu = JSON.parse('<?php echo json_encode($menu); ?>')
        $(document).ready(function() {
            $('.breadcrumb').remove()
            $("#sortable").sortable();
            setSortable()
            setListUrl()
        })

        var breadCrumb = [{
            url: '/home',
            label: 'Setting'
        }];


        function addGroupHead() {

            let value = $('#label').val()
            let template = `<li class="list-group-item group-head">
                                <span class="nav-label ms-1">` + value + `</span>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>`

            if (value == '') {
                notif('Isi Label', 'danger')
            } else {
                $('#sortable').append(template)
                $('#label').val('')
            }

        }

        function addGroupChild() {

            let value = $('#label').val()
            let template = `<li class="list-group-item group-child">
                                <i class="ti-link fs-5 me-2"></i>
                                <span class="nav-label ms-1">` + value + `</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>`;

            if (value == '') {
                notif('Isi Label', 'danger')
            } else {
                $('#sortable').append(template)
                $('#label').val('')
            }

        }

        function addSpasi() {
            let template = `<li class="list-group-item group-space">
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>`

            $('#sortable').append(template)
        }

        function remove(ini) {
            // let backUp = $(ini).next().html()
            $(ini).parent().remove()
            // $('.mainnav__menu').append(backUp)

        }

        var targetList = '';

        function changeIcon(ini) {
            $('.card-sidebar').addClass('undisplay')
            $('.card-icon').removeClass('undisplay')
            targetList = $(ini).prev().prev()
        }

        $('._dm-iconButton').click(function() {
            classIcon = $(this).children('i').attr('class')
            targetList.removeClass()
            targetList.addClass(classIcon)
            targetList.addClass('fs-5 me-2')
            $('.card-sidebar').removeClass('undisplay')
            $('.card-icon').addClass('undisplay')
        })

        $('#reload').click(function() {
            $('#sortable').html('')
            setSortable()
        })


        function simpanSidebar() {
            $('.loader').show()
            let templateBackup = $('.template-sidebar').html()

            let template =
                `<div class="mainnav__categoriy py-3 "><ul class="mainnav__menu nav flex-column ">`;

            var setLi = '';
            var setLabel = '';
            var setUrl = '';
            var setIcon = '';
            var counter = 0;

            $('#sortable>li').each(function(i, v) {
                if ($(v).hasClass('group-head')) {
                    setLabel = $(v).children('span').text()
                    template = template +
                        `<li class="side-head">
                    <h6 class="mainnav__caption mt-0 px-3 fw-bold  text-primary">` + setLabel + `</h6>
                    </li>`;
                } else if ($(v).hasClass('group-space')) {
                    if (counter > 0) {
                        template = template +
                            `</ul>
                        </li>`;
                        counter = parseInt(counter) - 1;
                    }
                    template = template +
                        `<li class="side-space">
                    <hr class="">
                    </li>`;
                } else if ($(v).hasClass('group-list')) {
                    setLabel = $(v).children('span').text()
                    setIcon = $(v).children('i').attr('class')
                    setUrl = $(v).attr('url')
                    template = template +
                        `<li class="nav-item side-list">
                        <a href="` + setUrl + `" url="` + setUrl + `" class="nav-link mininav-toggle ">
                            <i class="` + setIcon + `"></i>
                            <span class="nav-label mininav-content ms-1">` + setLabel + `</span>
                        </a>
                    </li>`;
                } else if ($(v).hasClass('group-child')) {
                    setLabel = $(v).children('span').text()
                    setIcon = $(v).children('i').attr('class')
                    if (counter > 0) {
                        template = template +
                            `</ul>
                        </li>`;
                        counter = parseInt(counter) - 1;
                    }
                    template = template +
                        `<li class="nav-item has-sub side-child">
                        <a href="#" class="mininav-toggle nav-link collapsed  ">
                            <i class="` + setIcon + `"></i>
                            <span class="nav-label ms-1">` + setLabel + `</span>
                            </a>
                            
                            <ul class="mininav-content collapse nav ">`;
                    counter = parseInt(counter) + 1;


                }

            })

            if (counter > 0) {
                template = template +
                    `</ul>
                        </li>`;
                counter = parseInt(counter) - 1;
            }
            template = template + '</ul></div>';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/updatesidebar',
                method: 'POST',
                data: {
                    template: template
                },
                success: function(response) {
                    notif('Berhasil', 'success')
                    window.location = '/sidebar';
                }

            })
        }

        function setSortable() {
            console.log('draw sidebar')
            var setLi = '';
            var setLabel = '';
            var setUrl = '';
            var setIcon = '';
            $('.mainnav__categoriy>ul>li').each(function(i, v) {
                if ($(v).hasClass('side-head')) {
                    setLabel = $(v).children('h6').text()
                    $('#sortable').append(`<li class="list-group-item group-head">
                                <span class="nav-label ms-1">` + setLabel + `</span>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>`)
                } else if ($(v).hasClass('side-space')) {
                    setLabel = '------------'
                    $('#sortable').append(`<li class="list-group-item group-space">
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>`)
                } else if ($(v).hasClass('side-list')) {
                    setLabel = $(v).children().children().text()
                    setUrl = $(v).children('a').attr('url')
                    setIcon = $(v).children('a').children('i').attr('class')
                    $('#sortable').append(`<li class="list-group-item group-list" url="` + setUrl + `">
                                <i class="` + setIcon + `"></i>
                                <span class="nav-label ms-1">` + setLabel + `</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                            </li>`)
                } else if ($(v).hasClass('side-child')) {
                    setLabel = $(v).children('a').children('span').text()
                    setIcon = $(v).children('a').children('i').attr('class')
                    $('#sortable').append(`<li class="list-group-item group-child">
                                <i class="` + setIcon + `"></i>
                                <span class="nav-label ms-1">` + setLabel + `</span>
                                <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                    onclick="changeIcon(this)">
                                    <i class="ti-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-icon rounded-circle btn-sm btn-remove-list"
                                    onclick="remove(this)">
                                    <i class="ti-close"></i>
                                </button>
                            </li>`)
                    $(v).children('ul').children('li').each(function(i2, v2) {
                        setLabel = $(v2).children('a').children('span').text()
                        setUrl = $(v2).children('a').attr('url')
                        setIcon = $(v2).children('a').children('i').attr('class')
                        console.log($(v2).attr('class'))
                        if ($(v2).hasClass('side-list')) {
                            $('#sortable').append(`<li class="list-group-item group-list" url="` +
                                setUrl + `">
                                    <i class="` + setIcon + `"></i>
                                    <span class="nav-label ms-1">` + setLabel + `</span>
                                    <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                        onclick="changeIcon(this)">
                                        <i class="ti-pencil"></i>
                                    </button>
                                </li>`)
                        }
                    })
                }
            })
        }

        function setListUrl() {
            $('a[url]').each(function(i, v) {
                listUrl.push($(v).attr('url'))
            })

            $.each(menu, function(i, v) {
                stokUrl.push(v.url)
            })

            var difference = [];
            var label = '';

            jQuery.grep(stokUrl, function(el) {
                if (jQuery.inArray(el, listUrl) == -1) {
                    difference.push(el)
                };
            });

            $.each(menu, function(i, v) {
                if (jQuery.inArray(v.url, difference) !== -1) {
                    $('#sortable').append(`<li class="list-group-item group-list" url="` + v.url + `">
                            <i class="ti-link fs-5 me-2"></i>
                            <span class="nav-label ms-1">` + v.nama + `</span>
                            <button class="btn btn-outline-primary btn-icon rounded-circle btn-sm btn-add-icon"
                                onclick="changeIcon(this)">
                                <i class="ti-pencil"></i>
                            </button>
                        </li>`)
                }
            })


        }
    </script>
@endsection
