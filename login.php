<?php
// Start the session
session_start();

// checking if the user is allready logged into an account
//if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//    header("location: managerment/dashboard.php");
//    exit;
//}

// Add the DB config
require_once "config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";


// Dealing with incoming data from login
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter Your User ID";
    } else {
        $username = trim($_POST["username"]);
    }

    // check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your Password";
    }else{
        $password = trim($_POST["password"]);
    }

    // Validated Login Details
    if(empty($username_err) && empty($password_err)){
        // Select Staement
        $sql = "SELECT ID, userid, password, Role_ID FROM accounts WHERE userid = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Binding varalbles to the statment
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Seting the parameters
            $param_username = $username;

            // Atempt to run the statemnet
            if(mysqli_stmt_execute($stmt)){
                // Store the result of the statment
                mysqli_stmt_store_result($stmt);

                // Check if username exsists then check password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // binding the result Variabels
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct
                            // Start new session
                            session_start();

                            // store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["userid"] = $username;
                            $_SESSION["role_id"] = $role;

                            // redirect after login
                            if($role == 2){
                                header("location: management/dashboard.php");
                            } else {
                                header("location: handler/dashboard.php");
                            }
                        } else {
                            // password not vaild, error msg
                            $login_err = "Invailid Password.";
                        }
                    }
                } else {
                    // username dose not exsist, error msg
                    $login_err = "Invalid User ID";
                }
            } else {
                echo "Oops! Somthing when wrong. Please try again later.";
            }
            // close statment
            mysqli_stmt_close($stmt);
        }
    }
    // close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>NHS Management - Login</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/stylesheet.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">NHS Management Login</h1>
                                    </div>
                                    <?php
                                        if(!empty($login_err)){
                                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                        }
                                    ?>
                                    <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group">
                                            <label>User ID: </label>
                                            <input type="number" name="username" id="username" class="form-control form-control-user <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Password: </label>
                                            <input type="password" name="password" id="password" class="form-control form-control-user <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                            <span class="invalid-feedback"><?php echo $password_err ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Login">
                                        </div>
                                        <p>Accout Reg <a href="register.php"> here </a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>