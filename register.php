<?php
// Including the Config File
require_once "config.php";

// Definigns varaibles
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate Username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a Username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores";
    } else {
        // Prepare a se;ect statement
        $sql = "SELECT id FROM web WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This usernmae is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close Statment
            mysqli_stmt_close($stmt);
        }
    }

    // Validate Password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please endter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Valide confirm passoword
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check inputs befoer inserting into database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare inset stament
        $sql = "INSERT INTO web (username, password_hash) VALUES (?,?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // set paratmerts
            $param_username = $username;
            // Creating the hashed password
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // try to execure prepared stament
            if(mysqli_stmt_execute($stmt)){
                // redirect to login page
                header("location: login.php");
            }else{
                echo "Oops! Somthing when wrong. Please try again later."; 
            }
            // Close statment
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NHS Management - Add User</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/stylesheet.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group" >
                                    <label>User ID:</label>
                                    <input type="number" name="username"eholder="Username" id="username" class="form-control form-control-user <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="password" class="form-control form-control-user <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                                    <span class="invalid-feedback"> <?php echo $password_err ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input type="password" name="confirm_password" class="form-control form-control-user <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                                    <span class="invalid-feedback"> <?php echo $confirm_password_err ?></span>
                                </div>
                                    <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>