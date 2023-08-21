{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Sign UP')


@section('required_CSS')

@endsection


@section('content')
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
                    <form>
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
                                aria-label="Username" aria-describedby="basic-addon1" />
                        </div>
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
                                aria-label="Username" aria-describedby="basic-addon1" />
                        </div>
                    </form>
                </div>
                <div class="text-end px-5">
                    <a id="si-forgot-redirect-btn" href="#" class="fs-4 text-decoration-none text-secondary">Forgot
                        Password?</a>
                </div>
                <div class="modal-footer pt-3 border-0 px-5 pb-4 justify-content-center popup-action-btn">
                    <button type="button" id="sign-in-btn" class="btn btn-primary px-5 text-light fs-3 fw-semibold px-4"
                        data-bs-dismiss="modal">
                        Sign In
                    </button>
                </div>
                <div class="sign-in-footer">
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
                </div>
            </div>
        </div>
    </section>
    <!--  sign-in popup end -->
@endsection




@section('required_JS')

@endsection
