$(document).ready(function () {
    jQuery.validator.addMethod(
        "regex",
        function (value, element, param) {
            return value.match(new RegExp("^" + param + "$"));
        }
    );
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
    jQuery.validator.addMethod(
        "noSpace",
        function (value, element) {
            return value == '' || value.trim().length != 0;
        },
        "No space please and don't leave it empty");

    $("#regform").validate({
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                regex: ALPHA_REGEX,
                noSpace: true,
            },
            last_name: {
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
                equalTo: "#password",
            },
            terms: {
                required: true,
            }
        },
        messages: {
            first_name: {
                required: " Please enter your name",
                minlength: "Name need to be at least 2 characters long",
                regex: "Please enter characters only"
            },
            last_name: {
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
                required: "Please enter your confirm password",
                equalTo: "Confirm Password does not match with password",
            },
            terms: {
                required: "Please except our terms conditions"
            }
        },
        submitHandler: function (form) {
            // return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: "/users/signup",
                type: "JSON",
                method: "POST",
                data: $(form).serialize(),
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data['status'] == 1) {
                        alert(data['message']);
                    } else {
                        alert(data['message']);
                    }
                }
            });

        }
    });
});