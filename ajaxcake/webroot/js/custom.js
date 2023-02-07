$(function () {
    // file for custom js code

    // Ajax csrf token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });

    $("#frm-add-student").validate({
        // in 'rules' user have to specify all the constraints for respective fields
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phone_no: {
                required: true,
            }
        },
        // in 'messages' user have to specify message as per rules
        messages: {
            name: " Please enter your name",
            email: {
                required: " Please enter a email",
                minlength: " Your email must consist of at least 2 characters"
            },
            phone_no: "Please enter your phone number"
        },
        submitHandler: function (form) {
            var postdata = $("#frm-add-student").serialize();
            $.ajax({
                url: "/add-student",
                data: postdata,
                type: "JSON",
                method: "post",
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data);
                    var status = data['status'];
                    if(status == '0'){
                        $('#email-error').html('');
                        $('#email-error').show();
                        $('#email-error').append(data['message']);
                    }else if(status == '1'){
                        $('#success').html('');
                        $('#success').append(data['message']);
                    }
                }
            });
        }
    });

    // ajax request to save student
    // $("#frm-add-student").on("submit", function () {
    //     var postdata = $("#frm-add-student").serialize();
    //     $.ajax({
    //         url: "/add-student",
    //         data: postdata,
    //         type: "JSON",
    //         method: "post",
    //         success: function (response) {
    //             data = JSON.parse(response);
    //             $('#rahul').html('');
    //             $('#rahul').append(data['message']);
    //         }
    //     });
    // });

    // ajax request to update student
    $(document).on("submit", "#frm-edit-student", function () {

        var postdata = $("#frm-edit-student").serialize();

        $.ajax({
            url: "/ajax-edit-student",
            data: postdata,
            type: "JSON",
            method: "post",
            success: function (response) {

                window.location.href = '/list-students'
            }
        });
    });

    // ajax request to delete student
    $(document).on("click", ".btn-delete-student", function () {

        if (confirm("Are you sure want to delete ?")) {

            var postdata = "student_id=" + $(this).attr("data-id");
            $.ajax({
                url: "/ajax-delete-student",
                data: postdata,
                type: "JSON",
                method: "post",
                success: function (response) {

                    window.location.href = '/list-students'
                }
            });
        }
    });
});