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
            <link rel="stylesheet" href="{{ asset('css/print.css') }}" media="print">
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
            <section class="container mts-70">
              <div class="d-flex align-items-center pt-4">
                <a class="btn btn-info" href="{{ URL::previous() }}"><button
                  id="back-home-btn"
                  class="bg-transparent border rounded-5 border-white"
                >
                  <i class="fa-solid fa-arrow-left text-light"></i>
                </button></a>
                <p class="fs-2 fw-semibold text-white m-0 ps-3">Tickets</p>
              </div>
              <div class="">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white">
                      <a href="#" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item text-white active" aria-current="page">
                      Tickets
                    </li>
                  </ol>
                </nav>
              </div>
            </section>

            <section class="container">
              <div class="p-4 bg-light my-4 rounded-3">
                <p class="fw-semibold mb-1">Search Existing Customer</p>
                <div class="input-group mb-3">


                  <input
                    type="text"
                    class="form-control text-secondary input-bg"
                    placeholder="Enter Mobile Number"
                    aria-label="Recipient's username"
                    aria-describedby="button-addon2"
                    name="mobile" id="mobile"
                  />

                  <button class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-bold ml-n1"
                  type="text" name="go_button" value="" id="go_button">GO</button>


                </div>
                <p class="fw-semibold mb-1" style="color:red;" id="error_message"></p>

                    <div  class="p-4 bg-light my-4 rounded-3" id="hidden_div" >

                        <div class="row form-group" >
                          <div class="col-4">
                            <p class="fw-semibold mb-1">Draw Name :</p>
                          </div>
                          <div class="col-8">
                            <p class="fw-semibold mb-1" id="draw_name"></p>
                          </div>
                          <div class="col-4">
                            <p class="fw-semibold mb-1">Name :</p>
                          </div>
                          <div class="col-8">
                            <p class="fw-semibold mb-1" id="customer_name">:</p>
                          </div>
                        </div>
                        <div class="input-group mb-3" type="hidden" >
                          <button
                            class="btn btn-outline-secondary bg-shadow btn-primary text-light px-3 rounded-3 fw-bold ml-n1 delete_row"
                            type="button"
                            value="sub"

                            id="sub_product"
                            {{-- class="btn btn-outline-danger delete_row" --}}
                          >
                            <span class="delete_row" id="delete_row"><i class="fa-solid fa-minus "></i></span>
                          </button>
                          <?php
      $i=1;

      ?>
                          <input
                            type="text"
                            class="form-control text-secondary mx-2 rounded-2 text-center input-bg"
                            {{-- placeholder="" --}}
                            value=<?php print_r($i) ?>

                            {{-- aria-label="Recipient's username" --}}
                            aria-describedby="button-addon2"
                            id="add_sub"
                          readonly/>
                          <button
                            class="btn btn-outline-secondary bg-shadow btn-primary text-light px-3 rounded-3 fw-bold ml-n1"
                            type="button"
                            id="add_row" class="add"
                            {{-- id="add_product" --}}

                            value="add"

                            {{-- class="btn-style1" --}}
                            {{-- onclick="addnewlines($(' . "'#totallines'" . ').val(), ' . "'add'" . ') --}}
                          >




                            <i class="fa-solid fa-plus" id="add_row" class="add"></i>
                          </button>
                        </div>
                        <div class="row mb-2" id="add_table">
                          <div class="col-9 pe-1">
                            <div class="input-group position-relative">
                                <input type="hidden" id="customerid">
                              <select
                                class="custom-select form-control fs-5 z-1 rounded-3 text-uppercase input-bg"
                                id="inputGroupSelect01"
                                name="product_id"
                              >
                                <option value="" selected>Select Product</option>
                                <option value="1">ADE 10</option>
                                <option value="2">ADE 20</option>
                                <option value="3">ADE 50</option>
                                <option value="4">ADE 100</option>
                              </select>

                              <div
                                class="position-absolute top-50 end-0 translate-middle-y pe-2 z-3"
                              >
                                <i class="fa-solid fs-5 fa-chevron-down"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-3 ps-0">
                            <input
                              type="text"
                              class="form-control mx-2 rounded-2 text-center w-100 h-100 input-bg"
                              placeholder="817"
                              aria-label="Recipient's username"
                              aria-describedby="button-addon2"
                              name="my3number"
                              id="my3number"
                            />
                          </div>
                        </div>
                        <div id="table-append">

                        </div>
                       <p style="color:red;" id="error_my3number"></p>
                       <p style="color:red;" id="error_product_id"></p>
                        <p style="color:red;" id="12_numvalidation"></p>
                        <p style="color:red;" id="low_points"></p>
                        <p style="color:red;" id="blocked"></p>
                        <div class="d-flex justify-content-end mt-4">
                            <button
                              class="btn btn-outline-secondary bg-shadow btn-primary text-light px-5 rounded-3 fw-semibold ml-n1"
                              type="button"
                              id="preview_id"
                              {{-- data-bs-toggle="modal"
                              data-bs-target="#ticket-preview-popup"
                              data-bs-whatever="@mdo" --}}
                            >
                              Preview
                            </button>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                  <button
                    class="btn btn-outline-secondary d-flex align-items-center btn-primary text-light px-4 rounded-3 fw-semibold ml-n1"
                    type="button"

                    data-bs-toggle="modal"
                    data-bs-target="#create-customer"
                    data-bs-whatever="@mdo-create-customer"
                  >
                    <i class="fa-solid fa-user-plus me-2"></i>
                    New Customer
                  </button>
                </div>

            </section>
            <!-- search existing customer end -->

            <!--  select product section start -->
            <section class="container">
              <div class="bg-light p-3 rounded-3">
                <div>
                  <p class="fw-semibold mb-0">View Ticket</p>
                </div>

                <div class="pb-4 pt-2">
                  {{-- <form> --}}
                    <div class="row date-picker-group form-group">
                      <div class="col-5">
                        <div class="input-group date position-relative" >
                          <input
                            type="date"
                            placeholder="mm/dd/yyyy"
                            class="form-control"
                            id="from_date"
                          />
                          <span
                            class="input-group-append position-absolute top-50 end-0 translate-middle-y pe-1 z-3"
                          >
                            <span class="input-group-text border-0 p-1 input-icon-bg">
                              <i class="fa-regular fa-calendar-days text-secondary"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="col-5 ps-0">
                        <div
                          class="input-group date position-relative"

                        >
                          <input
                             type="date"
                            placeholder="mm/dd/yyyy"
                            class="form-control"
                            id="to_date"
                          />
                          <span
                            class="input-group-append position-absolute top-50 end-0 translate-middle-y pe-1 z-3"
                          >
                            <span class="input-group-text border-0 p-1 input-icon-bg">
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
                  {{-- </form> --}}
                </div>

                <div class="mb-3 row">
                  <label for="inputPassword" class="col-2 fw-semibold col-form-label"
                    >Search</label
                  >
                  <div class="col-10">
                    <input
                      type="text"
                      placeholder="Enter Mobile Number / E-mail ID"
                      class="form-control input-bg"
                      id="status"
                    />
                  </div>
                </div>
                <!-- table -->
                <div>
                  <table
                    class="table text-center table-bordered text-uppercase align-items-center fw-semibold table-striped example"
                    {{-- new DataTable('#example'); --}}
                    {{-- id="example" --}}
                  >
                    <thead>
                      <tr>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email </th>
                        <th scope="col">Amount (AED)</th>
                        <th scope="col">My3number</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="table_body">
                      {{-- <tr>
                        <th class="position-relative" scope="row">
                          1
                        </th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td class="d-flex align-items-center justify-content-evenly">
                          <i
                            class="fa-regular fa-file-lines fw-semibold text-secondary"
                          ></i>
                          <i class="fa-regular fa-paste fw-semibold text-info"></i>
                          <i class="fa-brands fa-whatsapp fw-semibold text-info"></i>
                        </td>
                      </tr>
                      <tr>
                        <th class="position-relative" scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td class="d-flex align-items-center justify-content-evenly">
                          <i
                            class="fa-regular fa-file-lines fw-semibold text-secondary"
                          ></i>
                          <i class="fa-regular fa-paste fw-semibold text-info"></i>
                          <i class="fa-brands fa-whatsapp fw-semibold text-info"></i>
                        </td>
                      </tr>
                      <tr>
                        <th class="position-relative" scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>Thornton</td>
                        <td class="d-flex align-items-center justify-content-evenly">
                          <i
                            class="fa-regular fa-file-lines fw-semibold text-secondary"
                          ></i>
                          <i class="fa-regular fa-paste fw-semibold text-info"></i>
                          <i class="fa-brands fa-whatsapp fw-semibold text-info"></i>
                        </td>
                      </tr> --}}
                    </tbody>
                  </table>
                </div>
                {{-- <div class="text-center">
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
                </div> --}}

           <br>
           <br>

              </div>
            </section>



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
                    <p style="color:red;" id="error_nameemail"></p>
                    {{-- <form> --}}

                        @csrf
                        <p style="color:red;" id="error_namemobile"></p>

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
                        <select
                          class="custom-select form-control fs-5 text-secondary rounded-end-3 wt-input-bg"
                          id="country" name="country_id"
                        >
                        <option value="">-- Select Country --</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" name="country" > {{ $country->name }}</option>
                        @endforeach

                        </select>
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
                        <option value="">-- Select State --</option>
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
                        <option value="">-- Select City --</option>
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


                    <a href="/agent-ticket/index"> <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      {{-- aria-label="Close" --}}

                    ></button></a>
                  </div>
                  <div>

                        </div>

                        <div id="hidden-h1">
                        <input type="hidden" id="hidden-email">

                  <div class="modal-body px-4 pt-0" id="mydodel">
                    <p  class="fs-4 text-center" id="text_hide">Pls Enter Your four digit Otp.</p>
                    <p style="color:green;" id="sucess-message"></p>

                    <div class="row">
                        <div class=" col-md-10 text-center my-2 otp-box justify-content-around m-auto text-center d-flex ">
                            <input type="text" class="otp" type="text box" id="otp1" maxlength="1">
                            <input type="text" class="otp" type="text box" id="otp2" maxlength="1">
                            <input type="text" class="otp" type="text box" id="otp3" maxlength="1">
                            <input type="text" class="otp" type="text box" id="otp4" maxlength="1">
                        </div>
                    </div>
                    <p style="color:red;" id="error-otpvalid"></p>
                    <p style="color:red;" class="fs-5"  id="error-message"></p>
                    {{-- <div class="text-center">
                      <img
                        class="h-50 w-50"
                        src="./assets/images/confirmation.png"
                        alt=""
                      />
                    </div> --}}
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
                          <th scope="col" class="text-uppercase text-center p-0">
                            Customer Id
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          {{-- <td class="text-center p-0">Dennis Vargheese</td> --}}
                          <td class="text-center p-0"><p class="fw-semibold mb-1" id="customer_names">:</p></td>
                          <td class="text-center p-0"><p class="fw-semibold mb-1" id="customer_mobile">:</p></td>
                          <td class="text-center p-0"><p class="fw-semibold mb-1" id="customer_id">:</p></td>
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
//   new DataTable('#example');


    var sessionData = @json(session()->all());
    var someValue = sessionData.token;

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer '+someValue
                }
            });



var tableBody = $('.example').DataTable();

$('#button-addon2').click(function() {

    tableBody.clear().draw();
    var from_date=  $('#from_date').val();
    var to_date=  $('#to_date').val();
    var status=  $('#status').val();
    // alert(status);
    // var tableBody = $('.example').DataTable();

    tableBody.clear().draw();
$.ajax({
    url: '{{ route("agent.ticketfilter") }}',
    type: 'POST',
    data: {
     'from_date':from_date,'to_date':to_date,'status':status,
    },

    success: function(response) {

        // $(".example").empty();

        // $('#tableBody').empty();
        if (response.code === 200) {

            if (response.data.data) {

                var tickets = response.data.data;

                $.each(tickets, function(index, value) {

                    var newRow = '<tr>' +

                        '<td>'  + value.ticket_id + '</td>' +
                        '<td>' + value.name + '</td>' +
                        '<td>' + value.mobile + '</td>' +
                        '<td>' + value.email + '</td>' +
                        '<td>'+ value.rate +'</td>' +
                        '<td>'+ value.my3number +'</td>' +
                        '<td>' +'<i class="fa-regular fa-file-lines fw-semibold text-secondary one-detail" data-customer-id="'+ value.raffle_id + '"></i>' +' '+
                            '<i class="fa-regular fa-paste fw-semibold text-info detailed-invoice" data-customer-id="'+ value.transaction_id + '"></i>'+' '+
                            '<a target="_blank" href="https://api.whatsapp.com/send?phone=971543688978&amp;text=https://www.littledraw.ae/ticket-view/AT1564c906a9cfa7a" class="btn text-secondary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="View Tickets"></a><i class="fa-brands fa-whatsapp fw-semibold text-info" data-customer-id="'+ value.id + '"></i>'
                            + '</td>' +
                    '</tr>';
                    tableBody.row.add($(newRow)).draw();

                });
            }
        } else if (response.code === 401) {
            $('#error_message').text('');
            if (response.status) {
                $('#error_message').text(response.status);
            }
        }
    },

    error: function(error) {
    }
});

});




$.ajax({
    url: '{{ route("agent.ticket_list") }}',
    type: 'POST',
    data: {},

    success: function(response) {
        // console.log(response)
        if (response.code === 200) {
            if (response.data.tickets) {

                var tickets = response.data.tickets;

                $.each(tickets, function(index, value) {

                    var newRow = '<tr>' +
                        '<td>'  + value.ticket_id + '</td>' +
                        '<td>' + value.name + '</td>' +
                        '<td>' + value.mobile + '</td>' +
                        '<td>' + value.email + '</td>' +
                        '<td>'+ value.rate +'</td>' +
                        '<td>'+ value.my3number +'</td>' +
                        '<td>' +'<i class="fa-regular fa-file-lines fw-semibold text-secondary one-detail" data-customer-id="'+ value.raffle_id + '"></i>' +' '+
                            '<i class="fa-regular fa-paste fw-semibold text-info detailed-invoice" data-customer-id="'+ value.transaction_id + '"></i>'+' '+
                            '<a target="_blank" href="https://api.whatsapp.com/send?phone=971543688978&amp;text=https://www.littledraw.ae/ticket-view/AT1564c906a9cfa7a" class="btn text-secondary btn-sm" data-bs-toggle="tooltip" data-bs-original-title="View Tickets"></a><i class="fa-brands fa-whatsapp fw-semibold text-info" data-customer-id="'+ value.id + '"></i>'
                            + '</td>' +
                    '</tr>';
                    tableBody.row.add($(newRow)).draw();
                });
            }
        } else if (response.code === 401) {
            $('#error_message').text('');
            if (response.status) {
                $('#error_message').text(response.status);
            }
        }
    },

    error: function(error) {
    }
});
$(document).on('click', '.one-detail', function() {
        var single_id = $(this).data('customer-id');
        // // alert(customerId);
        window.location.href = '/customerorder/' + single_id ;
        // window.print();

      });
      $(document).on('click', '.detailed-invoice', function() {
        var invoice_id = $(this).data('customer-id');
        // // alert(customerId);
        window.location.href = '/customerorder/' + invoice_id ;
        // window.print();

      });

});
        $(document).ready(function() {


            $('#new_customer').click(function() {
                // class="iti__selected-dial-code"
                var dial=  $('.iti__selected-dial-code').text();
               var name = $('#name').val();
               var phone = $('#phone').val();
               var email = $('#email').val();
               var building_name = $('#building_name').val();
               var country = $('#country').val();
               var state = $('#state').val();
               var city = $('#city').val();


               $("#hidden-email").val(email);



                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
                });
                $('#new_customer').html('Create Customer <i class="fa fa-spinner fa-spin"></i>');
                $.ajax({
                    url: '{{ route("agent.newcustomer") }}',
                    type: 'POST',
                    data: {
                        'name': name,'mobile': phone,'email': email,'building_name':building_name,'country':country,'state':state,'city':city,'dialCode':dial,
                    },
                    success: function(response) {

                        // alert('1')
                        // console.log(response.message);
                        if(response.code === 200){
                            $("#create-customer").modal('hide');
                            $("#mymodel").modal('show');

                        }
                        // if(response.code === 401){

                        // $('#error_name').text(response.message);
                        // }
                    },
                    error: function(error) {

                    $('#error_name').text('');
                    $('#error_phone').text('');
                    $('#error_email').text('');
                    $('#error_buildingname').text('');


                        console.log(error.responseJSON.message.building_name)

                        if(error.responseJSON.message.name){
                            $("#error_name").text(error.responseJSON.message.name);
                        }
                        if(error.responseJSON.message.mobile){
                            $("#error_phone").text(error.responseJSON.message.mobile);
                        }
                        if(error.responseJSON.message.email){
                            $("#error_email").text(error.responseJSON.message.email);
                        }
                        if(error.responseJSON.message.building_name){
                            $("#error_buildingname").text(error.responseJSON.message.building_name);
                        }



                    }
                });

            });

$('#otp_verity').click(function() {

    var otp = $('#otp1').val();
    var otp2 = $('#otp2').val();
    var otp3 = $('#otp3').val();
    var otp4 = $('#otp4').val();
    var hiddenemail = $('#hidden-email').val();
// alert(hiddenemail);
    var otps  =  otp + '' + otp2 + '' + otp3 + '' + otp4;
    // alert(my_res);
    $.ajax({
                    url: '{{ route("customer.new_customer_otpverify") }}',
                    type: 'POST',
                    data: {
                        'otp': otps,'email':hiddenemail,
                    },
                    success: function(response) {
// alert('sdfsfs');
console.log(response)
// alert('1')
                        if(response.code === 200){
                            window.location.href = '/customer/index';
                            // $('#error-message').text('');

                            // $("#close_model").hide(),
                            // $("#otp_verity").hide(),
                            // $("#text_hide").hide(),

                            // $('#sucess-message').text('New Customer Created successfuly!');
                                                        // $("#hidden-h1").modal('show');

                        }
                        if(response.code === 401){
                            if(response.data.user){

                       $('#error-otpvalid').text(response.data.user);
                            }


             }

                    },
                    error: function(error) {

                         $('#error-message').text('');

                    if(error.responseJSON.message.otp){
                        $('#error-message').text(error.responseJSON.message.otp);

                    }



                    }

                });
// alert(otp);alert(otp2);
// alert(otp3);alert(otp4);
            });
        });



        </script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#country').on('change', function () {

            var idCountry = this.value;
            // alert(idCountry);
            $("#state").html('');
            $.ajax({
                url: "{{route('customer.states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                },
                dataType: 'json',
                success: function (result) {
                    // console.log(result);
                    $('#state').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#city').html('<option value="">-- Select City --</option>');
                }
            });

        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#state').on('change', function () {
            var idState = this.value;
            // alert(idState);
            $("#city").html('');
            $.ajax({
                url: "{{route('customer.cities')}}",
                type: "POST",
                data: {
                    state_id: idState,

                },
                dataType: 'json',
                success: function (res) {
                    $('#city').html('<option value="">-- Select City --</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
    $(document).ready(function() {
        $('#hidden_div').hide();
    $('#go_button').click(function() {
        var customer_mobnum = $('#mobile').val();
        // alert(customer_mobnum);

        $.ajax({
                    url: '{{ route("customer.mobilefilter") }}',
                    type: 'POST',
                    data: {
                        'customer_mobnum': customer_mobnum,
                    },
                    success: function(response) {
            // alert('sdfsfs');
            console.log(response.data.customer.id)
            $('#customerid').text(response.data.customer.id);
            if(response.code === 200){
                $('#hidden_div').show();
                $('#error_message').hide();
                $('#customer_name').html();
                $('#draw_name').html();

                if(response.data.customer){

                    $('#customer_name').text(response.data.customer.name);
                    // $('#customerid').text(response.data.customer.id);
                    $("#customerid").val(response.data.customer.id);

            }
            if(response.data.customer.draw_id){
                    $('#draw_name').text(response.data.customer.draw_id);


            }
            }
            if(response.code === 401){
                $('#hidden_div').hide();
                // console.log(response.code)
                $('#error_message').html();
                if(response.data){
                    $('#error_message').text(response.data);
            }
        }



                    },
                    error: function(error) {

                    }

                });
    });


});

</script>
<script>
    $(document).ready(function() {
        var randomNum1 = Math.floor(Math.random() * 900) + 100;
        $("#my3number").val(randomNum1);
$('#add_row').click(function() {
    var randomNum = Math.floor(Math.random() * 900) + 100;
  //Add row
  row = '';
  var newRow = `
      <tr id="remove_tr">
        <td>
            <div class="row mb-2" id="add_table">
                          <div class="col-9 pe-1">
                            <div class="input-group position-relative">
                              <select
                                class="custom-select form-control fs-5 z-1 rounded-3 text-uppercase input-bg"
                                id="inputGroupSelect01"
                                name="product_id"
                              >
                                <option selected>Select Product</option>
                                <option value="1">ADE 10</option>
                                <option value="2">ADE 20</option>
                                <option value="3">ADE 50</option>
                                <option value="4">ADE 100</option>
                              </select>
                              <div
                                class="position-absolute top-50 end-0 translate-middle-y pe-2 z-3"
                              >
                                <i class="fa-solid fs-5 fa-chevron-down"></i>
                              </div>
                            </div>
                          </div>
                          <div class="col-3 ps-0">
                            <input
                              type="text"
                              class="form-control mx-2 rounded-2 text-center w-100 h-100 input-bg"
                              placeholder="817"
                              aria-label="Recipient's username"
                              aria-describedby="button-addon2"
                              name="my3number"
                              value="${randomNum}"
                            />
                          </div>
                        </div>
        </td>
      </tr>
    `;
//   row += '<td><button class="btn btn-outline-danger delete_row">remove</button></td></tr>';
  $("#table-append").append(newRow);
})

$(document).on('click', '.delete_row', function() {

    $('#remove_tr').closest('tr').remove();
  });

});



$(document).ready(function() {


  $("#preview_id").on("click", function() {


    // var inputArray = [];

    var selectedValues=[];
    var selectedmy3number=[];

    var customerid = $('#customerid').val();
// alert(customerid);

    $('select[name="product_id"]').each(function() {
            var selectedValue = $(this).val();
            selectedValues.push(selectedValue);
        });

        $('input[name="my3number"]').each(function() {
            var selectedValue = $(this).val();
            selectedmy3number.push(selectedValue);
        });

        var products = [];

        for (var i = 0; i < selectedValues.length; i++) {
            var product = {
                "product_id": selectedValues[i],
                "my3number": selectedmy3number[i]
            };
            products.push(product);
        }

        var jsonObject = {
            "customer_id": customer_id,
            "products": products

        };

        $.ajax({
                url: '{{ route("customer.ticket_preview") }}',
                type: 'POST',
                data: {
                    'products':products,
                    'customer_id':customerid,
                },
                success: function(response) {
            //  console.log(response.data.customer_name)
                    $('#12_numvalidation').html('');
                    $('#low_points').html('');
                    $('#tablebody').html('');

                    var tableBody = $('#valueTable tbody');
                if(response.code === 401){

                if(response.data['12_product'] != undefined){
                    $('#12_numvalidation').text(response.data['12_product']);
                }
                if(response.data['low_point'] !=undefined){

                    $('#low_points').text(response.data['low_point']);
                }
                if(response.data['blocked'] !=undefined){

                $('#blocked').text(response.data['blocked']);
                }
             }
             if(response.code === 200){

                $("#ticket-preview-popup").modal('show');


                var datas=response.data['products'];
                if(datas){
                $.each(datas, function(index, value) {
                    var newRow = '<tr><td>' + value.prod_name + '</td><td>' + 1 + '</td><td>' + value.my3number +  '</td></tr>';
                    tableBody.append(newRow);



                });
            }
            if(response.data.customer_mobile){
                $('#customer_mobile').text(response.data.customer_mobile);

            }
            if(response.data.customer_name){
                $('#customer_names').text(response.data.customer_name);
                $('#customerid').text(response.data.customer_id);

            }
            if(response.data.ticket_lines){
                $('#ticket_lines').text(response.data.ticket_lines);
            }
            if(response.data.draw){
                $('#draw').text(response.data.draw);
            }
            if(response.data.cur_date){
                $('#cur_date').text(response.data.cur_date);
            }
            if(response.data.resultdate){
                $('#resultdate').text(response.data.resultdate);
            }
            if(response.data.raffle){
                $('#raffle').text(response.data.raffle);
            }
             }

                },
                error: function(error) {

                    $('#error_my3number').html('');
                    $('#error_product_id').html('');

                    if(error.responseJSON.message['my3number'] !=undefined){
                        $('#error_my3number').text(error.responseJSON.message['my3number']);
                    }
                    if(error.responseJSON.message['product_id'] !=undefined){
                        $('#error_product_id').text(error.responseJSON.message['product_id']);
                    }
                }
            });
  });
  $("#ticket-success").on("click", function() {
    var selectedValues=[];
    var selectedmy3number=[];

    // $('#ticket-sucess').html('Confirm <i class="fa fa-spinner fa-spin"></i>');

    var customer_id = $('#customerid').val();
// alert(customer_id);
    $('select[name="product_id"]').each(function() {
            var selectedValue = $(this).val();
            selectedValues.push(selectedValue);
        });

        $('input[name="my3number"]').each(function() {
            var selectedValue = $(this).val();
            selectedmy3number.push(selectedValue);
        });

        var products = [];

        for (var i = 0; i < selectedValues.length; i++) {
            var product = {
                "product_id": selectedValues[i],
                "my3number": selectedmy3number[i]
            };
            products.push(product);
        }
        // console.log(products);
        var jsonObject = {
            "customer_id": customer_id,
            "products": products

        };
        $('#ticket-success').html('Confirm <i class="fa fa-spinner fa-spin"></i>');
    $.ajax({
                url: '{{ route("ticket.booking") }}',
                type: 'POST',
                data: {
                    'products':products,
                    'customer_id':customer_id,
                },

                success: function(response) {

             if(response.code === 200){
                // $('#booking_sucess').text(response.data.message);
                window.location.href = '/agent-ticket/index';
             }

                },
                error: function(error) {

                }
            });

});
});

$(document).ready(function() {
//   new DataTable('#example');
// $('#mobile').on('input', function() {
//     var mobile_filter = $('#mobile').val();

// $.ajax({
//                 url: '{{ route("agent.customer_autofilter") }}',
//                 type: 'POST',
//                 data: {
//                     'email_mobile':mobile_filter,

//                 },

//                 success: function(response) {
//                console.log(response);
//              if(response.code === 200){
//                 var datas=response.data.customers;
//                 $.each(datas, function(index, value) {



//                 });

//              }

//                 },
//                 error: function(error) {

//                 }
//             });
// });
});

    </script>
    </body>
    </html>
