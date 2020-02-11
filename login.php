<?PHP
include_once("../homebuoy/html/php/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if(isset($_POST['email']) && isset($_POST['password'])){
        
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM user WHERE EMAIL = '$email' AND PASSWORD = '$password'";

        $result = mysqli_query($conn, $query);
        if($result->num_rows > 0){ //has record. correct username and password
        
            /* Redirect browser */
		    header('Refresh: 1; URL=dashboard.php');
		    
            echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta http-equiv="x-ua-compatible" content="ie=edge"><meta name="description" content=""><meta name="author" content=""><title>Neptune</title><link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="../vendor/themify-icons/themify-icons.css"><link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css"><link rel="stylesheet" href="css/core.css"></head><body class="img-cover" style="background-image: url(img/photos-1/2.jpg);"><div style="position: absolute;bottom: 0;width:100%;text-align: center;" class="alert alert-success-fill alert-dismissible fade in m-b-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong style="text-align: center;">Login success!</strong> Welcome back.</div><div class="container-fluid"><div class="sign-form"><div class="row"><div class="col-md-4 offset-md-4 p-x-3"><div class="box b-a-0"><div class="p-a-2 text-xs-center"><h5>Welcome</h5></div><form class="form-material m-b-1" method="post"><div class="form-group"><input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email"></div><div class="form-group"><input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password"></div><div class="form-group clearfix"><div class="pull-xs-right p-x-2 m-b-0"><a class="text-black font-90" href="reset_password.php">Forgot password?</a></div></div><div class="p-x-2 form-group m-b-0"><button type="submit" name="loginSubmit" class="btn btn-purple btn-block text-uppercase">Sign in</button></div></form><div class="p-a-2 text-xs-center text-muted">Don\'t have an account? <a class="text-black" href="register.php"><span class="underline">Sign up</span></a></div></div></div></div></div></div><script type="text/javascript" src="../vendor/jquery/jquery-1.12.3.min.js"></script><script type="text/javascript" src="../vendor/tether/js/tether.min.js"></script><script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script><script type="text/javascript" src="js/app.js"></script><script type="text/javascript" src="js/demo.js"></script><script type="text/javascript" src="js/ui-modal.js"></script></body></html>';
	

		    exit();

        }
        else{
			//echo "Wrong username and password"

			echo '<div style="position: absolute;
			bottom: 0;width:100%;text-align: center;" class="alert alert-danger-fill alert-dismissible fade in m-b-0" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
			</button>
			<strong style="text-align: center;">Oh snap! Wrong email or password.</strong> Try again.
		</div>';
            exit;
        }
    }

}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style type="text/css">
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            max-height: 100vh;
            height: auto;
        }

        /* Customize the label (the container) */
        .container {
            display: block;
            position: relative;
            padding-left: 25px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 14px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            border: 1px solid #F1592B;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #F1592B;
            border-radius: 5px;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #fff;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #F1592B;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 40%;
            top: 20%;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        ::-webkit-input-placeholder {
            /* Edge */
            color: white;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: white;
        }

        ::placeholder {
            color: white;
        }

        .getInTouch {
            border: none;
            border-bottom: 1px solid #575757;
            background-color: rgba(0, 0, 0, 0);
            color: 575757;
            outline: none;
            width: 70%;
            width: 70%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .getInTouch::placeholder {
            color: #575757;
        }

        .getInTouch::-webkit-input-placeholder {
            /* Edge */
            color: #575757;
        }

        .getInTouch:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #575757;
        }

        .footer-link {
            color: #FFFFFF;
            font-size: 16pt;
            outline: none;
            text-decoration: none;
        }

        .footer-link:hover {
            color: #FFFFFF;
            font-size: 16pt;
            outline: none;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid" style="margin: 0px;padding: 0px;">

        <div class="row">
            <div class="col-6" style="margin: 0%;padding: 0%;">
                <img src="./img/login/login_half.png" height="100%" width="100%" alt="">
            </div>

            <div class="col-6" style="margin: 0%;padding: 0%;">
                <img src="./img/login/login_bg.png" style="position: absolute;" height="100%" width="100%" alt="">

                <img src="./img/login/login_heading.png"
                    style="position: relative;margin-top: 5%;margin-left: 25%;margin-right: 25%;" width="50%" alt="">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="mx-auto" style="position: relative;">
                    <input class="getInTouch" type="text" name="email" placeholder="Your email"
                        style="width: 40%;min-width: 40%;margin-left: 30%;margin-right: 30%;margin-top: 5%;border-style: solid;border-width: 1px;border-radius: 5px;border-color: #F1592B;color: #F1592B;"><br>

                    <input class="getInTouch" type="password" name="password" placeholder="Password"
                        style="width: 40%;min-width: 40%;margin-left: 30%;margin-right: 30%;margin-top: 2%;border-style: solid;border-width: 1px;border-radius: 5px;border-color: #F1592B;color: #F1592B;"><br>

                    <div style="width: 40%;min-width: 40%;margin-left: 30%;margin-right: 30%;margin-top: 2%;">
                        <div class="float-left">
                            <label class="container" class="pull-left">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>


                        <div class="float-right">
                            <a href="" style="color: #F1592B;font-size: 14px;" class="float-right">Forgot password?</a>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                    <button href="" style="width:0%;margin-left: 40%;margin-right: 40%;">
                        <img src="./img/login/login_btn.png" width="20%" height="50px"
                            style="margin-top: 5%;" />
                    </button>
                </form>

                <div class="d-flex justify-content-center">
                    <p style="position: relative;margin-top: 2%;" class="mx-auto">
                        Don't have an account? <a href="register.html" style="color: #F1592B;font-size: 14px;">Click here</a> to register
                    </p>
                </div>



            </div>

        </div>
    </div>
    <!-- </div> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./img/https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="./img/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="./img/https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>