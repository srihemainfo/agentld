{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Sign IN')


@section('required_CSS')

@endsection


@section('content')
    <!-- sign-in popup start -->
    <section class="container paper-container mts-70">
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

            <!-- fontawesome cdn -->
            <!-- <script
              src="https://kit.fontawesome.com/9cea89f548.js"
              crossorigin="anonymous"
            ></script> -->
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            />
            <!-- css import -->
            <link rel="stylesheet" href="assets/styles/Home.css" />
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
            <!-- country flag input cdn -->
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
            />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

            <title>Earning History</title>
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
                      <a href="#" class="" aria-current="page">
                        <i class="fa-solid fa-house"></i>
                        Dashboard
                      </a>
                    </li>
                    <div class="nav-divider"></div>
                    <li>
                      <a href="#" class="" aria-current="page">
                        <i class="fa-solid fa-ticket"></i>
                        Tickets
                      </a>
                    </li>
                    <div class="nav-divider"></div>
                    <li>
                      <a href="#" class="" aria-current="page">
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
                            <a href="#" class="">
                              <i class="fa-solid fa-caret-right"></i>
                              Earning Transaction
                            </a>
                          </li>
                          <li>
                            <a href="#" class="">
                              <i class="fa-solid fa-caret-right"></i>
                              Point Transaction
                            </a>
                          </li>
                          <li>
                            <a href="#" class="">
                              <i class="fa-solid fa-caret-right"></i>
                              Withdraw
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <div class="nav-divider"></div>
                    <li>
                      <a href="#" class="" aria-current="page">
                        <i class="fa-regular fa-credit-card"></i>
                        Add Credits
                      </a>
                    </li>
                    <div class="nav-divider"></div>
                    <li>
                      <a href="#" class="" aria-current="page">
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

            <!-- breadcrumbs  start -->
            <section class="container mts-70">
              <div class="d-flex align-items-center pt-4">
                <button
                  id="back-home-btn"
                  class="bg-transparent border rounded-5 border-white"
                >
                  <i class="fa-solid fa-arrow-left text-light"></i>
                </button>
                <p class="fs-2 fw-semibold text-white m-0 ps-3">Earnings</p>
              </div>
              <div class="">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white">
                      <a href="#" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                      Transactions
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                      Earnings
                    </li>
                  </ol>
                </nav>
              </div>
            </section>
            <!-- breadcrumbs  end -->

            <!-- earning list start -->
            <section class="container">
              <div class="row row-cols-1 my-3 my-md-5">
                <div class="col">
                  <div class="agent-db-grid-item">
                    <h6 class="text-white fs-4 fw-normal mb-0 text-uppercase">
                      Total Earnings
                    </h6>
                    <p class="text-white fs-2 fw-bold mb-0 text-uppercase">Aed 2220</p>
                  </div>
                </div>
              </div>
            </section>

            <!-- earning list end -->

            <!--  select product section start -->
            <section class="container">
              <div class="bg-light p-3 rounded-3">
                <div>
                  <p class="fw-semibold mb-1">Earning Transaction History</p>
                </div>
                <div class="pb-4">
                  <form>
                    <div class="row date-picker-group form-group">
                      <div class="col-5">
                        <div class="input-group date position-relative" id="datepicker">
                          <input
                            type="text"
                            placeholder="mm/dd/yyyy"
                            class="form-control rounded-3 fs-6 z-1 input-bg"
                          />
                          <span
                            class="input-group-append position-absolute top-50 end-0 translate-middle-y pe-1 z-3"
                          >
                            <span class="input-group-text border-0 p-1 bg-white">
                              <i class="fa-regular fa-calendar-days text-secondary"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="col-5 ps-0">
                        <div
                          class="input-group date position-relative"
                          id="datepicker2"
                        >
                          <input
                            type="text"
                            placeholder="mm/dd/yyyy"
                            class="form-control rounded-3 fs-6 z-1 input-bg"
                          />
                          <span
                            class="input-group-append position-absolute top-50 end-0 translate-middle-y pe-1 z-3"
                          >
                            <span class="input-group-text border-0 p-1 bg-white">
                              <i class="fa-regular fa-calendar-days text-secondary"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="col-2 ps-0">
                        <button
                          class="btn w-100 h-100 btn-outline-secondary btn-primary text-light rounded-3 fw-bold ml-n1"
                          type="button"
                          id="button-addon2"
                        >
                          GO
                        </button>
                      </div>
                    </div>
                  </form>
                </div>

                <div>
                  <table
                    class="table text-center table-bordered text-uppercase align-items-center fw-semibold"
                  >
                    <thead>
                      <tr>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Ticket Amount</th>
                        <th scope="col">Commission (AED)</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody class="ertc-th-date">
                      <tr>
                        <th scope="row">
                          04-05-2023 <br />
                          09:00pm
                        </th>
                        <td>20.0</td>
                        <td>1.0</td>
                        <td>Success</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          04-05-2023 <br />
                          09:00pm
                        </th>
                        <td>20.0</td>
                        <td>1.0</td>
                        <td>Success</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          04-05-2023 <br />
                          09:00pm
                        </th>
                        <td>20.0</td>
                        <td>1.0</td>
                        <td>Success</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          04-05-2023 <br />
                          09:00pm
                        </th>
                        <td>20.0</td>
                        <td>1.0</td>
                        <td>Success</td>
                      </tr>
                      <tr>
                        <th scope="row">
                          04-05-2023 <br />
                          09:00pm
                        </th>
                        <td>20.0</td>
                        <td>1.0</td>
                        <td>Success</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-center">
                  <p class="fw-semibold">Showing 1 to 5 of 1,582 entries</p>
                </div>
                <!-- pagination -->
                <div class="w-100">
                  <nav
                    aria-label="Page navigation example"
                    class="pagination-contianer"
                  >
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
                          >Previous</a
                        >
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">...</a></li>
                      <li class="page-item"><a class="page-link" href="#">1582</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </section>

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
