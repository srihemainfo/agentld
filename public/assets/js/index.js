// header start
let headerBtnEl = document.getElementById('mobile-menu-btn');
let mobileNavEl = document.getElementById('mobile-nav-menu');
let navContainerEl = document.getElementById('nav-container');
let transactionNavHandler = document.getElementById('transaction-nav-handler');
let subExpandedNavs = document.getElementById('sub-expanded-navs');
let pfSignOutBtn = document.getElementById('profile-sign-out-btn');


headerBtnEl.addEventListener('click', () => {
    if(mobileNavEl.classList.contains('d-none')){
        mobileNavEl.classList.remove('d-none');
    }else{
        mobileNavEl.classList.add('d-none');
    };
})

transactionNavHandler.addEventListener('click', function(event){
    event.preventDefault();
    event.stopPropagation();

    if(subExpandedNavs.className.includes('transaction-expand-nav')){
        subExpandedNavs.classList.remove('transaction-expand-nav');
    }else{
        subExpandedNavs.classList.add('transaction-expand-nav');
    };
});

if(pfSignOutBtn){
    pfSignOutBtn.addEventListener('click', function(event){
        event.preventDefault();
        // location.href = 'sign-in.html'
    });

}else{
    console.log('')
}



// header end


// nav start
let customerNavBtn = document.getElementById('customer-nav-btn');
let ticketsNavBtn = document.getElementById('tickets-nav-btn');
let dashboardNavBtn = document.getElementById('dashboard-nav-btn');
let earningTrNavBtn = document.getElementById('earning-transaction-nav-btn');
let pointTrNavBtn = document.getElementById('point-transaction-nav-btn');
let withdrawTrNavBtn = document.getElementById('withdraw-transaction-nav-btn');
// let addCrNavBtn = document.getElementById('add-credit-nav-btn');
let reqPointNavBtn = document.getElementById('req-points-nav-btn');
let ticketGoBtn = document.getElementById('ticket-next-go-btn');




if(earningTrNavBtn || pointTrNavBtn || withdrawTrNavBtn){

    dashboardNavBtn.addEventListener('click', function(event){
        event.preventDefault();
        location.href = '/user-login';

    });
    customerNavBtn.addEventListener('click', function(event){
        event.preventDefault();
        location.href = '/customer/index';
    });
    ticketsNavBtn.addEventListener('click', function(event){
        event.preventDefault();
        location.href = '/agent-ticket/index';
    });


        // earningTrNavBtn.addEventListener('click', function(event){
        //     event.preventDefault();
        //     location.href = '/transaction/earning-page';
        // });
        pointTrNavBtn.addEventListener('click', function(event){
            event.preventDefault();
            location.href = '/transaction/point-transaction';
        });
        // withdrawTrNavBtn.addEventListener('click', function(event){
        //     event.preventDefault();
        //     location.href = '/transaction/withdrawal';
        // });
        // addCrNavBtn.addEventListener('click', function(event){
        //     event.preventDefault();
        //     location.href = '/Credit/credit_point';
        // });
        reqPointNavBtn.addEventListener('click', function(event){
            event.preventDefault();
            location.href = '/point/index';
        });

        // ticketGoBtn.addEventListener('click', function(event){
        //     event.preventDefault();
        //     location.href = '/agent/ticket-select';
        // });


    }else{
        console.log('not get')
    }


    // nav end

// forgot password with email and mobile start
let emailForgotBtn = document.getElementById('forgot-email-btn');
let mobileForgotBtn = document.getElementById('forgot-mobile-btn');
let emailForgotInput = document.getElementById('forgot-email-input');
let mobileForgotInput = document.getElementById('forgot-mobile-input');

// emailForgotBtn.onclick = function () {
//     emailForgotInput.classList.remove('d-none');
//     mobileForgotInput.classList.add('d-none');
//     emailForgotBtn.classList.add('bg-black');
//     emailForgotBtn.classList.add('bg-black');
//     mobileForgotBtn.classList.remove('bg-black');
// };

// mobileForgotBtn.onclick = function () {
//     emailForgotInput.classList.add('d-none');
//     mobileForgotInput.classList.remove('d-none')
//     emailForgotBtn.classList.remove('bg-black');
//     emailForgotBtn.classList.add('bg-secondary');
//     mobileForgotBtn.classList.add('bg-black');
// };
if(emailForgotBtn && mobileForgotBtn){
    emailForgotBtn.onclick = function () {
        emailForgotInput.classList.remove('d-none');
        mobileForgotInput.classList.add('d-none');
        emailForgotBtn.classList.add('bg-black');
        emailForgotBtn.classList.remove('bg-secondary');
        mobileForgotBtn.classList.remove('bg-black');
    };
    mobileForgotBtn.onclick = function () {
        emailForgotInput.classList.add('d-none');
        mobileForgotInput.classList.remove('d-none');
        emailForgotBtn.classList.remove('bg-black');
        emailForgotBtn.classList.add('bg-secondary');
        mobileForgotBtn.classList.add('bg-black');
    };
}else{
    console.log("");
}

// forgot password with email and mobile end

// breakcumbs start
let backHomeBtn = document.getElementById("back-home-btn");
if(backHomeBtn){
    backHomeBtn.addEventListener("click", function(){
        location.href = "index.html"
    })

}else{
    console.log('');
}
// breakcumbs end


// test height
// var element = document.getElementsByClassName("header-container")[0];
// var height = element.offsetHeight;
// console.log("Height: " + height + "px");


// sign in funtionalities start
let signUpRedirect = document.getElementById('redirect-sign-up');
let signInModal = document.getElementById('sign-in-modal');
let siForgotRedirect = document.getElementById('si-forgot-redirect-btn');
let signInBtn = document.getElementById('sign-in-btn');

if ( signUpRedirect || siForgotRedirect) {
    signUpRedirect.addEventListener('click', function() {
        location.href = 'sign-up.html';
    });
    siForgotRedirect.addEventListener('click', function() {
        location.href = 'forgot-password.html';
    });

    signInBtn.addEventListener('click', function() {
        location.href = 'index.html';
    });

} else {
    console.log("");
}
// sign in funtionalities end

// sign up funtionalities start
let isShowPass = document.getElementById('show-sign-up-pass');
let signUpPass = document.getElementById('sign-up-pass');
let signUpBtn = document.getElementById('sign-up-btn');

if(isShowPass){
    isShowPass.addEventListener('click', function(){
        let testClass = isShowPass.className;

        if(testClass.includes('fa-eye')){
            isShowPass.classList.add('fa-eye-slash');
            isShowPass.classList.remove('fa-eye');
            signUpPass.type = "text";
        }
        if(testClass.includes('fa-eye-slash')){
            isShowPass.classList.add('fa-eye');
            isShowPass.classList.remove('fa-eye-slash');
            signUpPass.type = "password";
        }
    });

    signUpBtn.addEventListener('click', function() {
        location.href = 'index.html';
    });


}else{
    console.log('');
}
// sign up funtionalities end

// welcome page functionalities start
let wcBtn = document.getElementById('wc-agent-panel-btn');
if(wcBtn){
    wcBtn.addEventListener('click', function() {
        console.log('button clicekd');
        location.href = 'dashboard-agents.html';
    });
}else{
    console.log('');
}
// welcome page functionalities end

// add product selection start
let addCreditSelectBtns = document.querySelectorAll(".add-crdt-slct-btn");
if (addCreditSelectBtns.length > 0) {
    addCreditSelectBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            location.href = 'credit-payment-selection.html';
        });
    });
} else {
    console.log("");
}

// let creditCardPayBtn = document.getElementById("credit-card-pay-btn");
// creditCardPayBtn.addEventListener('click', function(){
//     location.href = 'debit-credit-card-info.html'
// })

document.addEventListener('DOMContentLoaded', function() {
    let creditCardPayBtn = document.getElementById("credit-card-pay-btn");

    if (creditCardPayBtn) {
      creditCardPayBtn.addEventListener('click', function() {
        location.href = 'debit-credit-card-info.html';
      });
    } else {
      console.log("");
    }
  });

// add product selection end


// input number flags start

const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});



$(document).ready(function() {
    // Initialize intlTelInput
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      separateDialCode: true,
      customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        return selectedCountryPlaceholder + " (" + selectedCountryData.dialCode + ")";
      }
    });
  });

// input number flags end
