<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./products/index.html");
    exit;
}
 
// Include config file
require_once "./db/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: ./public/user/dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
           body {
    font-family: Arial, sans-serif;
    background-image: url('./media/client-bg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

wrapper {
    width: 360px;
    padding: 30px;
    border-radius: 20px;
    background-image: url('./media/client-bg.jpg'); /* Background image */
    background-size: cover;
    background-position: center;
}



.wrapper h2 {
    text-align: center;
    margin-bottom: 20px;
    color: white; /* Hard black text */
    font-weight: bold; /* Bold font */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Text shadow */
    text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black, 1px 1px 0 black;
    font-family: "RM Almanac", sans-serif; /* Apply RM Almanac font with a fallback to sans-serif */
}

        

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: white; /* Hard black text */
            font-weight: bold; /* Bold font */
            text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black, 1px 1px 0 black;
        }

        .form-control {

    font-weight: bold; /* Bold font */
    border-radius: 10px; /* Adjust the border radius as needed */
    background-color: rgba(255, 255, 255, 0.7); /* Opacity color */
}



        .btn-primary {
            background-color: orange; /* Blue button */
            font-weight: bold; /* Bold font */
        }

        .btn-primary:hover {
            background-color: orange; /* Darker blue on hover */
        
        }

        .alert {
            margin-top: 20px;
        }
        p {
    font-weight: bold;
    color: white;
    text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black, 1px 1px 0 black;
}


        a {
             font-weight: bold;
             color: orange;
             text-shadow: -1px -1px 0 black, 1px -1px 0 black, -1px 1px 0 black, 1px 1px 0 black;
        } 
        

    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Login" style="color: black;">
</div>

            <p>Don't have an account? <a href="./public/user/register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>