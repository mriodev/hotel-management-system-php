<?php
session_start();
include("./links.php");
include("./connection.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,
    400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="userassets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="userassets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="userassets/css/style.css" rel="stylesheet">
</head>

<body>
    <!--  Header -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.php">Queensbury Hotels</a></h1>
            <nav id="navbar" class="navbar">
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <div style="margin-top: 100px;">
        <section id="login" class="services">
            <div class="container">
                <div class="col-md-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 shadow-sm">
                            <form id="form" method="post">
                                <h3 class="text-center">Login</h3>
                                <div class="form-group">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="username" name="username" id="username" class="form-control my-2" placeholder="Enter Username" autocomplete="off">
                                </div>
                                <div class="form-group">

                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                </div>
                                <br>
                                <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Services Section -->
    </div>

    <!--  Footer  -->
    <footer id="footer" style="margin-top: 143px;">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>2022</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by Ruzny
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="userassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="userassets/js/main.js"></script>
</body>
<style>
    .error {
        color: red;
    }
</style>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                username: {
                    required: true,
                    username: true
                },
                password: {
                    required: true,
                },
            },
            messages: {
                username: {
                    required: 'Please enter Username.',
                    username: 'Please enter a valid Username.',
                },
                password: {
                    required: 'Please enter Password.',
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "Select * FROM user WHERE username = '$username'";
    $res = mysqli_query($connect, $query);
    $user = mysqli_fetch_array($res);

    $id = $user['id'];
    $username1 = $user['username'];
    $usrpassword = $user['password'];
    $role = $user['role'];


   
    // if ($role == "Manager") {
        if ($username == $username1 && $password == $usrpassword) {
            $_SESSION['id'] = $id;

            if($role=="Manager"){
                $_SESSION['manuser'] = $username;
            }
            else if($role=="Admin"){
                $_SESSION['aduser'] = $username;
            }
            else if($role=="Clerk"){
                $_SESSION['cluser'] = $username;
            }
            
            echo '
            <script type="text/javascript">
            $(document).ready(function(){
                swal({
                    title: "Success!",
                    text: "Login successfully!",
                    icon: "success",
                    buttons: false,
                    timer: 1500,
                  }).then(function() {
                    window.location = "dashboard.php";
                });
            });
            </script>';
        } else {
            echo '
                    <script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            title: "Error!",
                            text: "Username or password wrong!",
                            icon: "error",
                          });
                    });
                    </script>';
        }
    
    
}
?>

</html>