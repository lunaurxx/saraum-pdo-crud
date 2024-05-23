<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ./product/index.html");
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
                            header("location: ./product/index.html");
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
            background-image: url('./media/Nm.png'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .wrapper {
    width: 360px;
    padding: 30px;
    border-radius: 20px;
    background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent white background */
    background-size: cover;
    background-position: center;
    background-blend-mode: overlay; /* Blends the color with the background image */
}

        .wrapper h1 {
            margin-bottom: 20px;
            color:#cb997e;
            font-weight: bold; /* Bold font */
            font-family: "Arial Narrow";
            text-decoration: #cb997e;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: black; /* Hard black text */
            font-weight: normal;
            font-family: 'Arial Narrow';
        }

        .form-control {
            font-weight: bold; /* Bold font */
            border-radius: 10px; /* Adjust the border radius as needed */
            background-color: rgba(255, 255, 255, 0.7); /* Opacity color */
        }

        .btn-primary {
    background-color:  #cb997e;
    font-weight: bold; /* Bold font */
    border-radius: 10px; 
    width: calc(100% - 2px); /* Same width as text fields with padding */
    text-decoration: black;
    box-shadow: #cb997e;
}

.btn-primary:hover {
    background-color:  #ddbea5;
}


        .alert {
            margin-top: 20px;
        }

        p {
            color: black;
            font-family: 'Arial Narrow';
            font-weight: normal;
           
        }

        a {
            text-align: center;
            margin-bottom: 20px;
            color:#cb997e;
            font-weight: bold; /* Bold font */
            font-family: 'Arial Narrow';
            text-decoration: #cb997e;
            
        }
        h2 {

 color: black; /* Hard black text */
            font-weight: normal;
            font-family: 'Arial Narrow';
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label></label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label></label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="./public/user/register.php">Sign up now</a>.</p>
        </form>
    </div>    
</body>
</html>