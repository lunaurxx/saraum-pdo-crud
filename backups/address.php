<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Product Shop</title>
<link rel="stylesheet" href="./CSS Folder/payment.css">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="use.fontawesome.com/releases/v5.15.4/css/all.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="../product/CSS Folder/style.css">
<style>
body {
    font-family: 'Bombshell Pro ';
    background-image: url('../product/image/background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;  
    height: 130vh;
}

</style>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                  <img src="../product/image/logo.jpg" width="50px">
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="index.html">HOME</a></li>  
                        <li><a href="Customer.html">SERVICES</a></li>
                        <li><a href="reports.html">REPORTS</a></li>
                        <li><a>|</a></li>
                        <li>
                            <a href="Logistics.html" class="logistics-icon"><i class="fa fa-truck" aria-hidden="true"></i></a>
                           <a href="#" class="add-to-cart-button"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            
                        </li> 
                    </ul>   
                </nav>  
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
<div class="container">
    <h2 class="mt-5">Enter Your Address</h2>
    <form action="process_address.php" method="POST" onsubmit="return validateForm()">
        <!-- Add a hidden input field for user ID -->
        <input type="hidden" name="user_id" value="1"> <!-- Assuming logged in user has ID 1. Modify this based on your login system. -->
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" required>
            <span class="error" id="street_error"></span> <!-- Error message for street -->
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
            <span class="error" id="city_error"></span> <!-- Error message for city -->
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state">
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
            <span class="error" id="postal_code_error"></span> <!-- Error message for postal code -->
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country" name="country" required>
                <option value="">Select your country</option>
                <option value="USA">United States</option>
                <option value="UK">United Kingdom</option>
                <option value="CA">Canada</option>
                <option value="PHI">Philipppines</option>
            </select>
            <span class="error" id="country_error"></span> <!-- Error message for country -->
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="../products/despay.php" class="btn btn-danger mr-3" style="border-color: black;">Cancel</a>
    </form>
</div>

<script>
    function validateForm() {
        var street = document.getElementById('street').value;
        var city = document.getElementById('city').value;
        var postalCode = document.getElementById('postal_code').value;
        var country = document.getElementById('country').value;

        var streetError = document.getElementById('street_error');
        var cityError = document.getElementById('city_error');
        var postalCodeError = document.getElementById('postal_code_error');
        var countryError = document.getElementById('country_error');

        var isValid = true;

        // Validation for Street
        if (street.trim() === '') {
            streetError.textContent = 'Please enter your street';
            isValid = false;
        } else {
            streetError.textContent = '';
        }

        // Validation for City
        if (city.trim() === '') {
            cityError.textContent = 'Please enter your city';
            isValid = false;
        } else {
            cityError.textContent = '';
        }

        // Validation for Postal Code
        if (postalCode.trim() === '') {
            postalCodeError.textContent = 'Please enter your postal code';
            isValid = false;
        } else {
            postalCodeError.textContent = '';
        }

        // Validation for Country
        if (country.trim() === '') {
            countryError.textContent = 'Please select your country';
            isValid = false;
        } else {
            countryError.textContent = '';
        }

        return isValid;
    }
</script>
</body>
</html>