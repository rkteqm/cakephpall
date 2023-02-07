$(document).ready(function () {

    jQuery.validator.addMethod("regex", function (value, element, param) {
        return value.match(new RegExp("^" + param + "$"));
    });
    var ALPHA_REGEX = "[a-zA-Z_ ]*";

    jQuery.validator.addMethod(
        'Uppercase',
        function (value) {
            return /[A-Z]/.test(value);
        },
        'Your password must contain at least one Uppercase Character.'
    );
    jQuery.validator.addMethod(
        'Lowercase',
        function (value) {
            return /[a-z]/.test(value);
        },
        'Your password must contain at least one Lowercase Character.'
    );
    jQuery.validator.addMethod(
        'Specialcharacter',
        function (value) {
            return /[!@#$%^&*()_-]/.test(value);
        },
        'Your password must contain at least one Special Character.'
    );
    jQuery.validator.addMethod(
        'Onedigit',
        function (value) {
            return /[0-9]/.test(value);
        },
        'Your password must contain at least one digit.'
    );
    jQuery.validator.addMethod("noSpace", function (value, element) {
        return value == '' || value.trim().length != 0;
    }, "No space please and don't leave it empty");

    $("#regform").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                regex: ALPHA_REGEX,
                noSpace: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
            name: {
                required: " Please enter your name",
                minlength: "Name need to be at least 2 characters long",
                regex: "Please enter characters only"
            },
            email: {
                required: " Please enter your email",
            },
            password: {
                required: "Please enter your password",
                minlength: "Password need to be at least 8 characters long",
                maxlength: "Password need to be atleast  18 characters long",
            },
            confirm_password: {
                required: " Please enter your confirm password",
                equalTo: " Please enter the same password as above"
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });



    $("#loginform").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,
            },
        },
        messages: {
            email: {
                required: " Please enter your email",
            },
            password: {
                required: "Please enter your password",
                minlength: "Password need to be at least 8 characters long",
                maxlength: "Password need to be atleast  18 characters long",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });



    $("#carformedit").validate({
        rules: {
            company: {
                required: true,
                minlength: 2,
            },
            description: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            company: {
                required: " Please enter your car company name",
                minlength: "Company name need to be at least 2 characters long",
            },
            description: {
                required: "Please enter your car description",
                minlength: "Description need to be at least 10 characters long",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });



    $("#rateform").validate({
        rules: {
            review: {
                required: true,
                noSpace: true
            },
        },
        messages: {
            review: {
                required: " Please enter your review",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });



    $("#carform").validate({
        rules: {
            image: {
                required: true,
            },
            brand: {
                required: true,
            },
            model: {
                required: true,
            },
            make: {
                required: true,
            },
            color: {
                required: true,
            },
            company: {
                required: true,
                minlength: 2,
                noSpace: true
            },
            description: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            image: {
                required: " Please select your car image",
            },
            brand: {
                required: " Please select your car brand",
            },
            model: {
                required: " Please select your car model",
            },
            make: {
                required: " Please select your car make year",
            },
            color: {
                required: " Please select your car color",
            },
            company: {
                required: " Please enter your car company name",
                minlength: "Company name need to be at least 2 characters long",
            },
            description: {
                required: "Please enter your car description",
                minlength: "Description need to be at least 10 characters long",
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});