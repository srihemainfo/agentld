{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Sign IN')


@section('required_CSS')

@endsection


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- sign-in popup start -->
    <section class="container paper-container mts-70">
        <div class="sign-in-logo">
            <img src="./assets/images/try-daily-just-3.png" alt="" />
        </div>

        <div class="bg-light rounded-4 mt-5">
            <div class="modal-content-container">
                <div class="modal-body px-4 px-sm-5 pt-5 pb-0">
                    <h1 class="modal-title text-center text-primary fs-2 fw-bold mb-4" id="exampleModalLabel">
                        Sign In
                    </h1>

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    {{-- <form> --}}
                        @csrf
                        <p style="color:red;" class="fs-5" id="error_namepassword"></p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-end-0 rounded-top-3 rounded-start-3 input-bg"
                                    id="basic-addon1">
                                    <div class="login-input-icon-bg icon-bg-secondary">
                                        <i class="fa-solid text-light text-secondary fs-5 fa-user"></i>
                                    </div>
                                </span>
                            </div>
                            <input type="text" class="form-control fs-4 text-secondary input-bg" placeholder="Username"
                                aria-label="Username" name="name" id="username" aria-describedby="basic-addon1" /><br>


                        </div>
                        <p class="fs-5" style="color:red;" id="error_name"></p>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-end-0 rounded-top-3 rounded-start-3 input-bg"
                                    id="basic-addon1">
                                    <div class="login-input-icon-bg icon-bg-secondary">
                                        <i class="fa-solid text-light fs-5 fa-unlock-keyhole"></i>
                                    </div>
                                </span>
                            </div>
                            <input type="text" class="form-control fs-4 text-secondary input-bg" placeholder="Password"
                                aria-label="Username"  name="password" id="password" aria-describedby="basic-addon1" />

                        </div>
                        <p class="fs-5" style="color:red;" id="error_password"></p>
                </div>

                <div class="text-end px-5">
                    <a id="si-forgot-redirect-btn" href="/forgot_password" class="fs-4 text-decoration-none text-secondary">Forgot
                        Password?</a>
                </div>

                <div class="modal-footer pt-3 border-0 px-5 pb-4 justify-content-center popup-action-btn">
                    <button type="text"  id="sign-in" class="btn btn-primary px-5 text-light fs-3 fw-semibold px-4"
                        >
                        Sign In
                    </button>
                </div>
            {{-- </form> --}}
                {{-- <div class="sign-in-footer">
                    <div class="text-end px-5">
                        <p class="fs-4 text-secondary text-center m-0 mt-3">
                            Not Registered yet?
                        </p>
                    </div>
                    <div class="modal-footer pt-0 border-0 px-5 pb-4 justify-content-center popup-action-btn">
                        <button id="redirect-sign-up" class="btn btn-primary px-5 text-light fs-3 fw-semibold px-4">
                            Sign Up
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--  sign-in popup end -->
@endsection




@section('required_JS')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#sign-in').click(function() {
          var username=  $('#username').val();
          var password=  $('#password').val();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
            });
            $.ajax({
                url: '{{ route("agent.login") }}',
                type: 'POST',
                data: {
                    'email': username,'password': password,
                },
                success: function(response) {
                    // alert('response');
                    console.log(response);
                    if(response.code === 200){

                        window.location.href = '/agent-panel/dashboard-agents';
                    }
                    if(response.code === 401){

                        $('#error_password').text('');
                    $('#error_name').text('');
                  $('#error_namepassword').text(response.message);
                    }
                },
                error: function(error) {

                    $('#error_password').text('');
                    $('#error_name').text('');
                    $('#error_namepassword').text('');


                    if(error.responseJSON.message.password[0]){

                        $('#error_password').text(error.responseJSON.message.password[0]);
                    }
                    if(error.responseJSON.message.email[0]){

                        $('#error_name').text(error.responseJSON.message.email[0]);

                    }

                }
            });
        // }else{

        //     $('#error_name').text('pls enter the name');

        // }
        });
    });
</script>




@endsection
