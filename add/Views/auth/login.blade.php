@extends('base.app_login')
@section('main')
    <div class="card h-100 card-index">
        <div class="card-header d-flex align-items-center border-0">
            <div class="me-auto">
                {{-- <h3 class="h4 m-0">List</h3> --}}
            </div>
            <div class="toolbar-end">
                {{-- {{$pesan}} --}}
            </div>
        </div>

        <div class="card-body" style="min-height: 60vh;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('/img/logo_ma.jpeg') }}" alt="" height="250" width="250">
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12" id="templateTable">
                    <div class="cls-content">
                        <div class="cls-content-sm panel">
                            <div class="panel-body" id="loginForm">
                                <div class="mar-ver pad-btm  text-center">
                                    <h1 class="h3">Account Login</h1>
                                    <p>Sign In to your account</p>
                                </div>
                                <form action="{{ route('sign_in') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Username or Email</label>
                                        <input type="text" class="form-control" placeholder="Username or Email"
                                            autofocus="" name="username">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="text-center">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" id="signIn">Sign
                                            In</button>
                                        <br>
                                        <br>
                                        <button class="btn btn-outline-primary btn-lg btn-block" type="button"
                                            onclick="toRegister()">to Register</button>
                                    </div>
                                </form>

                            </div>

                            <div class="panel-body undisplay" id="registerForm">
                                <div class="mar-ver pad-btm  text-center">
                                    <h1 class="h3">Account Register</h1>
                                    <p>Input your account data</p>
                                </div>

                                <div class="form-group">
                                    <input type="text" store="role_id" value="4" class="undisplay">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" store="username">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" store="email">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" store="password" autocomplete="off">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Password Confirm</label>
                                    <input type="password" class="form-control" store="password-confirm" autocomplete="off">
                                </div>
                                <br>
                                <br>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg btn-block" type="button"
                                        onclick="simpanData()">Register</button>
                                    <br>
                                    <br>
                                    <button class="btn btn-outline-primary btn-lg btn-block" type="button"
                                        onclick="toLogin()">to Sign In</button>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md-12 text-center">
                    {{-- <img src="{{ asset('/img/simpledev_logo_black.png') }}" alt="" height="60" width="120"> --}}
                </div>
            </div>
        </div>
        <div class="card-body text-center">
            <div>
                contact me
                <br>
                divakhaliza@gmail.com
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const pesan = '<?php echo json_encode($pesan); ?>';
        console.log(pesan)
        $(document).ready(function() {
            if (pesan != '""') {
                notif(pesan, 'danger')
            }

        })

        function toLogin() {
            $('#loginForm').removeClass('undisplay')
            $('#registerForm').addClass('undisplay')
        }

        function toRegister() {
            $('#loginForm').addClass('undisplay')
            $('#registerForm').removeClass('undisplay')
            $('[store]').val('')
            $('[store="role_id"]').val('4')
        }

        function simpanData() {
            $('.loader').show()

            postData = {}

            $('[store]').not('[store="id"]').each(function(i, v) {
                post = $(v).attr('store')
                data = $(v).val()

                postData[post] = data
            })

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'register',
                method: 'POST',
                data: postData,
                success: function(response) {
                    console.log(response)
                    notif('Registrasi berhasil', 'success')
                    $('.loader').hide()
                    toLogin()
                    $('[name="username"]').val(response.username)
                    $('[name="password"]').val(postData.password)
                    $('#signIn').click();

                },
                error: function(response) {
                    console.log(response)
                    message = ''
                    $('[store]').removeClass('is-invalid')
                    $.each(response.responseJSON.errors, function(i, v) {
                        message = v[0]
                        $('[store="' + i + '"]').addClass('is-invalid')
                    })
                    notif(message, 'danger')
                    $('.loader').hide()

                }
            })
        }
    </script>
@endsection
