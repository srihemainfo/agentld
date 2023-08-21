{{-- Sign up  --}}

@extends('welcome')

@section('page-Title', 'TICKETS')


@section('required_CSS')

@endsection


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
         <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>
         <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css"/>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

            <!-- fontawesome cdn -->

            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
            />
            <!-- css import -->
            <link rel="stylesheet" href="./assets/styles/Home.css" />
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
            <!-- country flag input cdn -->
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
            />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

            <title>Tickets Page</title>

            <style>
                .otp-box input {
    font-size: 30px !important;
    width: 54px;
    height: 54px;
    text-align: center;
    border: 2px solid #c0c2c4;
    margin-right: 10px;
    border-radius: 10px;
}


.bgWhite{
  background:white;
  box-shadow:0px 3px 6px 0px #cacaca;
}

.title{
  font-weight:600;
  margin-top:20px;
  font-size:24px
}

.customBtn{
  border-radius:0px;
  padding:10px;
}

form input{
  display:inline-block;
  width:50px;
  height:50px;
  text-align:center;
}
                </style>
          </head>
          <body>
            <!-- navbar start -->
            <nav
              id="nav-container"
              class="navbar navbar-expand-lg bg-nav p-0 bg-body-tertiary sticky-top"
            >


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
                    {{-- <div class="nav-divider"></div>
                    <li>
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

            <!-- search existing customer start -->
            <section class="container paper-container mts-70">
                <div class="bg-light rounded-4 mt-5">


                  <div class="modal-content-container">
                    <div class="modal-header border-0">

                    </div>
                    <div class="pt-4">
                      <p class="text-center text-black fs-1">Forgot Password</p>
                    </div>
                    <div
                    class="modal fade"
                    id="created-successfully"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                  >
                  </div>
                    <div class="modal-body px-4 px-sm-5 pt-0">
                      <div class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button
                            type="button"
                            id="forgot-email-btn"
                            class="btn bg-black text-white fs-3 px-3"
                          >
                            Email
                          </button>
                          <button
                            type="button"
                            id="forgot-mobile-btn"
                            class="btn bg-secondary text-white fs-3 px-3"
                          >
                            Mobile
                          </button>
                        </div>
                      </div>
                      <form>
                        <div id="forgot-email-input" class="py-3">
                          <label
                            for="recipient-name"
                            class="col-form-label fs-3 text-secondary"
                            >Email</label
                          >
                          <input
                            type="email"
                            class="form-control fs-3 text-secondary input-bg"
                            id="email"
                            placeholder="Enter email"
                          />
                        </div>
                        <div id="forgot-mobile-input" class="py-3 d-none">
                          <label
                            for="recipient-name"
                            class="col-form-label fs-3 text-secondary"
                            >Mobile</label
                          >
                          <input
                            type="tel"
                            class="form-control fs-3 text-secondary input-bg"
                            id="mobile"
                            placeholder="Enter mobile"
                          />
                        </div>
                      </form>
                      <p style="color:red;" class="fs-5" id="invalidmobile"></p>
                    </div>

                    <div class="modal-footer border-0 justify-content-center pt-3 pb-5">
                      <button type="button" class="btn btn-danger fs-3 fw-semibold px-4" id="send_otp">
                        Send OTP
                      </button>
                    </div>
                  </div>

                </div>

              </section>
            <!-- search existing customer end -->

            <!--  select product section start -->




            <!--  select product section end -->

            <!-- new customer popup start -->

            <div
              class="modal fade"
              id="create-customer"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered" id="close_model">
                <div class="modal-content">
                  <div class="modal-header py-2 px-4">
                    <h1
                      class="modal-title fs-4 fw-semibold text-secondary"
                      id="exampleModalLabel"
                    >
                      Add Customer
                    </h1>
                    <button
                      type="button"
                      class="btn-close text-secondary"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>

                  <div class="modal-body px-4 pt-2 pb-0">
                    <p style="color:red;" class="fs-5"  id="error_nameemail"></p>
                    {{-- <form> --}}

                        @csrf
                        <p style="color:red;" class="fs-5" id="error_namemobile"></p>

                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span
                            class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                            id="basic-addon1"
                          >
                            <i class="fa-solid fs-5 fa-user text-secondary"></i>
                          </span>
                        </div>
                        <input
                          type="text"
                          class="form-control fs-5 text-secondary wt-input-bg"
                          placeholder="Full Name(As Per Passport / ID)"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          name="name"
                          id="name"
                        />

                      </div>
                      <p style="color:red;" id="error_name"></p>
                      <div class="input-group mb-2">
                        <!-- <div class="input-group-prepend">
                              <span
                                class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                                id="basic-addon1"
                              >
                                <i class="fa-solid fs-5 fa-user"></i>
                              </span>
                            </div> -->
                        <!-- id="phone-input-country-code" -->
                        <input
                          type="tel"
                          id="phone"
                          {{-- id="mobile" --}}
                          class="form-control fs-5 text-secondary wt-input-bg w-100 telephone-input"
                          placeholder="50 123 4567"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          name="mobile"

                        />

                      </div>
                      <p style="color:red;" id="error_phone"></p>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span
                            class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                            id="basic-addon1"
                          >
                            <i class="fa-solid fs-6 fa-envelope text-secondary"></i>
                          </span>
                        </div>
                        <input
                          type="text"
                          class="form-control fs-5 text-secondary wt-input-bg"
                          placeholder="Email"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          name="email"
                          id="email"
                        />

                      </div>
                      <p style="color:red;" id="error_email"></p>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span
                            class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                            id="basic-addon1"
                          >
                            <i class="fa-solid fs-5 fa-building text-secondary"></i>
                          </span>
                        </div>
                        <input
                          type="text"
                          class="form-control fs-5 text-secondary wt-input-bg"
                          placeholder="Building Name"
                          aria-label="Username"
                          aria-describedby="basic-addon1"
                          name="building_name"
                          id="building_name"
                        />

                      </div>
                      <p style="color:red;" id="error_buildingname"></p>
                      <div class="input-group mb-2 position-relative">
                        <div class="input-group-prepend">
                          <span
                            class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                            id="basic-addon1"
                          >
                            <i
                              class="fa-solid fs-5 fa-earth-americas text-secondary"
                            ></i>
                          </span>
                        </div>
                        <?php

                        // print_r($countries);
                       ?>

                        <p style="color:red;" id="error_country"></p>
                        <div
                          class="position-absolute top-50 end-0 translate-middle-y pe-3"
                        >
                          <i class="fa-solid fs-5 fa-chevron-down"></i>
                        </div>
                      </div>

                      <div class="input-group mb-2 position-relative">
                        <div class="input-group-prepend">
                          <span
                            class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                            id="basic-addon1"
                          >
                            <i
                              class="fa-solid fs-5 fa-flag-checkered text-secondary"
                            ></i>
                          </span>
                        </div>
                        <select
                          class="custom-select form-control fs-5 text-secondary rounded-end-3 wt-input-bg"
                          id="state"
                        >
                        <option value="">-- Select Country --</option>
                        </select>
                        <p style="color:red;" id="error_state"></p>
                        <div
                          class="position-absolute top-50 end-0 translate-middle-y pe-3"
                        >
                          <i class="fa-solid fs-5 fa-chevron-down"></i>
                        </div>
                      </div>

                      <div class="input-group mb-2 position-relative">
                        <div class="input-group-prepend">
                          <span
                            class="input-group-text p-3 rounded-end-0 rounded-top-3 rounded-start-3"
                            id="basic-addon1"
                          >
                            <i class="fa-solid fs-5 fa-location-dot text-secondary"></i>
                          </span>
                        </div>
                        <select
                          class="custom-select form-control fs-5 text-secondary rounded-end-3 wt-input-bg"
                          id="city"
                        >

                        </select>
                        <p style="color:red;" id="error_city"></p>
                        <div
                          class="position-absolute top-50 end-0 translate-middle-y pe-3"
                        >
                          <i class="fa-solid fs-5 fa-chevron-down"></i>
                        </div>
                      </div>

                  </div>
                  <div class="modal-footer px-4 pt-2 pb-3 popup-action-btn">
                    <button  name="send"
                    id="new_customer"
                      {{-- type="submit" --}}
                      class="btn btn-info text-light fs-3 fw-semibold px-4"
                      {{-- data-bs-toggle="modal"
                      data-bs-target="#created-successfully" --}}
                      {{-- data-bs-whatever="@mdo" --}}
                    >
                      Create Customer
                    </button>

                {{-- </form> --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- new customer popup end -->

            <!-- ticket confirmation popup start -->
            <!-- <button
              type="button"
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#created-successfully"
              data-bs-whatever="@mdo"
            >
              Ticket Confirmation
            </button> -->
            <div id="mymodel"
              class="modal fade"
              id="created-successfully"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
              >
              <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content">
                  <div class="modal-header border-0 pt-4 px-4 pb-0">
                    <h1 class="modal-title fs-2 fw-bold" id="exampleModalLabel">
                      {{-- Success! --}}
                      OTP Verify
                    </h1>


                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div>

                        </div>

                        <div id="hidden-h1">
                        <input type="hidden" id="hidden-email">

                  <div class="modal-body px-4 pt-0" id="mydodel">
                    <p  class="fs-4 text-center" id="text_hide">Pls Enter Your four digit Otp..</p>
                    <p style="color:red;" class="fs-5" id="otpvalid"></p>

                    <div class="row">
                        <div class="col-md-10 text-center my-2 otp-box justify-content-around m-auto text-center d-flex">
                          <input type="text" class="otp" id="otp1" maxlength="1">
                          <input type="text" class="otp" id="otp2" maxlength="1">
                          <input type="text" class="otp" id="otp3" maxlength="1">
                          <input type="text" class="otp" id="otp4" maxlength="1">
                        </div>
                      </div>

                    <p style="color:red;" id="error-message"></p>

                  </div>
                  </div>
                  <div class="modal-footer border-0 pt-3 p-4">
                    <button
                      type="button"
                      id="otp_verity"
                      class="btn btn-danger fs-3 fw-semibold px-4"
                      {{-- data-bs-dismiss="modal" --}}
                      aria-label="submit"
                    >
                      Submit
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--  ticket confirmation popup end -->
            <div
            class="modal fade"
            id="ticket-preview-popup"
            tabindex="-1"
            aria-labelledby="ticket-preview-popup"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header py-4 px-4">
                  <h1 class="modal-title fs-5 text-secondary" id="exampleModalLabel">
                    Ticket Preview
                  </h1>
                  <button
                    type="button"
                    class="btn-close text-secondary"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>

                <div class="modal-body px-4 pt-4">
                  <h1
                    class="modal-title text-center fs-4 fw-semibold mb-5"
                    id="exampleModalLabel"
                  >
                    Ticket Details
                  </h1>
                  <div class="ticket-preview-bordered-table">
                    <table class="table table-borderless mb-0">
                      <thead>
                        <tr>
                          <th scope="col" class="text-uppercase text-center p-0">
                            Customer Name
                          </th>
                          <th scope="col" class="text-uppercase text-center p-0">
                            Mobile No
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          {{-- <td class="text-center p-0">Dennis Vargheese</td> --}}
                          <td class="text-center p-0"><p class="fw-semibold mb-1" id="customer_names">:</p></td>
                          <td class="text-center p-0"><p class="fw-semibold mb-1" id="customer_mobile">:</p></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <h2 class="fs-5 text-center mt-4 mb-2">Weekly Draw #<p class="fw-semibold mb-1" id="draw"></h2>
                  <div class="ticket-preview-bordered-table">
                    <table class="table table-borderless mb-0">
                      <thead>
                        <tr>
                          <th scope="col" class="text-uppercase text-center p-0">
                            Grand Prize Upto
                          </th>
                          <th scope="col" class="text-uppercase text-center p-0">
                            Issued On
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center p-0">AED 30,000</td>
                          <td class="text-center p-0"><p class="fw-semibold mb-1" id="cur_date">:</p></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <h2 class="fs-5 text-center mt-4 mb-2">Rolling Ball Draw Prizes</h2>
                  <div class="ticket-preview-bordered-table">
                    <table class="table table-borderless mb-0">
                      <thead>
                        <tr>
                          <th scope="col" class="text-uppercase text-center p-0">
                            1st Prize <br />
                            Upto
                          </th>
                          <th scope="col" class="text-uppercase text-center p-0">
                            2nt Prize <br />
                            Upto
                          </th>
                          <th scope="col" class="text-uppercase text-center p-0">
                            3rd Prize <br />
                            Upto
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center p-0">AED 30,000</td>
                          <td class="text-center p-0">AED 30,000</td>
                          <td class="text-center p-0">AED 30,000</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <h2 class="fs-5 mt-4 mb-2">Total Lines</h2>
                  <h2 class="fs-5 mb-2"><p class="fw-semibold mb-1" id="ticket_lines"></h2>
                  <div class="ticket-preview-bordered-table">
                    <table class="table table-borderless mb-0" id="valueTable">
                      <thead>
                        <tr>
                          <th scope="col" class="text-uppercase text-center p-0">
                            Products
                          </th>
                          <th scope="col" class="text-uppercase text-center p-0">
                            Lines
                          </th>
                          <th scope="col" class="text-uppercase text-center p-0">
                            My3 Numbers
                          </th>
                        </tr>
                      </thead>
                      <tbody id="table_body">



                      </tbody>
                    </table>
                  </div>
                  <div class="py-4 text-center">
                    <p class="mb-0">Rolling Ball Draw Date: <p class="fw-semibold mb-1" id="resultdate"></p>
                    <p class="mb-0">Raffle Draw Date: <p class="fw-semibold mb-1" id="raffle"></p>
                    <p class="mb-0">All Other Terms and Conditions Apply</p>
                  </div>
                </div>
                <div class="modal-footer p-4 popup-action-btn">
                  <button
                    type="button"
                    class="btn btn-danger fs-4 px-4"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  >
                    Cancel
                  </button>
                  <button
                    type="button"
                    class="btn btn-success fs-4 px-4"
                    {{-- data-bs-toggle="modal"
                    data-bs-target="#ticket-success"
                    data-bs-whatever="@mdo" --}}
                    id="ticket-success"
                  >
                    Confirm
                  </button>
                </div>
              </div>
            </div>
          </div>
            <br />

            <!-- footer start -->
            {{-- <footer class="container mt-5">
              <div class="text-center">
                <p class="fw-normal fs-6 text-light">
                  All Rights Reserved@2023, Little Draw Licence No:1020580
                </p>
              </div>
            </footer> --}}
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
            </script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

               <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                   <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                   <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                   <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
            <script>
           new DataTable('#example', {
            responsive: true
        });


              AOS.init({
                duration: 1200,
              });
            </script>
            <script src="./assets/js/index.js"></script>
            <!-- all script links end -->
          </body>
        </html>
    </section>
    <!--  sign-in popup end -->
@endsection
@section('required_JS')

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $(".otp").on("input", function() {
      let value = $(this).val();
      if (value.length === 1) {
        $(this).next(".otp").focus();
      } else if (value.length === 0) {
        $(this).prev(".otp").focus();
      }
    });
  });
</script>

<script>
    $(document).ready(function() {
        var sessionData = @json(session()->all());
    var someValue = sessionData.token;
// alert(someValue);
//  $("#mymodel").modal('hide');
$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer '+someValue
                }
            });

$('#send_otp').click(function() {


            var email= $('#email').val();
            var mobile= $('#mobile').val();

            $("#hidden-email").val(email);

            $('#send_otp').html('Send OTP <i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: '{{ route("agent.resendopt") }}',
                type: 'POST',
                data: {
                    'email': email,'mobile':mobile,
                },
                success: function(response) {

              $('#invalidmobile').html('');
              if(response.code === 200){
                    $("#mymodel").modal('show');
                    }
                    if(response.code === 401){
                    $('#invalidmobile').text(response.message);
                    }

                },
                error: function(error) {
                    // console.log(error)



                }

            });
        });
        $('#otp_verity').click(function() {

    var otp = $('#otp1').val();
    var otp2 = $('#otp2').val();
    var otp3 = $('#otp3').val();
    var otp4 = $('#otp4').val();
    var hiddenemail = $('#hidden-email').val();
    var otps  =  otp + '' + otp2 + '' + otp3 + '' + otp4;
// alert

$.ajax({
                    url: '{{ route("agent.otp_verify") }}',
                    type: 'POST',
                    data: {
                        'otp': otps,'email':hiddenemail,
                    },
                    success: function(response) {
                        $('#otpvalid').html('');

                         console.log(response.code)
                        if(response.code === 200){
                            window.location.href = '/agent-panel/dashboard-agents';
                        }
                        if(response.code === 401){

                            $('#otpvalid').text(response.message);
                        }

                    },
                    error: function(error) {
// alert('sadfsgfds');



                    }

                });
        });

    });
</script>
    </body>
    </html>
