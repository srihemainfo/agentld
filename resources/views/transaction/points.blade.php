{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Sign IN')


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

    <title>Point History</title>
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
              <a href="#" id="" add-credit-nav-btn class="" aria-current="page">
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
        <a class="btn btn-info" href="{{ URL::previous() }}"> <button
          id="back-home-btn"
          class="bg-transparent border rounded-5 border-white"
        >
          <i class="fa-solid fa-arrow-left text-light"></i>
        </button></a>
        <p class="fs-2 fw-semibold text-white m-0 ps-3">Points</p>
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
              Points
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
              Total Points
            </h6>
            <p class="text-white fs-2 fw-bold mb-0 text-uppercase" id="draw_id"></p>
          </div>
        </div>
      </div>
    </section>

    <!-- earning list end -->

    <!--  select product section start -->
    <section class="container">
      <div class="bg-light p-3 rounded-3">
        <div class="pb-4">
          <form>
            <div class="row mb-4">
              <div class="col-7 pe-1">
                <div class="input-group position-relative">
                  <select
                    class="custom-select form-control fs-6 z-1 rounded-3 text-uppercase input-bg"
                    id="inputGroupSelect01"
                  >
                    <option selected value="0"  >Points Transaction History</option>
                    <option value="1"  >Points Request History</option>
                    <option value="2"  >Points Rejected History</option>
                  </select>
                  <div
                    class="position-absolute top-50 end-0 translate-middle-y pe-2 z-3"
                  >
                    <i class="fa-solid fs-5 fa-chevron-down"></i>
                  </div>
                </div>
              </div>
              <div class="col-5 ps-0">
                <button
                  type="button"
                  class="form-control mx-2 rounded-2 text-center w-100 h-100 input-bg"
                  aria-label="Recipient's username"
                  aria-describedby="button-addon2"
                  data-bs-toggle="modal"
                  data-bs-target="#point-request-alert"
                  data-bs-whatever="@mdo"
                >
                  Request Points
                </button>
              </div>
            </div>
            <div class="row date-picker-group form-group">
              <div class="col-5">
                <div class="input-group date position-relative" id="datepicker">
                  <input
                    type="text"
                    placeholder="mm/dd/yyyy"
                    class="form-control rounded-3 fs-6 z-1 input-bg"
                    id="from_date"
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
                    id="to_date"
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
          class="table text-center table-bordered text-uppercase align-items-center fw-semibold table-striped example"
          >
            <thead class="text-uppercase">
              <tr>
                <th scope="col">Date & Time</th>
                <th scope="col">Seller Name</th>
                <th scope="col">Points Txn</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="">

            </tbody>
          </table>
        </div>
        {{-- <div class="text-center">
          <p class="fw-semibold">Showing 1 to 5 of 1,582 entries</p>
        </div> --}}
        <!-- pagination -->
        {{-- <div class="w-100">
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
      </div>
    </section>

    <!--  select product section end -->

    <!-- Point request alert popup start -->
    <section class="container">
      <div>
        <div
          class="modal fade"
          id="point-request-alert"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header border-0 pt-4 px-4 pb-0">
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="modal-body px-5 pt-0">
                <h1
                  class="modal-title fs-2 fw-semibold mb-3"
                  id="exampleModalLabel"
                >
                  Point Request
                </h1>


                    <p id="error-message" style="color:red;"></p>
                   <p id="sucess-message" style="color:green;"></p>
                <div class="input-group mb-3" id="hide_div">
                  <div class="input-group mb-3" >
                    <div class="input-group-prepend" >
                      <span
                        class="input-group-text rounded-end-0 rounded-top-3 rounded-start-3 input-bg"
                        id="basic-addon1"
                      >
                        <div class="login-input-icon-bg">
                          <i
                            class="fa-regular text-secondary fs-5 fa-money-bill-1"
                          ></i>
                        </div>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control fs-4 text-secondary input-bg ms-1"
                      placeholder="Enter Points"
                      aria-label="Username"
                      id="point_value"
                    />
                  </div>
            <div>
             <p class="fs-4 mb-0" >Leader Name: <span id="leader_name"></span></p>

             <p class="fs-4"  > ID: <span id="user_id"></span></p>
            </div>
              <div
                class="modal-footer border-0 pt-0 px-4 pb-5 justify-content-center"
              >
                <button
                  type="button"
                  class="btn btn-danger fs-3 fw-semibold px-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                >
                  Close
                </button>
                <button
                  type="button"
                  class="btn btn-success fs-3 fw-semibold px-3"
                  id="request_point"
                >
                  Request
                </button>
            </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Point request alert popup start -->

    <!-- <br />
    <br />
    <br /> -->

    <!-- footer start -->

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
<script>
$(document).ready(function() {
// alert('asdfdsg')

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
        $(document).ready(function() {
            $('#request_point').click(function() {


               var point_value = $('#point_value').val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
                });
                $.ajax({
                    url: '{{ route("agent.point_request") }}',
                    type: 'POST',
                    data: {
                        'points': point_value,
                    },
                    success: function(response) {

                        // alert('1')
                        console.log(response);
                        if(response.code === 200){
                            $('#hide_div').hide();
                            $('#sucess-message').text(response.status);
}

                    },
                    error: function(error) {
                // alert('adsafs')
                $('#error-message').text('');

                if(error.responseJSON.message.points){
                    $('#error-message').text(error.responseJSON.message.points);
                }
                    }
                });

            });


    });

    $(document).ready(function() {

        // var today_date=date("Y-m-d");


        var tableBody = $('.example').DataTable();

        $('#button-addon2').click(function() {

            var status=  $('#inputGroupSelect01').val();
            var from_date=  $('#from_date').val();
            var to_date=  $('#to_date').val();

            var tableBody = $('.example').DataTable();



            tableBody.clear().draw();

            $.ajax({
                    url: '{{ route("agent.pointstransaction_list") }}',
                    type: 'POST',
                    data: {
                        'from_date': from_date,'to_date': to_date,'status':status,
                    },
                    success: function(response) {
                        // alert('1')
                        // $(".example").empty();

                        console.log(response)
                        if(response.code === 200){
                        if(response.data.transaction_points){

                            var datas=response.data.transaction_points;
                            $.each(datas, function(index, value) {
                    var newRow = '<tr><td>' + value.createdon + '</td><td>' + value.name + '</td><td>' + value.points + '</td><td>'  + value.status +  '</td></tr>';
                    // tableBody.append(newRow);
                    tableBody.row.add($(newRow)).draw();



                });
                        }
                    }
                        if(response.code === 401){
                            $('#tablebody').text(response.status);

                        }

                    },
                    error: function(error) {
// alert('2')
                    }
                });



        });
           ////////////////////////////////////////////////////////////////////////////////
           var tableBody = $('.example').DataTable();
        $.ajax({
         url: '{{ route("agent.pointstransaction_today") }}',
         type: 'POST',
         data: {

         },
         success: function(response) {
             // alert('1')
             console.log(response)
             if(response.code === 200){
             if(response.data.transaction_points){

                 var datas=response.data.transaction_points;
                 $.each(datas, function(index, value) {
         var newRow = '<tr><td>' + value.createdon + '</td><td>' + value.name + '</td><td>' + value.points + '</td><td>' + value.status +  '</td></tr>';
         tableBody.row.add($(newRow)).draw();



     });
             }
         }
             if(response.code === 401){
                 $('#tablebody').text(response.status);

             }

         },
         error: function(error) {

         }
     });



            });

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

                    if(response.data.balance_points){
                        $("#draw_id").html(response.data.balance_points);
                    }
                         console.log(response.data.balance_points);


                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
////////////////////////////////////////////////////////////////////
            $.ajax({
                url: '{{ route('agent.agent_created_user') }}',
                type: 'POST',
                data: {

                    token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.data.user);
                    if(response.data.user.id){
                        $("#user_id").html(response.data.user.id);
                    }

                    if(response.data.user.name){
                        $("#leader_name").html(response.data.user.name);
                    }

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });


        });
</script>
    </body>
    </html>

@endsection
