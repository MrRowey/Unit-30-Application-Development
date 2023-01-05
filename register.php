<?php
// Including the Config File
require_once "config.php";

// Definigns varaibles
$username = $password = $confirm_password = $role = "";
$username_err = $password_err = $confirm_password_err = $role_err = "";

$roleSQL = "SELECT ID, Type FROM role";
$roleResult = mysqli_query($link, $roleSQL);


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate Username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a Username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM accounts WHERE user = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
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
        $password_err = "Please enter a password.";
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

    // Validate Role Selected
    if(empty($_POST["role"])){
        $role_err = "Please Select a Role";
    } else {
        $role = trim($_POST["role"]);
    }

    // Check inputs befoer inserting into database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($role_err)){

        // Prepare inset stament
        $sql1 = "INSERT INTO accounts (user, password, role_id) VALUES (?,?,?)";

        if($stmt = mysqli_prepare($link,$sql1)){
            // Bining the varables to the statement
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_role);
            
            // Set paramters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Create a password hash
            $param_role = $role;

            // try to execute prepared stament
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
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
                                <div class="form-group">
                                    <label>Role:</label>    
                                    <select class="form-control" name="role" id="role">
                                        <option value="" selected disabled> Select Role </option>
                                        <option value="1" > Handler </option>
                                        <option value="2" > Manager </option>
                                    </select>
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