<?php
include('./header.php');
include('./links.php');
include('./connection.php');
// include('./restrict.php');
?>

<?php
if (isset($_GET['userupid'])) {
    $id = $_GET['userupid'];
    $query = "SELECT * FROM user WHERE id=$id";
    $res = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($res);

    $profile = $row['profile'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mobile = $row['mobile'];
    $email = $row['email'];
    $role = $row['role'];
    $username = $row['username'];
    $password = $row['password'];
}
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
                        <?php if (empty($profile)) : ?>
                            <img id="profilepic" style="width:150px;height:150px; object-fit:cover;border-radius: 15px;" src="images/admin.png">
            <?php else : ?>
                <img id="profilepic" style="width:150px;height:150px; object-fit:cover;border-radius: 15px" src="images/<?php echo $profile ?>">
            <?php endif ?>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="profile" class="form-label">Profile</label>
                                <input type="file" name="profile" class="form-control" id="profile" onchange="
                                document.getElementById('profilepic').src=window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>" placeholder="Enter First Name" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>" placeholder="Enter Last Name" autocomplete="off">

                            </div>
                            <div class="form-group col-md-6">
                                <label>Mobile Number</label>
                                <input type="int" name="mobile" maxlength="10" id="mobile" class="form-control" value="<?php echo $mobile; ?>"
                                placeholder="Enter Mobile Number" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Select Role</label>
                                <select name="role"  class="form-control">
                                <option value="Clerk" <?php if ($role == 'Clerk') echo "selected"; ?>>Clerk</option>
                            <option value="Manager" <?php if ($role == 'Manager') echo "selected"; ?>>Manager</option>
                            <option value="Admin" <?php if ($role == 'Admin') echo "selected"; ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Username</label>
                                <input type="username" name="username" id="username" class="form-control" value="<?php echo $username; ?>" placeholder="Enter Username">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Password">
                            </div>

                            <div class="form-group col-md-6">
                                <label> Confirm Password</label>
                                <input type="password" name="c_password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Confirm Password">
                            </div>
                        </div>



                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update">
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
if (isset($_POST['submit'])) {

    $e_fname = $_POST['fname'];
    $e_lname = $_POST['lname'];
    $e_mobile = $_POST['mobile'];
    $e_email = $_POST['email'];
    $e_role = $_POST['role'];
    $e_username = $_POST['username'];
    $e_password = $_POST['password'];
    $e_profile = $_FILES['profile']['name'];
    $e_tmp_name = $_FILES['profile']['tmp_name'];

    if (empty($e_profile)) {
        $e_profile = $profile;
    }

    $sql = "update user set fname='$e_fname', lname='$e_lname', mobile='$e_mobile', email= '$e_email', role= '$e_role', username= '$e_username', password= '$e_password', profile='$e_profile' WHERE id='$id'";
    $result = mysqli_query($connect, $sql);

    if ($result == true) {
        move_uploaded_file($e_tmp_name, "images/$e_profile");
        echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success!",
                    text: "Updated success!",
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
                    text: "Update Failed!",
                    icon: "error",
                  });
            });
            </script>';
    }
}
?>
</body>

</html>