<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 shadow-sm" style="margin-top: 100px;">
                    <form id="form" action="" method="post" enctype="multipart/form-data">
                        <h3 class="text-center my-3">Register</h3>
                        <div class="text-center">
                            <img src="images/admin.png" height="100px" width="100px" id="profilepic" alt="">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="profile" class="form-label">Profile</label>
                                <input type="file" name="profile" class="form-control" id="profile" onchange="
                                document.getElementById('profilepic').src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" autocomplete="off">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Mobile Number</label>
                                <input type="int" name="mobile" maxlength="10" id="mobile" class="form-control" 
                                placeholder="Enter Mobile Number" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Select Role</label>
                                <select name="role" class="form-control">
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Clerk">Clerk</option>
                                        <option value="Manager">Manager</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Username</label>
                                <input type="username" name="username" id="username" class="form-control" placeholder="Enter Username">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            </div>

                            <div class="form-group col-md-6">
                                <label> Confirm Password</label>
                                <input type="password" name="c_password" class="form-control" placeholder="Enter Confirm Password">
                            </div>
                        </div>



                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-success btn-block" href="showuser.php">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="margin-top: 30px;"></div>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    role: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    username: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        rangelength: [9, 10],
                        number: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    c_password: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    first_name: 'Please enter first name.',
                    first_name: 'Please select role.',
                    email: {
                        required: 'Please enter Email Address.',
                        email: 'Please enter a valid Email Address.',
                    },
                    mobile: {
                        required: 'Please enter mobile number.',
                        rangelength: 'Mobile number should be 10 digit number.'
                    },
                    username: {
                        required: 'Please enter valid username.',
                    },
                    password: {
                        required: 'Please enter Password.',
                        minlength: 'Password must be at least 8 characters long.',
                    },
                    c_password: {
                        required: 'Please enter Confirm Password.',
                        equalTo: 'Confirm Password do not match with Password.',
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        jQuery.fn.ForceNumericOnly =
            function() {
                return this.each(function() {
                    $(this).keydown(function(e) {
                        var key = e.charCode || e.keyCode || 0;
                        return (
                            key == 8 ||
                            key == 9 ||
                            key == 13 ||
                            key == 46 ||
                            key == 110 ||
                            key == 190 ||
                            (key >= 35 && key <= 40) ||
                            (key >= 48 && key <= 57) ||
                            (key >= 96 && key <= 105));
                    });
                });
            };
        $("#mobile").ForceNumericOnly();
    </script>
    <?php
    if (isset($_POST["register"])) {

        $profile = $_FILES['profile']['name'];
        $tmp_name = $_FILES['profile']['tmp_name'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check_username = mysqli_num_rows(mysqli_query($connect, "SELECT username FROM user WHERE username='$username'"));
        if ($check_username > 0) {
            echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Error!",
                    text: "Username already exists!",
                    icon: "error",
                  });
            });
            </script>';
        } else {

            $query = "INSERT INTO user(profile,fname,lname,mobile,email,role,username,password)
            VALUES('$profile','$fname', '$lname', '$mobile', '$email','$role', '$username', '$password')";
            $res = mysqli_query($connect, $query);

            if ($res == true) {
                move_uploaded_file($tmp_name, "images/$profile");

                echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success!",
                    text: "Register successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 1500,
                  }).then(function() {
                    window.location = "showuser.php";
                });
            });
            </script>';
            } else {
                echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Error!",
                    text: "Register Failed!",
                    icon: "error",
                  });
            });
            </script>';
            }
        }
    }
    ?>
</body>

</html>