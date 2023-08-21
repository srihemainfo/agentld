{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Sign IN')


@section('required_CSS')

@endsection


@section('content')
    <!-- sign-in popup start -->
    <section class="container paper-container mts-70">
        <!DOCTYPE html>
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <!-- bootstrap links -->
            <link
              href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
              crossorigin="anonymous"
            />

            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
            />

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            />

            <!-- Latest compiled and minified CSS -->
            <link
              rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css"
            />

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

            <!-- css import -->
            <link rel="stylesheet" href="assets/styles/Home.css" />
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
            <!-- country flag input cdn -->
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
            />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

            <title>Credit Product Selection</title>
          </head>
          <body>
            <!-- navbar start -->
            <nav
              id="nav-container"
              class="navbar navbar-expand-lg bg-nav p-0 bg-body-tertiary sticky-top"
            >

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
                      <a
                        id="transaction-nav-handler"
                        href="#"
                        class=""
                        aria-current="page"
                      >
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
                    <div class="nav-divider"></div>
                    {{-- <li>
                      <a
                        href="#"
                        id="add-credit-nav-btn"
                        add-credit-nav-btn
                        class=""
                        aria-current="page"
                      >
                        <i class="fa-regular fa-credit-card"></i>
                        Add Credits
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
              <div
                class="modal sign-out_modal fade"
                id="signoutModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog sign-out-modal-position">
                  <div class="modal-content sign-out-modal-container">
                    <div class="modal-body px-3 pt-3 pb-0">
                      <h1
                        class="modal-title text-center text-white fs-2 fw-semibold mb-1"
                        id="exampleModalLabel"
                      >
                        Marayam Liz
                      </h1>
                      <p class="text-center fs-4 fw-semibold text-white">Agent</p>
                      <div class="border-bottom border-primary"></div>
                      <div class="py-3">
                        <a
                          href="customer-profile.html"
                          type="button"
                          class="text-decoration-none text-white fs-4"
                        >
                          <i class="fa-solid fa-circle-user"></i> &nbsp; Profile
                        </a>
                      </div>
                      <div class="border-bottom border-primary"></div>
                      <div class="py-3">
                        <a
                          href=""
                          type="button"
                          id="profile-sign-out-btn"
                          class="text-decoration-none text-white fs-4"
                        >
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

            <!-- product list start -->
            <section class="container mts-70">
              <div class="d-flex align-items-center pt-4">
                <button
                  id="back-home-btn"
                  class="bg-transparent border rounded-5 border-white"
                >
                  <i class="fa-solid fa-arrow-left text-light"></i>
                </button>
                <p class="fs-2 fw-semibold text-white m-0 ps-3">Add Credits</p>
              </div>
              <div class="">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white">
                      <a href="#" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                      Add Credits
                    </li>
                  </ol>
                </nav>
              </div>
            </section>
            <section class="container">
              <div class="p-4 bg-light my-4 rounded-3">
                <div class="d-flex align-items-center justify-content-evenly">
                  <div class="text-center">
                    <p class="fs-2 fw-bold m-0 text-primary">Aed 110</p>
                    <p class="fs-5 fw-semibold text-uppercase m-0">
                      1 Carton (12 Bottles)
                    </p>
                  </div>
                  <div>
                    <img class="h-50" src="./assets/images/long-bottle.png" alt="" />
                  </div>
                </div>
                <hr class="hr mb-0" />
                <div class="">
                  <div>
                    <p class="m-0 fs-6 fw-semibold">Cash Points 110</p>
                    <p class="m-0 fs-6 fw-semibold">Bonus Points 110</p>
                  </div>
                  <!-- <div class="d-flex align-items-end mt-4"> -->
                  <div class="d-flex align-items-center justify-content-between mt-0">
                    <p class="m-0 fs-6 fw-bold">Total Points 110</p>
                    <button
                      class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-semibold ml-n1 add-crdt-slct-btn"
                      type="button"
                      id="button-addon2"
                    >
                      Select
                    </button>
                  </div>
                </div>
              </div>
              <div class="p-4 bg-light my-4 rounded-3">
                <div class="d-flex align-items-center justify-content-evenly">
                  <div class="text-center">
                    <p class="fs-2 fw-bold m-0 text-primary">Aed 110</p>
                    <p class="fs-5 fw-semibold text-uppercase m-0">
                      1 Carton (12 Bottles)
                    </p>
                  </div>
                  <div>
                    <img class="h-50" src="./assets/images/long-bottle.png" alt="" />
                  </div>
                </div>
                <hr class="hr mb-0" />
                <div class="">
                  <div>
                    <p class="m-0 fs-6 fw-semibold">Cash Points 110</p>
                    <p class="m-0 fs-6 fw-semibold">Bonus Points 110</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-0">
                    <p class="m-0 fs-6 fw-bold">Total Points 110</p>
                    <button
                      class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-semibold ml-n1 add-crdt-slct-btn"
                      type="button"
                      id="button-addon2"
                    >
                      Select
                    </button>
                  </div>
                </div>
              </div>
              <div class="p-4 bg-light my-4 rounded-3">
                <div class="d-flex align-items-center justify-content-evenly">
                  <div class="text-center">
                    <p class="fs-2 fw-bold m-0 text-primary">Aed 110</p>
                    <p class="fs-5 fw-semibold text-uppercase m-0">
                      1 Carton (12 Bottles)
                    </p>
                  </div>
                  <div>
                    <img class="h-50" src="./assets/images/long-bottle.png" alt="" />
                  </div>
                </div>
                <hr class="hr mb-0" />
                <div class="">
                  <div>
                    <p class="m-0 fs-6 fw-semibold">Cash Points 110</p>
                    <p class="m-0 fs-6 fw-semibold">Bonus Points 110</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-0">
                    <p class="m-0 fs-6 fw-bold">Total Points 110</p>
                    <button
                      class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-semibold ml-n1 add-crdt-slct-btn"
                      type="button"
                      id="button-addon2"
                    >
                      Select
                    </button>
                  </div>
                </div>
              </div>
              <div class="p-4 bg-light my-4 rounded-3">
                <div class="d-flex align-items-center justify-content-evenly">
                  <div class="text-center">
                    <p class="fs-2 fw-bold m-0 text-primary">Aed 110</p>
                    <p class="fs-5 fw-semibold text-uppercase m-0">
                      1 Carton (12 Bottles)
                    </p>
                  </div>
                  <div>
                    <img class="h-50" src="./assets/images/long-bottle.png" alt="" />
                  </div>
                </div>
                <hr class="hr mb-0" />
                <div class="">
                  <div>
                    <p class="m-0 fs-6 fw-semibold">Cash Points 110</p>
                    <p class="m-0 fs-6 fw-semibold">Bonus Points 110</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-0">
                    <p class="m-0 fs-6 fw-bold">Total Points 110</p>
                    <button
                      class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-semibold ml-n1 add-crdt-slct-btn"
                      type="button"
                      id="button-addon2"
                    >
                      Select
                    </button>
                  </div>
                </div>
              </div>
            </section>
            <!-- product list end -->

            <!--  select product section end -->

            <!-- <br />
            <br />
            <br /> -->

            <!-- footer start -->
            <footer class="container mt-5">
              <div class="text-center">
                <p class="fw-normal fs-6 text-light">
                  All Rights Reserved@2023, Little Draw Licence No:1020580
                </p>
              </div>
            </footer>
            <!-- footer footer end -->

            <!-- all script links start -->
            <script
              src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
              crossorigin="anonymous"
            ></script>
            <script type="text/javascript">
              $(function () {
                $("#datepicker").datepicker();
              });
              $(function () {
                $("#datepicker2").datepicker();
              });
              $(function () {
                $("#datepickerfrom").datepicker();
              });
              $(function () {
                $("#datepickerto").datepicker();
              });
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

@endsection
