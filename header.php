<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

   
    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- my css file -->
    <link rel="stylesheet" href="mystyles.css">

    <!-- Required library for validation -->
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"> </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {

            $.validator.addMethod("phonevalidator", function(value, element) {
                return this.optional(element) || /^[0-9]{10}$/.test(value);
            });
            $.validator.addMethod("cityvalidator", function(value, element) {
                return this.optional(element) || /^[a-zA-Z]+$/.test(value);
            });
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param)
            });
            $.validator.addMethod("mailvalidator", function(value, element) {
                return this.optional(element) || /[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/.test(value);
            });

            $("form[id='mentor_record']").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        mailvalidator: true
                    },
                    mentor_email: {
                        required: true,
                        mailvalidator: true,
                        remote: {
                            url: "checkemail.php",
                            type: "post"
                        }
                    },
                    password: "required",
                    password_confirm: {
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: "Please enter your Name",
                    email: {
                        required: "Please enter your Email.",
                        mailvalidator: "Please enter a valid email address."
                    },
                    mentor_email: {
                        required: "Please enter your Email.",
                        mailvalidator: "Please enter a valid email address.",
                        remote: "Email already exists."
                    },
                    password: "Please enter your Password.",
                    password_confirm: {
                        equalTo: "Password did not match."
                    }

                },
                submitHandler: function(form) {
                    // alert("hey");
                    form.submit();
                },

            });

            $("#record").validate({
                rules: {
                    profilepic: {
                        filesize: 500000,
                        extension: "jpg,jpeg,png,gif"

                    },
                    fname: "required",
                    lname: "required",
                    student_email: {
                        required: true,
                        mailvalidator: true,
                        remote: {
                            url: "checkemail.php?id=<?php echo $_GET['id'] ?>",
                            type: "post"
                        }
                    },
                    phone: {
                        minlength: 10,
                        phonevalidator: true
                    },

                    qualification: {
                        required: true
                    },
                    city: {
                        cityvalidator: true
                    }
                },
                messages: {
                    profilepic: {
                        filesize: "File size must be less than 0.5 mb",
                        extension: "Only jpg / jpeg/ png /gif format allowed."
                    },
                    fname: "Please enter your First Name.",
                    lname: "Please enter your Last Name.",
                    student_email: {
                        required: "Please enter your Email.",
                        mailvalidator: "Please enter a valid email address.",
                        remote: "Email already in use."
                    },
                    phone: {
                        minlength: "Phone Number must be 10 digit.",
                        phonevalidator: "Not a valid Phone Number."
                    },
                    qualification: "Please select a Qualification.",
                    city: {
                        cityvalidator: "Not a valid City."
                    }
                },
                submitHandler: function(form) {
                    // alert("hey");
                    form.submit();
                },
            });

        });
    </script>


</head>

<body>
    <div class="header">
        <h1> STUDENT LISTING</h1>

    </div>