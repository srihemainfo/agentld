{{-- Sign up  --}}
@extends('welcome')

@section('page-Title', 'Customer')


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

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> --}}

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

    <title>Point History</title>
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
          </li>
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
      <p class="fs-2 fw-semibold text-white m-0 ps-3">Customer</p>
    </div>
    <div class="">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-white">
            <a href="#" class="text-white text-decoration-none">Home</a>
          </li>
          <li class="breadcrumb-item text-white active" aria-current="page">
            Customer
          </li>
        </ol>
      </nav>
    </div>
  </section>
  <section class="container">
    <div class="p-4 bg-light my-4 rounded-3">
      <!-- <p class="fw-semibold mb-1">Search Existing Customer</p>
      <div class="input-group mb-3">
        <input
          type="text"
          class="form-control text-secondary input-bg"
          placeholder="Enter Mobile Number / E-mail ID"
          aria-label="Recipient's username"
          aria-describedby="button-addon2"
        />
        <button
          class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-bold ml-n1"
          type="button"
          id="button-addon2"
        >
          GO
        </button>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <button
          class="btn btn-outline-secondary d-flex align-items-center btn-primary text-light px-4 rounded-3 fw-semibold ml-n1"
          type="button"
          id="button-addon2"
        >
          <i class="fa-solid fa-user-plus me-2"></i>
          New Customer
        </button>
      </div> -->
      <div class="pb-4 pt-2">
        <form>
          <div class="row form-group">
            <div class="col-6">
              <div>
                <p class="fw-semibold mb-1">From Date</p>
              </div>
            </div>
            <div class="col-6 ps-0">
              <div>
                <p class="fw-semibold mb-1">To Date</p>
              </div>
            </div>

            <div class="col-6">
              <div class="input-group date position-relative" >
                <input
                  type="date"
                  placeholder="mm/dd/yyyy"
                  class="form-control rounded-3 fs-6 z-1 input-bg"
                  id="from_date"
                />
                <span
                  class="input-group-append position-absolute top-50 end-0 translate-middle-y pe-1 z-3"
                >
                  <span class="input-group-text border-0 p-1 input-icon-bg">
                    {{-- <i class="fa-regular fa-calendar-days text-secondary"></i> --}}
                  </span>
                </span>
              </div>
            </div>
            <div class="col-6 ps-0">
              <div
                class="input-group date position-relative"

              >
                <input
                  type="date"
                  placeholder="mm/dd/yyyy"
                  class="form-control rounded-3 fs-6 z-1 input-bg"
                  id="to_date"
                />
                <span
                  class="input-group-append position-absolute top-50 end-0 translate-middle-y pe-1 z-3"
                >
                  <span class="input-group-text border-0 p-1 input-icon-bg">
                    {{-- <i class="fa-regular fa-calendar-days text-secondary"></i> --}}
                  </span>
                </span>
              </div>
            </div>
            <!-- <div class="col-2 ps-0">
              <button
                class="btn w-100 h-100 btn-outline-secondary btn-primary text-light rounded-3 fw-bold ml-n1"
                type="button"
                id="button-addon2"
              >
                GO
              </button>
            </div> -->
            <div class="col-12 mt-3">
              <p class="fw-semibold mb-1">Status</p>
              <div class="input-group position-relative">
                <select
                  class="custom-select form-control fs-6 z-1 rounded-3 input-bg"
                  id="status"
                >
                  <option selected value="">Select Status</option>
                  <option value="0">Active Customer</option>
                  <option value="1">Deleted Customer</option>

                </select>
                <div
                  class="position-absolute top-50 end-0 translate-middle-y pe-2 z-3"
                >
                  <i class="fa-solid fs-5 fa-chevron-down"></i>
                </div>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control text-secondary input-bg"
                  placeholder="Enter Mobile Number / E-mail ID"
                  aria-label="Recipient's username"
                  aria-describedby="button-addon2"
                  id="email_mobile"
                />
                <button
                  class="btn btn-outline-secondary btn-primary text-light px-4 rounded-3 fw-bold ml-n1"
                  type="button"
                  name="submit_button"
                  value="submitted"
                  id="button-addon2"
                >
                  GO
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- search existing customer end -->

  <!--  select product section start -->
  <section class="container">
    <div class="bg-light p-3 rounded-3">
      <div>
        <p class="fw-semibold fs-5 mb-3">My Customer</p>
      </div>

      <!-- table -->
      <div>
        <table
          class="table text-center table-bordered text-uppercase align-items-center fw-semibold table-striped example"

        >
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Mob Number</th>
              <th scope="col">E-mail Id</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

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

  <br />
    <!--  Point request alert popup start -->

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

<script>
    $(document).ready(function() {
//   alert('response')

    var sessionData = @json(session()->all());
    var someValue = sessionData.token;

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+someValue
            }
            });
          var tableBody = $('.example').DataTable();
             var from_date =   $('#from_date').val();
             var to_date =   $('#to_date').val();
             var status =   $('#status').val();
             var email_mobile =   $('#email_mobile').val();

             $('#button-addon2').click(function() {
             // alert('sdfsgdfg');
             tableBody.clear().draw();

             var from_date =   $('#from_date').val();
             var to_date =   $('#to_date').val();
             var status =   $('#status').val();
             var email_mobile =   $('#email_mobile').val();
            // var tableBody = $('.example').DataTable();

            tableBody.clear().draw();
             $.ajax({
                url: '{{ route("agent.customer_filter") }}',
                type: 'POST',
                data: {
                    'from_date': from_date,'to_date': to_date,'status': status,'email_mobile':email_mobile,
                },
                success: function(response) {

                    console.log(response);
                    $('#error_message').html('');
                    if(response.code === 200){
                        if(response.data.customers){
                    var customer=response.data.customers;
                    $.each(customer, function(index, value) {
                        var newRow = '<tr>' +
                        '<td>'  + value.name + '</td>' +
                        '<td>' + value.mobile + '</td>' +
                        '<td>' + value.email + '</td>' +
                        '<td>' + '<i class="fa-regular fa-eye fw-semibold text-secondary open-detail" data-customer-id="' + value.id + '"></i>' + '</td>' +

                    '</tr>';

                    tableBody.row.add($(newRow)).draw();

                });
                 }
                    }
                    if(response.code === 401){
                        $('#error_message').text('');
                        if(response.status){
                            $('#error_message').text(response.status);
                        }
                    }

                },
                error: function(error) {
                }


            });
                });

            // $.ajax({
            //     url: '{{ route("agent.customer_list") }}',
            //     type: 'POST',
            //     data: {
            //         'from_date': from_date,'to_date': to_date,'status': status,'email_mobile':email_mobile,
            //     },
            //     success: function(response) {
            //         // $('#valueTable').html();
            //     // console.log(response);
            //     if(response.code === 200){
            //         if(response.customer){
            //         var customer=response.customer;

            //         $.each(customer, function(index, value) {
            //         var newRows = '<tr><td>' + value.name + '</td><td>' + value.mobile + '</td><td>' + value.email + '</td><td>' +
            //              '<i class="fa-regular fa-eye fw-semibold text-secondary open-detail" data-customer-id="' + value.id + '"></i>' + '</td></tr>';
            //         tableBody.append(newRows);
            //     });
            //      }
            //     }
            //     if(response.code === 401){
            //             $('#error_message').text('');
            //             if(response.status){
            //                 $('#error_message').text(response.status);
            //             }
            //         }
            //     },
            //     error: function(error) {
            //     }


            // });
            $.ajax({
    url: '{{ route("agent.customer_list") }}',
    type: 'POST',
    data: {},

    success: function(response) {
        // console.log(response.customer)
        if (response.code === 200) {
            if (response.customer) {

                var customer=response.customer;

                $.each(customer, function(index, value) {

                    var newRow = '<tr>' +
                        '<td>'  + value.name + '</td>' +
                        '<td>' + value.mobile + '</td>' +
                        '<td>' + value.email + '</td>' +
                        '<td>' + '<i class="fa-regular fa-eye fw-semibold text-secondary open-detail" data-customer-id="' + value.id + '"></i>' + '</td>' +

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

        $(document).on('click', '.open-detail', function() {
        var customerId = $(this).data('customer-id');
        window.location.href = '/customerprofile/' + customerId ;
      });



    });
</script>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
crossorigin="anonymous"
></script>

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




@section('required_JS')
<script>
// $(document).ready(function() {
// // alert('asdfdsg')

//     var sessionData = @json(session()->all());
//     var someValue = sessionData.token;
// // alert(someValue);
//         $.ajaxSetup({
//                         headers: {
//                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                             'Authorization': 'Bearer '+someValue
//                         }
//                     });
//         });
//         $(document).ready(function() {
//             $('#request_point').click(function() {


//                var point_value = $('#point_value').val();

//                 $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 }
//                 });
//                 $.ajax({
//                     url: '{{ route("agent.point_request") }}',
//                     type: 'POST',
//                     data: {
//                         'points': point_value,
//                     },
//                     success: function(response) {

//                         // alert('1')
//                         console.log(response);
//                         if(response.code === 200){
//                             $('#hide_div').hide();
//                             $('#sucess-message').text(response.status);
// }

//                     },
//                     error: function(error) {
//                 // alert('adsafs')
//                 $('#error-message').text('');

//                 if(error.responseJSON.message.points){
//                     $('#error-message').text(error.responseJSON.message.points);
//                 }
//                     }
//                 });

//             });


//     });

//     $(document).ready(function() {
//         $('#button-addon2').click(function() {

//             var status=  $('#inputGroupSelect01').val();
//             var from_date=  $('#from_date').val();
//             var to_date=  $('#to_date').val();
// // alert(from_date);
//            var tableBody = $('#valueTable tbody');
//             $.ajax({
//                     url: '{{ route("agent.pointstransaction_list") }}',
//                     type: 'POST',
//                     data: {
//                         'from_date': from_date,'to_date': to_date,
//                     },
//                     success: function(response) {
//                         // alert('1')
//                         $('#valueTable').empty();

//                         if(response.code === 200){
//                         if(response.data.transaction_points){

//                             var datas=response.data.transaction_points;
//                             $.each(datas, function(index, value) {
//                     var newRow = '<tr><td>' + value.createdon + '</td><td>' + value.name + '</td><td>' + value.points + '</td><td>' +'</td><td>' + value.status +  '</td></tr>';
//                     tableBody.append(newRow);



//                 });
//                         }
//                     }
//                         if(response.code === 401){
//                             $('#tablebody').text(response.status);

//                         }

//                     },
//                     error: function(error) {
// // alert('2')
//                     }
//                 });



//         });



//             });
</script>
    </body>
    </html>

@endsection
