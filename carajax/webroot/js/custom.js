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
            checkbox: {
                required: true,
            }
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
            checkbox: {
                required: "Please except our terms conditions"
            }
        },
        submitHandler: function (form) {
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
                    if(data['status'] == 1){
                        $('.signintest').click();
                    }else{
                        alert(data['message']);
                    }
                }
            });

        }
    });

    $('.nav-link').click(function () {
        $('.nav-link').removeClass('active bg-gradient-primary');
        $(this).addClass('active bg-gradient-primary');
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

    $('form').validate({
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
            }
        },
        messages: {
            email: {
                required: " Please enter your email",
            },
            password: {
                required: "Please enter your password",
                minlength: "Password need to be at least 8 characters long",
                maxlength: "Password need to be atleast  18 characters long",
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('body').on('click', '.badge-sm', function () {
        var id = $(this).prev('input').val();
        var status = $(this).next('input').val();
        if (status == 1) {
            $(this).html('Inactive')
            $(this).removeClass('bg-gradient-success')
            $(this).addClass('bg-gradient-secondary')
            $(this).next('input').val('0');
        } else {
            $(this).html('Active')
            $(this).removeClass('bg-gradient-secondary')
            $(this).addClass('bg-gradient-success')
            $(this).next('input').val('1');
        }
        $.ajax({
            url: "/admin/status",
            type: "JSON",
            method: "GET",
            data: {
                'id': id,
                'status': status,
            },
            success: function (response) { }
        });
    });

    $('.commentbtnlogin').click(function () {
        alert('Please login to post your review')
    });

    $('body').on('click', '.commentbtn', function () {
        $(this).hide();
        $('.commentshow').show();
    });

    var star = 1;
    $('.star').click(function () {
        star = $(this).val();
        $(this).prevAll('li').removeClass('fa-regular');
        $(this).prevAll('li').addClass('fa-solid');
        $(this).removeClass('fa-regular');
        $(this).addClass('fa-solid');
        $(this).nextAll('li').removeClass('fa-solid');
        $(this).nextAll('li').addClass('fa-regular');
    });

    $('.submitreview').click(function () {
        var review = $('.comment').val();
        review = review.trim();
        if (review == '') {
            $('.comment-error').html('Please enter your review')
        } else {
            var carid = $('.carid').val();
            var userid = $('.userid').val();
            var username = $('.username').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                url: "/users/view",
                type: "JSON",
                method: "POST",
                data: {
                    'star': star,
                    'review': review,
                    'car_id': carid,
                    'user_id': userid,
                    'user_name': username,
                },
                success: function (response) {
                    $('.star:first').click();
                    $('.commentshow').hide();
                    $('.commentbtn').show();
                    $('.renderdata').html('');
                    $('.renderdata').append(response);
                }
            });
        }
    });

    $('body').on('click', '.deleteUser', function () {
        var id = $(this).next('input').val();
        if (confirm("Are you sure you want to delete?")) {
            var hidetr = $(this).parents('tr');
            $.ajax({
                url: "/admin/deleteuser",
                data: { 'id': id },
                type: "JSON",
                method: "get",
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    var status = data['status'];
                    if (status == '1') {
                        hidetr.hide();
                    } else {
                        alert('delete failure')
                    }
                }
            });
        }
        return false;
    });

    $('body').on('click', '.deleteItem', function () {
        var id = $(this).next('input').val();
        if (confirm("Are you sure you want to delete?")) {
            var hidetr = $(this).parents('tr');
            $.ajax({
                url: "/admin/deletecar",
                data: { 'id': id },
                type: "JSON",
                method: "get",
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    var status = data['status'];
                    if (status == '1') {
                        hidetr.hide();
                    } else {
                        alert('failure')
                    }
                }
            });
        }
        return false;
    });

    $('body').on('click', '.hometest', function () {
        $.ajax({
            url: "/users/test",
            data: { 'test': true },
            type: "JSON",
            method: "get",
            success: function (response) {
                $('.homecontent').html('');
                $('.homecontent').append(response);
            }
        });
        return false;
    });

    $('body').on('click', '.viewtest', function () {
        var id = $(this).next('input').val();
        $.ajax({
            url: "/users/view",
            data: { 'id': id },
            type: "JSON",
            method: "get",
            success: function (response) {
                $('.homecontent').html('');
                $('.homecontent').append(response);
            }
        });
        return false;
    });

    $('body').on('click', '.dashtest', function () {
        $.ajax({
            url: "/users/home",
            data: { 'status': true },
            type: "JSON",
            method: "get",
            success: function (response) {
                $('.homecontent').html('');
                $('.homecontent').append(response);
            }
        });
        return false;
    });

    $('body').on('click', '.profiletest', function () {
        $.ajax({
            url: "/users/profile",
            data: { 'status': true },
            type: "JSON",
            method: "get",
            success: function (response) {
                $('.homecontent').html('');
                $('.homecontent').append(response);
            }
        });
        return false;
    });

    $('body').on('click', '.signintest', function () {
        $.ajax({
            url: "/users/signin",
            data: { 'status': true },
            type: "JSON",
            method: "get",
            success: function (response) {
                $('.signcontent').html('');
                $('.signcontent').append(response);
            }
        });
        return false;
    });

    $('body').on('click', '.signuptest', function () {
        $.ajax({
            url: "/users/signup",
            data: { 'status': true },
            type: "JSON",
            method: "get",
            success: function (response) {
                $('.signcontent').html('');
                $('.signcontent').append(response);
            }
        });
        return false;
    });

});

