<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
         body {
            background-color: black; /* Updated background color to black */
            color: orange; /* Set text color to orange */
        }

        .container {
            border: 2px solid #ffc107; /* Yellow border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 40px;
            margin-top: 50px; /* Add some space from the top */
        }

        .form-group {
            margin-bottom: 20px; /* Add space between form elements */
        }

        label {
            color: orange; /* Set label text color to orange */
        }

        .btn-primary, .btn-danger {
            padding: 10px 20px; /* Padding for buttons */
            font-size: 16px; /* Font size for buttons */
            border-radius: 5px; /* Rounded corners for buttons */
        }

        .btn-primary {
            background-color: #007bff; /* Blue button */
            border-color: #007bff; /* Blue button border */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Darker blue border on hover */
        }

        .btn-danger {
            background-color: #dc3545; /* Red button */
            border-color: #dc3545; /* Red button border */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130; /* Darker red border on hover */
        }
        .container {
            border: 2px solid #ffc107; /* Yellow border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Light shadow */
            padding: 40px;
            margin-top: 50px; /* Add some space from the top */
        }

        .form-group {
            margin-bottom: 20px; /* Add space between form elements */
        }

        label {
            color: orange; /* Set label text color to orange */
        }
        .nav-links {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

.nav-links li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 18px; /* Increased font size */
    transition: color 0.3s ease, box-shadow 0.3s ease; /* Added box-shadow transition */
    box-shadow: 20px 10px 30px rgba(255, 165, 0, 0); /* Initial box-shadow */
    border-radius: 15px;
}

.nav-links li a:hover {
    color: #ffcc00;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5); /* Box-shadow on hover */
}
nav {
    flex: 6;
    background-color: black;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 2px 5px orange(0, 0, 0, 0.1);
     border: 6px solid orange; 
    border-radius: 10px;
}

        .btn {
            padding: 10px 20px; /* Padding for buttons */
            font-size: 16px; /* Font size for buttons */
            border-radius: 5px; /* Rounded corners for buttons */
            color: orange; /* Set button text color to orange */
            border: 2px solid orange; /* Set button border color to orange */
            background-color: black; /* Set button background color to black */
        }

        .btn:hover {
            background-color: orange; /* Set button background color to orange on hover */
            color: black; /* Set button text color to black on hover */
        } .error {
            color: red; /* Error message color */
            font-size: 14px; /* Error message font size */
        }
        
    </style>
</head>
<body>
<nav>
        <div class="logo-container">
            <img src="../media/logoone.jpg" alt="Logo" style="max-width: 150px; margin-top: -10px;">
        </div>
                <ul class="nav-links">
                    <li><a href="../backups/logistic.php">logistics</a></li>
                    <li><a href="report.html">Report</a></li>
                </ul>
        <div style="text-align: center;">
            <a href="../public/user/reset.php" class="btn btn-warning" style="border-color: black;">Reset Password</a>
            <a href="../public/user/logout.php" class="btn btn-danger mr-3" style="border-color: black;">Log-out</a>
            <a href="../products/despay.php" class="btn btn-primary">Back to Products</a>
        </div>
</nav>
<div class="container mt-5">
    <h2>Thank You!</h2>
    <p>Your purchase was successful, and your address has been recorded.</p>
    
</div>
<div class="container">
    <div class="cool-background">
        <h2>Track Your Order</h2>
        <form id="trackingForm">
            <div class="form-group">
                <label for="orderCode">Order Code:</label>
                <input type="text" class="form-control" id="orderCode" required>
                <span class="error" id="orderCodeError"></span>
            </div>
            <button type="submit" class="btn btn-primary">Track</button>
            <button type="button" class="btn btn-danger" onclick="cancelTracking()">Cancel</button>
        </form>
        <div id="trackingInfo" style="display: none;">
            <h3>Delivery Information</h3>
            <p id="deliveryStatus"></p>
            <p id="estimatedDelivery"></p>
        </div>
    </div>
</div>


<div class="container">
    <div class="cool-background">
        <h2>Delivery Timeline</h2>
        <ul class="timeline">
            <!-- Your existing timeline content -->
            <!-- Example Delivery Event -->
            <li class="event">
                <div class="left-arrow"></div>
                <h3>Package Shipped</h3>
                <span class="time">May 25, 2024</span>
                <p>Your package has been shipped and is on its way.</p>
            </li>
        </ul>
    </div>
</div>

<script>
    function validateLogisticsForm() {
        var trackingNumber = document.getElementById('trackingNumber').value;
        var deliveryDate = document.getElementById('deliveryDate').value;

        var trackingNumberError = document.getElementById('trackingNumberError');
        var deliveryDateError = document.getElementById('deliveryDateError');

        var isValid = true;

        // Validation for Tracking Number
        if (trackingNumber.trim() === '') {
            trackingNumberError.textContent = 'Please enter the tracking number';
            isValid = false;
        } else {
            trackingNumberError.textContent = '';
        }

        // Validation for Delivery Date
        if (deliveryDate.trim() === '') {
            deliveryDateError.textContent = 'Please select the estimated delivery date';
            isValid = false;
        } else {
            deliveryDateError.textContent = '';
        }

        return isValid;
    }

    function cancelLogistics() {
        // Redirect to the previous page or perform any other cancel action
        window.history.back();
    }

    document.getElementById('logisticsForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        if (validateLogisticsForm()) {
            // If form is valid, you can perform further actions here, such as submitting data via AJAX
            alert('Logistics information submitted successfully!');
        }
    });
    function trackOrder() {
    var orderCode = document.getElementById('orderCode').value;
    var trackingInfo = document.getElementById('trackingInfo');
    var deliveryStatus = document.getElementById('deliveryStatus');
    var estimatedDelivery = document.getElementById('estimatedDelivery');

    // Predefined delivery information based on order code
    var deliveryData = {
        'ABC123': {
            status: 'Out for delivery',
            estimatedDelivery: 'May 28, 2024'
        },
        'XYZ456': {
            status: 'Delivered',
            estimatedDelivery: 'May 25, 2024'
        },
        // Add more order codes and delivery information as needed
    };

    if (deliveryData.hasOwnProperty(orderCode)) {
        var delivery = deliveryData[orderCode];
        trackingInfo.style.display = 'block';
        deliveryStatus.textContent = 'Delivery Status: ' + delivery.status;
        estimatedDelivery.textContent = 'Estimated Delivery Date: ' + delivery.estimatedDelivery;
    } else {
        // If order code is not found, display a message or handle it as per your requirement
        trackingInfo.style.display = 'none'; // Hide tracking info if order code is not found
        alert('Order not found. Please check your order code.');
    }
}


</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
