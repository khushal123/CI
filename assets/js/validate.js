/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validateForm() {
    var firstName = $("#first_name").val();
    var lastName = $("#last_name").val();
    var email = $("#last_name").val();
    var mobile = $("#mobile").val();
    var pan = $("#pan").val();
    var address_line_1 = $("#address_line_1").val();
    var address_line_2 = $("#address_line_2").val();
    var city = $("#city").val();
    var state = $("#state").val();
    var country = $("#country").val();
    var password = $("#password").val();
    var repeatPassword = $("#repeated_password").val();
    if (password !== repeatPassword) {
        $("#repeated_password").next().addClass("error-display").text("Both passwords should be same");
        $("#signup #generic-error").addClass("error-display").text("Both passwords should be same");
        return false;
    }
    if (mobile.length != 10) {
        $("#mobile").next().addClass("error-display").text("Mobile number should be of 10 digits");
        $("#signup #generic-error").addClass("error-display").text("Mobile number should be of 10 digits");
        return false;
    }
    return true;
}

$("#repeated_password").on('focus', function () {
    $("#repeated_password").next().removeClass("error-display");
    $("#signup #generic-error").removeClass("error-display");
});

$("#mobile").on('focus', function () {
    $("#mobile").next().removeClass("error-display");
    $("#signup #generic-error").removeClass("error-display");
});
$("#login-id").on('focus', function () {
    $("#login-id").next().removeClass("error-display");
});

function validateLogin() {
   
    var id = $("#login-id").val();
    if (isNaN(id)) {
         
        if (!validateEmail(id)) {
            $("#login-id").next().addClass("error-display").text("Invalid email or mobile number");
            console.log("invalid email");
            return false;
        }
        else {
            
            $("#hidden").val("email");
        }

    }
    else if (id.length != 10) {
        $("#login-id").next().addClass("error-display").text("Mobile number should not exceed 10 digits");
    }
    else {
        console.log("invalid email 2");
        $("#hidden").text("mobile");
    }
   
    return true;

}

//function validateLogin() {
//
//    var id = $("#login-id").val();
//    if (isNaN(id)) {
//        if (!validateEmail(id)) {
//            $("#login-id").next().addClass("error-display").text("Invalid email or mobile number");
//            return false;
//        }
//        else {
//            $("#hidden").val("email");
//        }
//
//    }
//    else if (id.length != 10) {
//        $("#login-id").next().addClass("error-display").text("Mobile number should be of 10 digits");
//        return false;
//    }
//    else {
//        $("#hidden").val("mobile");
//    }
//    return true;
//}


function validateForgotPassword() {
    var id = $("#login-id-forgot").val();

    if (isNaN(id)) {
        if (!validateEmail(id)) {
            $("#login-id-forgot").next().addClass("error-display").text("Invalid email or mobile number");
            return false;
        }
        else {
            $("#hiddenType").val("email");
        }

    }
    else if (id.length != 10) {
        $("#login-id-forgot").next().addClass("error-display").text("Mobile number should be of 10 digits");
        return false;
    }
    else {
        $("#hiddenType").val("mobile");
    }
    return true;

}


function validateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return (true)
    }
    return (false)
}

