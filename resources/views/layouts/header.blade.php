 <!-- navbar start -->
 <nav id="nav-container" class="navbar navbar-expand-lg bg-nav p-0 bg-body-tertiary sticky-top">
     <div class="container-fluid bg-body-tertiary-header py-3 header-container">
         <button id="mobile-menu-btn" class="navbar-toggler" type="button" data-bs-toggle="collapse"
             data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <img src="./assets/images/header-logo.png" alt="" />
         <a href="#" class="nav-avatar" data-bs-toggle="modal" data-bs-target="#signoutModal"
             data-bs-whatever="@mdo">
             <img src="./assets/images/bg-img.webp" alt="Avatar" />
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
                             {{-- <li>
                                 <a href="#" id="earning-transaction-nav-btn" class="">
                                     <i class="fa-solid fa-caret-right"></i>
                                     Earning Transaction
                                 </a>
                             </li> --}}
                             <li>
                                 <a href="#" id="point-transaction-nav-btn" class="">
                                     <i class="fa-solid fa-caret-right"></i>
                                     Point Transaction
                                 </a>
                             </li>
                             {{-- <li>
                                 <a href="#" id="withdraw-transaction-nav-btn" class="">
                                     <i class="fa-solid fa-caret-right"></i>
                                     Withdraw
                                 </a>
                             </li> --}}
                         </ul>
                     </div>
                 </li>
                 {{-- <div class="nav-divider"></div>
                 <li>
                     <a href="#" id="add-credit-nav-btn" add-credit-nav-btn class="" aria-current="page">
                         <i class="fa-regular fa-credit-card"></i>
                         Add Credits
                     </a>
                 </li> --}}
                 {{-- <div class="nav-divider"></div>
                 <li>
                     <a href="#" id="req-points-nav-btn" class="" aria-current="page">
                         <i class="fa-solid fa-hand-holding-droplet"></i>
                         Request Points
                     </a>
                 </li> --}}
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
                         <a href="customer-profile.html" type="button" class="text-decoration-none text-white fs-4">
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
