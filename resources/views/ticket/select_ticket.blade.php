{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'TICKETS')


@section('required_CSS')

@endsection


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- sign-in popup start -->
    <?php
// dd($request->all());
    ?>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <link rel="stylesheet" href="./assets/styles/Home.css" />
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
            <!-- country flag input cdn -->
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
            />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

            <title>Select Product</title>
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

            <!-- product list start -->
            <section class="container mts-70">
              <div class="d-flex align-items-center pt-4">
                <button
                  id="back-home-btn"
                  class="bg-transparent border rounded-5 border-white"
                >
                  <i class="fa-solid fa-arrow-left text-light"></i>
                </button>
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
                <form>
                  <div class="row form-group">
                    <div class="col-4">
                      <p class="fw-semibold mb-1">Draw Name</p>
                    </div>
                    <div class="col-8">
                      <p class="fw-semibold mb-1">: Weekly Draw #026</p>
                    </div>
                    <div class="col-4">
                      <p class="fw-semibold mb-1">Name</p>
                    </div>
                    <div class="col-8">
                      <p class="fw-semibold mb-1">: Dennis Vargheese</p>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <button
                      class="btn btn-outline-secondary bg-shadow btn-primary text-light px-3 rounded-3 fw-bold ml-n1"
                      type="button"
                      value="sub"
                      onclick="addnewlines('sub')"
                      id="sub_product"
                    >
                      <i class="fa-solid fa-minus"></i>
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
                      id="add_product"
                      {{-- id="add_product" --}}
                      onclick="addnewlines('add')"
                      value="add"

                      {{-- class="btn-style1" --}}
                      {{-- onclick="addnewlines($(' . "'#totallines'" . ').val(), ' . "'add'" . ') --}}
                    >




                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>
                  <div class="row mb-2">
                    <div class="col-9 pe-1">
                      <div class="input-group position-relative">
                        <select
                          class="custom-select form-control fs-5 z-1 rounded-3 text-uppercase input-bg"
                          id="inputGroupSelect01"
                        >
                          <option selected>Select Product</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
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
                      />
                    </div>
                  </div>
                </form>
                <div class="d-flex justify-content-end mt-4">
                  <button
                    class="btn btn-outline-secondary bg-shadow btn-primary text-light px-5 rounded-3 fw-semibold ml-n1"
                    type="button"
                    id="button-addon2"
                    data-bs-toggle="modal"
                    data-bs-target="#ticket-preview-popup"
                    data-bs-whatever="@mdo"
                  >
                    Preview
                  </button>
                </div>
              </div>
            </section>
            <!-- product list end -->

            <!--  select product section start -->
            <section class="container">
              <div class="bg-light p-3 rounded-3">
                <div>
                  <p class="fw-semibold mb-1">View Ticket</p>
                </div>
                <div class="py-4">
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
                            <span class="input-group-text border-0 p-1 input-icon-bg">
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
                            <span class="input-group-text border-0 p-1 input-icon-bg">
                              <i class="fa-regular fa-calendar-days text-secondary"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="col-2 ps-0">
                        <button
                          class="btn w-100 h-100 btn-outline-secondary bg-shadow btn-primary text-light rounded-3 fw-bold ml-n1"
                          type="button"
                          id="button-addon2"
                        >
                          GO
                        </button>
                      </div>
                    </div>
                  </form>
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
                      id="inputPassword"
                    />
                  </div>
                </div>
                <!-- table -->
                <div>
                  <table
                    class="table text-center table-bordered text-uppercase align-items-center fw-semibold"
                  >
                    <thead>
                      <tr>
                        <th scope="col">Ticket ID</th>
                        <th scope="col">Mob Number</th>
                        <th scope="col">Amount (AED)</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
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
                        <th scope="row">2</th>
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
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>Thornton</td>
                        <td class="d-flex align-items-center justify-content-evenly">
                          <i
                            class="fa-regular fa-file-lines fw-semibold text-secondary"
                          ></i>
                          <i class="fa-regular fa-paste fw-semibold text-info"></i>
                          <i class="fa-brands fa-whatsapp fw-semibold text-info"></i>
                        </td>
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

            <!-- product selection preview popup start  -->
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
                            <td class="text-center p-0">Dennis Vargheese</td>
                            <td class="text-center p-0">971552135246</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <h2 class="fs-5 text-center mt-4 mb-2">Weekly Draw #026</h2>
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
                            <td class="text-center p-0">09 Feb 2023</td>
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
                    <h2 class="fs-5 mb-2">4</h2>
                    <div class="ticket-preview-bordered-table">
                      <table class="table table-borderless mb-0">
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
                        <tbody>
                          <tr>
                            <td class="text-center p-0">AED10.0</td>
                            <td class="text-center p-0">1</td>
                            <td class="text-center p-0">800</td>
                          </tr>
                          <tr>
                            <td class="text-center p-0">AED20.0</td>
                            <td class="text-center p-0">1</td>
                            <td class="text-center p-0">800</td>
                          </tr>
                          <tr>
                            <td class="text-center p-0">AED50.0</td>
                            <td class="text-center p-0">1</td>
                            <td class="text-center p-0">800</td>
                          </tr>
                          <tr>
                            <td class="text-center p-0">AED100.0</td>
                            <td class="text-center p-0">1</td>
                            <td class="text-center p-0">800</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="py-4 text-center">
                      <p class="mb-0">Rolling Ball Draw Date: 13 Feb 2023</p>
                      <p class="mb-0">Raffle Draw Date: 13 Feb 2023</p>
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
                      data-bs-toggle="modal"
                      data-bs-target="#ticket-success"
                      data-bs-whatever="@mdo"
                    >
                      Confirm
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- product selection preview popup end  -->

            <!-- ticket create success popup start -->
            <div
              class="modal fade"
              id="ticket-success"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 pt-4 px-4 pb-0">
                    <h1 class="modal-title fs-2 fw-bold" id="exampleModalLabel">
                      Success
                    </h1>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body px-4 pt-0">
                    <p class="fs-4">The created ticket has been sent.</p>
                    <div class="text-center">
                      <img
                        class="h-50 w-50"
                        src="./assets/images/confirmation.png"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="modal-footer border-0 pt-3 p-4">
                    <button
                      type="button"
                      class="btn btn-danger fs-3 fw-semibold px-4"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ticket create success popup end -->

            <!-- ticket create error popup start -->
            <div
              class="modal fade"
              id="ticket-sent-error-alert"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 pt-4 px-4 pb-0">
                    <h1 class="modal-title fs-2 fw-bold" id="exampleModalLabel">
                      Error!
                    </h1>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>

                  <div class="modal-body px-4 pt-0">
                    <p class="fs-4">
                      Ticket has not been sent due to some unexpected issue
                    </p>
                    <div class="text-center">
                      <img
                        class="w-50"
                        src="./assets/images/ticket-error-img.png"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="modal-footer border-0 pt-0 p-4 popup-action-btn">
                    <button type="button" class="btn btn-danger fs-3 fw-semibold px-4">
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ticket create error popup end -->

            <!-- ticket create duplicate popup start -->
            <div
              class="modal fade"
              id="ticket-duplicate-error-alert"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 pt-5 px-5 pb-0">
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>

                  <div class="modal-body px-5 pt-0">
                    <h1
                      class="modal-title fs-2 fw-bold text-danger mb-1"
                      id="exampleModalLabel"
                    >
                      Duplicate Ticket Alert!
                    </h1>
                    <p class="fs-4">
                      Same ticket has been issued recently, would you still like to
                      continue with the same?
                    </p>
                  </div>
                  <div
                    class="modal-footer border-0 pt-0 px-4 pb-5 justify-content-center"
                  >
                    <button type="button" class="btn btn-danger fs-3 fw-semibold px-5">
                      No
                    </button>
                    <button type="button" class="btn btn-success fs-3 fw-semibold px-5">
                      Yes
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ticket create duplicate popup end -->

            <!-- ticket create insuffiicent popup start -->
            <div
              class="modal fade"
              id="ticket-insufficient-alert"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 pt-5 px-5 pb-0"></div>

                  <div class="modal-body px-5 pt-0 pb-0">
                    <h1
                      class="modal-title fs-2 fw-bold text-danger mb-1 text-center"
                      id="exampleModalLabel"
                    >
                      Insufficient Cash/Bonus Points!
                    </h1>
                    <p class="fs-4 text-center">
                      Kindly load your wallet to issue the ticket.
                    </p>
                  </div>
                  <div
                    class="modal-footer border-0 pt-0 px-4 pb-5 justify-content-center"
                  >
                    <button
                      type="button"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                      class="btn btn-success fs-3 fw-semibold px-5"
                    >
                      Ok
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ticket create insuffiicent popup end -->

            <!-- ticket create network error popup start -->
            <div
              class="modal fade"
              id="ticket-network-error-alert"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header border-0 pt-5 px-5 pb-0"></div>

                  <div class="modal-body px-5 pt-0 pb-0">
                    <h1
                      class="modal-title fs-2 fw-bold text-danger mb-1 text-center"
                      id="exampleModalLabel"
                    >
                      Network Error!
                    </h1>
                    <p class="fs-4 text-center">Please try again</p>
                  </div>
                  <div
                    class="modal-footer border-0 pt-0 px-4 pb-5 justify-content-center"
                  >
                    <button
                      type="button"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                      class="btn btn-success fs-3 fw-semibold px-5"
                    >
                      Ok
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ticket create network error popup end -->

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
            <script src="./assets/js/index.js"></script>
            <!-- all script links end -->
          </body>
        </html>

    </section>
    <!--  sign-in popup end -->
@endsection




@section('required_JS')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
});
    // $(document).ready(function() {

// $("#add_product").click(function() {
// alert('sadsfd');

function addnewlines(txt) {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    var count = $('#add_sub').val();
    // var sub = $('#sub_product').val();
    // alert(add_sub)
// $i=1;
    var num = +$("#add_sub").val() + 1;
    alert(num)
    $.ajax({
                url: "{{route('customer.add_product')}}",
                type: "POST",
                data: {
                    txt: txt,'count':count,

                },
                dataType: 'json',
                success: function (result) {
console.log(result);
                }
            });
        }





</script>













@endsection
