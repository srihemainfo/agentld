{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Customer')


@section('required_CSS')

@endsection


@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- sign-in popup start -->
    <?php
// dd($countries);
    ?>
    <section class="container paper-container mts-70">

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

    <title>Customer Profile</title>
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
                  href="#"
                  id="profile-sign-out-btn"
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

    <!-- product list start -->
    <section class="container mts-70">
      <div class="d-flex align-items-center pt-4">
        <a class="btn btn-info" href="{{ URL::previous() }}"> <button
          id="back-home-btn"
          class="bg-transparent border rounded-5 border-white"

        >
          <i class="fa-solid fa-arrow-left text-light"></i>
        </button></a>
        <p class="fs-2 fw-semibold text-white m-0 ps-3">Customer Profile</p>
      </div>
      <div class="">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item text-white">
              <a href="index.html" class="text-white text-decoration-none"
                >Home</a
              >
            </li>
            {{-- <li class="breadcrumb-item text-white active" aria-current="page">
              Customer
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Profile
            </li> --}}
          </ol>
        </nav>
      </div>
    </section>
    <!-- profile section start -->
    <section class="container">
      <div class="p-4 bg-light my-4 rounded-3">
        <p class="fs-4 text-secondary text-left m-0 fw-semibold">My Profile</p>
        <hr class="hr" />
        <div class="text-center">
          <a href="#" class="profile-avatar">
            <img src="assets/images/bg-img.webp" alt="Avatar" />
          </a>
          <p class="fs-4 text-secondary text-left m-0 mt-2 fw-semibold">
            Little Draw
          </p>
          <p class="fs-5 text-secondary text-left m-0 lh-sm fw-normal">
            ID: {{ Route::current()->parameter('customerId') }}
            <input type="hidden" value="{{ Route::current()->parameter('customerId') }}" />
          </p>
          <p class="fs-5 text-secondary text-left m-0 lh-sm fw-normal">
            Balance: 12655
          </p>
          <p class="fs-5 text-secondary text-left m-0 lh-sm fw-normal">
            Last Login: 22 -11-08 13:14:47
          </p>
        </div>
        <div class="mt-4">
          <table
            class="table text-secondary table-bordered text-uppercase fw-normal"
          >
            <tbody class="profile-table">
              <tr>
                <td>
                  <span class="profile-icon-bg">
                    <i class="fa-regular text-secondary fa-envelope"></i>
                  </span>
                  <p
                    class="fs-6 text-secondary text-left m-0 lh-sm fw-semibold"
                  >
                    email@gmail.com
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="profile-icon-bg">
                    <i class="fa-regular text-secondary fa-address-card"></i>
                  </span>
                  <p
                    class="fs-6 text-secondary text-left m-0 lh-sm fw-semibold"
                  >
                    465465464654
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <span class="profile-icon-bg">
                    <i class="fa-solid text-secondary fa-phone"></i>
                  </span>
                  <p
                    class="fs-6 text-secondary text-left m-0 lh-sm fw-semibold"
                  >
                    01513454546
                  </p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- profile section end -->

    <!-- edit profile section start -->
    <section class="container">
      <div class="p-4 bg-light my-4 rounded-3">
        {{-- <form> --}}
          <p class="fs-4 text-secondary text-left m-0 fw-semibold">
            Edit Profile
          </p>
          {{-- <p>Customer ID: {{ Route::current()->parameter('customerId') }}</p> --}}

          <input type="hidden" value="{{ Route::current()->parameter('customerId') }}" id="customer_id" ?>
          <hr class="hr mb-4" />
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3" >
              Full Name (As per Passport / ID)
            </p>
            <textarea type="text"
            {{-- class="form-control fs-4 text-secondary input-bg" --}}
            class="form-control fs-4 input-bg"
            aria-label="Username"
            aria-describedby="basic-addon1"
            id="name">

           </textarea>
          </div>
          <div class="input-group mb-3">
            <p class="fs-4 text-secondary text-left m-0">Mobile Number</p>
            <!-- id="phone" -->
            <textarea
              type="tel"
              name="phone"
              class="form-control rounded-2 fs-4 text-secondary input-bg w-100 telephone-input"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="mobile">
            </textarea>
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Email ID</p>
            <textarea
              type="text"
              class="form-control fs-4 text-secondary input-bg"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="email"
            ></textarea
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Building Name</p>
            <textarea
              type="text"
              class="form-control fs-4 text-secondary input-bg"
              {{-- placeholder="Labour Community Market" --}}
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="building_name"
            ></textarea>
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Country</p>
            <div class="position-relative">
                <select
                class="custom-select form-control fs-5 text-secondary rounded-end-3 wt-input-bg"
                id="country" name="country_id"
              >
              <option value="">-- Select Country --</option>
              @foreach ($countries as $country)
              <option value="{{ $country->id }}" name="country" > {{ $country->name }}</option>
              @endforeach

              </select>
              <div
                class="position-absolute top-50 end-0 translate-middle-y pe-3"
              >
                <i class="fa-solid fs-5 fa-chevron-down z-1 text-secondary"></i>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">
              State / Emirates
            </p>
            <div class="position-relative">
                <select
                class="custom-select form-control fs-5 text-secondary rounded-end-3 wt-input-bg"
                id="state"
              >
              <option value="">-- Select State --</option>
              </select>
              <div
                class="position-absolute top-50 end-0 translate-middle-y pe-3"
              >
                <i class="fa-solid fs-5 fa-chevron-down z-1 text-secondary"></i>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">
              Area / District
            </p>
            <div class="position-relative">
                <select
                class="custom-select form-control fs-5 text-secondary rounded-end-3 wt-input-bg"
                id="city"
              >
              <option value="">-- Select City --</option>
              </select>
              <div
                class="position-absolute top-50 end-0 translate-middle-y pe-3"
              >
                <i class="fa-solid fs-5 fa-chevron-down z-1 text-secondary"></i>
              </div>
            </div>
          </div>
          <p class="fs-4 text-secondary text-left m-0 mt-5 fw-semibold">
            Bank Details
          </p>
          <hr class="hr mb-3" />
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">
              Account Holder Name
            </p>
            <input
              type="text"
              class="form-control fs-4 text-secondary input-bg"
              placeholder="Account Holder Name"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="account_name"
            />
          </div>
          <div class="input-group mb-3">
            <p class="fs-4 text-secondary text-left m-0">AC. No.</p>
            <input
              type="phone"
              name="phone"
              class="form-control fs-4 rounded-2 text-secondary input-bg w-100 telephone-input"
              placeholder="AC. No."
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="account_no"
            />
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Account Type</p>
            <div class="position-relative">
              <select
                class="custom-select form-control fs-4 text-secondary rounded-end-3 input-bg"
                id="acctype"
              >
                <option selected>Select Account Type</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <div
                class="position-absolute top-50 end-0 translate-middle-y pe-3"
              >
                <i class="fa-solid fs-5 fa-chevron-down z-1 text-secondary"></i>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Bank Name</p>
            <div class="position-relative">
              <select
                class="custom-select form-control fs-4 text-secondary rounded-end-3 input-bg"
                id="bank_name"
              >
                <option selected>Select Bank Name</option>
                <option value="1">Dubai Bank</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <div
                class="position-absolute top-50 end-0 translate-middle-y pe-3"
              >
                <i class="fa-solid fs-5 fa-chevron-down z-1 text-secondary"></i>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <p class="fs-4 text-secondary text-left m-0">IBAN Number</p>
            <input
              type="phone"
              name="phone"
              class="form-control rounded-2 fs-4 text-secondary input-bg w-100 telephone-input"
              placeholder="IBAN Code"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="iban_code"
            />
          </div>
          <div class="input-group mb-3">
            <p class="fs-4 text-secondary text-left m-0">Swift Code</p>
            <input
              type="phone"
              name="phone"
              class="form-control rounded-2 fs-4 text-secondary input-bg w-100 telephone-input"
              placeholder="Swift Code"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="swift_code"
            />
          </div>
          <div class="input-group mb-3">
            <p class="fs-4 text-secondary text-left m-0">Date of Birth</p>
            <input
              type="date"
              name="phone"
              class="form-control rounded-2 fs-4 text-secondary input-bg w-100 telephone-input"
              placeholder="Swift Code"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="dob"
            />
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Currency Code</p>
            <div class="position-relative">
              <select
                class="custom-select form-control fs-4 text-secondary rounded-end-3 input-bg"
                id="currency_code"
              >
                <option selected>Select Currency Code</option>
                <option value="1">Abu Hail</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <div
                class="position-absolute top-50 end-0 translate-middle-y pe-3"
              >
                <i class="fa-solid fs-5 fa-chevron-down z-1 text-secondary"></i>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">
              Emirates ID / Passport
            </p>
            <input
              type="text"
              class="form-control fs-4 text-secondary input-bg"
              placeholder="Emirates ID / Passport"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="passport"
            />
          </div>
          <div class="mb-3">
            <p class="fs-4 text-secondary text-left m-0 mt-3">Exchange ID</p>
            <input
              type="text"
              class="form-control fs-4 text-secondary input-bg"
              placeholder="Exchange ID"
              aria-label="Username"
              aria-describedby="basic-addon1"
              id="exchangeid"
            />
          </div>
          {{-- <div class="py-5 text-end">
            <button class="pf-update-btn" id="update_user">Update</button>
          </div> --}}
        {{-- </form> --}}
      </div>
    </section>
    <!-- edit profile section end -->

    <!-- <br />
    <br />
    <br /> -->

    <!-- footer start -->

    <!-- footer footer end -->

    <!-- all script links start -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap%405.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1200,
      });
    </script>
    <script src="assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- all script links end -->
    <script>
        $(document).ready(function() {
    //   alert('response')

        var sessionData = @json(session()->all());
        var someValue = sessionData.token;
        var tableBody = $('#valueTable tbody');
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer '+someValue
                }
                });
                $.ajax({
                    // url: '{{ route("agent.customer_list") }}',
                    type: 'POST',
                    data: {
                        // 'name': username,'password': password,
                    },
                    success: function(response) {

                    },
                    error: function(error) {
                    }


                });




        });
    </script>
  </body>


</html>

            </section>

            <!--  select product section end -->

            <br />

            <!-- footer start -->

            <!-- footer footer end -->

            <!-- all script links start -->
            <script
              src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
              crossorigin="anonymous"
            ></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
//   alert('response')

    var sessionData = @json(session()->all());
    var someValue = sessionData.token;
    // var tableBody = $('#valueTable tbody');
  var customer_id= $('#customer_id').val();
//   alert(customer_id);

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+someValue
            }
            });
            $.ajax({
                url: '{{ route("cus.profile") }}',
                type: 'POST',
                data: {
                    'customer_id': customer_id,
                },
                success: function(response) {
                    if(response.code === 200){

                        $('#name').append(response.customer.name);
                        $('#mobile').append(response.customer.mobile);
                        $('#email').append(response.customer.email);
                        $('#building_name').append(response.customer.building_name);
                        // console.log(response.customer.id);
                     }


                },
                error: function(error) {
                }


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
        $('#update_user').click(function() {

        // alert('dgfdgdf')
        var customer_id= $('#customer_id').val();
        var customer_name= $('#name').val();
        var mobile= $('#mobile').val();
        var email= $('#email').val();
        var building_name= $('#building_name').val();
        var country_id= $('#country_id').val();
        var state= $('#state').val();
        var city= $('#city').val();
        var account_name= $('#account_name').val();
        var account_no= $('#account_no').val();
        var acctype= $('#acctype').val();
        var bank_name= $('#bank_name').val();
        var iban_code= $('#iban_code').val();
        var swift_code= $('#swift_code').val();
        var dob= $('#dob').val();
        var currency_code= $('#currency_code').val();
        var passport= $('#passport').val();
        var passport= $('#exchangeid').val();
        });
        $.ajax({
                url: "{{route('profile_update')}}",
                type: "POST",
                data: {
                    'customer_id': customer_id,'name': name,'mobile': mobile,'email': email,'building_name': building_name,
                    'country_id': country_id,'state': state,'city': city,'account_name': account_name,'account_no': account_no,
                    'acctype': acctype,'bank_name': bank_name,'iban_code': iban_code,'swift_code': swift_code,
                    'dob': dob,'currency_code': currency_code,'passport': passport,'exchangeid': exchangeid,
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);

                }
            });

    });
    </script>
            <script type="text/javascript">
              $(function () {
                $("#datepicker").datepicker();
              });
              $(function () {
                $("#datepicker2").datepicker();
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
