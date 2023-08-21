{{-- Sign up  --}}
@extends('welcome')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('page-Title', 'Dashboard')


@section('required_CSS')

@endsection


@section('content')
    <!-- sign-in popup start -->

    <section class="container paper-container mts-70">
        <?php
        // dd($agent);
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <!-- bootstrap links -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
                crossorigin="anonymous" />


            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
            <!-- css import -->
            <link rel="stylesheet" href="assets/styles/Home.css" />
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
            <!-- country flag input cdn -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />


            <title>Little Draw Dashboard Agents</title>
        </head>

        <body>
            <!-- navbar start -->
            <nav id="nav-container" class="navbar navbar-expand-lg bg-nav p-0 bg-body-tertiary sticky-top">


                <a href="#" class="nav-avatar" data-bs-toggle="modal" data-bs-target="#signoutModal"
                    data-bs-whatever="@mdo">
                </a>
                </div>
                <div>
                    <div id="mobile-nav-menu" class="mobile-nav-menu d-none">
                        <ul class="navbar-nav expanded-navs">
                            <li>
                                <a href="#" id="dashboard-nav-btn" class="" aria-current="page">
                                    <i class="fa-solid fa-house"></i>
                                    Dashboard
                                </a>
                            </li>
                            <div class="nav-divider"></div>
                            <li>
                                <a href="#" id="tickets-nav-btn" class="" aria-current="page">
                                    <i class="fa-solid fa-ticket"></i>
                                    Tickets
                                </a>
                            </li>
                            <div class="nav-divider"></div>
                            <li>
                                <a href="#" id="customer-nav-btn" class="" aria-current="page">
                                    <i class="fa-solid fa-circle-user"></i>
                                    Customers
                                </a>
                            </li>
                            <div class="nav-divider"></div>
                            <li>
                                <a id="transaction-nav-handler" href="#" class="" aria-current="page">
                                    <i class="fa-solid fa-right-left"></i>
                                    Transactions
                                </a>
                                <div id="sub-expanded-navs" class="transaction-expand-nav">
                                    <ul class="sub-expanded-navs">
                                        <li>
                                            <a href="#" id="earning-transaction-nav-btn" class="">
                                                <i class="fa-solid fa-caret-right"></i>
                                                Earning Transaction
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" id="point-transaction-nav-btn" class="">
                                                <i class="fa-solid fa-caret-right"></i>
                                                Point Transaction
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" id="withdraw-transaction-nav-btn" class="">
                                                <i class="fa-solid fa-caret-right"></i>
                                                Withdraw
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{-- <div class="nav-divider"></div>
                            <li>
                                <a href="#" id="add-credit-nav-btn" add-credit-nav-btn class=""
                                    aria-current="page">
                                    <i class="fa-regular fa-credit-card"></i>
                                    Add Creditsss
                                </a>
                            </li> --}}
                            <div class="nav-divider"></div>
                            <li>
                                <a href="#" id="req-points-nav-btn" class="" aria-current="page">
                                    <i class="fa-solid fa-hand-holding-droplet"></i>
                                    Request Points
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- navbar end -->

            <!-- profile popup section start -->
            <div>
                <div class="modal sign-out_modal fade" id="signoutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog sign-out-modal-position">
                        <div class="modal-content sign-out-modal-container">
                            <div class="modal-body px-3 pt-3 pb-0">
                                <h1 class="modal-title text-center text-white fs-2 fw-semibold mb-1" id="exampleModalLabel">
                                    Marayam Liz
                                </h1>
                                <p class="text-center fs-4 fw-semibold text-white">Agent</p>
                                <div class="border-bottom border-primary"></div>
                                <div class="py-3">
                                    <a href="customer-profile.html" type="button"
                                        class="text-decoration-none text-white fs-4">
                                        <i class="fa-solid fa-circle-user"></i> &nbsp; Profile
                                    </a>
                                </div>
                                <div class="border-bottom border-primary"></div>
                                <div class="py-3">
                                    <a href="" type="button" id="profile-sign-out-btn"
                                        class="text-decoration-none text-white fs-4">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp;
                                        Profile Sign Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile popup section end -->

            <!-- dashboard card section start -->
            <section class="container mts-70">
                <div class="text-center pt-5 pb-0">
                    <h1 class="text-white fs-1 fw-600 text-uppercase">Agent Dashboard</h1>
                </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 g-4 my-3 my-md-5 align-items-center">
                    <div class="col">
                        <div class="agent-db-grid-item">
                            <h6 class="text-white fs-4 fw-normal text-uppercase mb-0">
                                Weekly Draw
                                #<p  id="draw_id" ></p>

                            </h6>
                            <p class="text-white fs-2 fw-bold text-uppercase mb-0" id="daily_draw">Aed</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="agent-middle-db-grid-item">
                            <h6 class="text-white fs-4 fw-normal text-uppercase mb-0">
                                Weekly Draw #<p  id="draw_id1" ></p>
                            </h6>
                            <p class="text-white fs-2 fw-bold text-uppercase mb-0" id="daily_draw1">Aed</p>
                            <div class="agent-divider"></div>
                            <h6 class="text-white fs-4 fw-normal text-uppercase mb-0">
                                Cash Points: <span class="fs-3" id="cash_points"></span>
                            </h6>
                            <h6 class="text-white fs-4 fw-normal text-uppercase mb-0">
                                Bonus Points: <span class="fs-3" id="bonus_points"></span>
                            </h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="agent-db-grid-item">
                            <h6 class="text-white fs-4 fw-normal text-uppercase mb-0">
                                Weekly Draw  #<p  id="draw_id2" ></p>
                            </h6>
                            <p class="text-white fs-2 fw-bold text-uppercase mb-0" id="daily_draw2">Aed</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- dashboard card section start -->

            <!-- <br />
                <br />
                <br /> -->

            <!-- footer start -->

            <!-- footer footer end -->

            <!-- all script links start -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                AOS.init({
                    duration: 1200,
                });
            </script>
            <script src="assets/js/index.js"></script>
            <!-- all script links end -->
        </body>

        </html>
    </section>
    <!--  sign-in popup end -->
@endsection




@section('required_JS')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            var sessionData = @json(session()->all());
            var someValue = sessionData.token;
            // alert(someValue);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer '+someValue
                }
            });
            $.ajax({
                url: '{{ route('agent.agent_dashboard') }}',
                type: 'POST',
                data: {

                    token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#draw_id").html(response.data.draw_no);
                    $("#draw_id1").html(response.data.draw_no);
                    $("#draw_id2").html(response.data.draw_no);

                    $("#daily_draw").html(response.data.daily_draw);
                    $("#daily_draw1").html(response.data.daily_draw);
                    $("#daily_draw2").html(response.data.daily_draw);
                    // console.log(response.data.balance_points);
                    $("#cash_points").html(response.data.balance_points);
                    $("#bonus_points").html(response.data.total_points);
                    console.log(response.data.balance_points);


                    //     console.log(response);
                    //     if(response.code === 200){

                    //         window.location.href = '/agent-panel/dashboard-agents';
                    //     }
                    //     if(response.code === 401){

                    //   $('#error_namepassword').text(response.message);
                    //     }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });


        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var sessionData = @json(session()->all());
            var someValue = sessionData.token;
// alert(someValue);
$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer '+someValue
                }
            });
            $('#profile-sign-out-btn').click(function() {

    // alert('asdsffgs');
    $.ajax({
                    url: '{{ route("agent.logout") }}',
                    type: 'POST',
                    data: {
                        // 'otp': otps,'email':hiddenemail,
                    },
                    success: function(response) {
// alert('sdfsfs');
                        if(response.code === 200){
                            window.location.href = '/agent-signin';

                        }

                    },
                    error: function(error) {




                    }

                });
            });
        });
    </script>
@endsection
