<?php
    session_start();
    if(!isset($_SESSION['login_state']))
    {
        header('location:../index.php');
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bikelele</title>
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div class="maincont">
        <div class="nav-bar">
            <div class="nav-container">
                <div class="header">
                    <img src="../images/logo.png" class="logo">
                </div>
                <ul class="menu-item">
                    <li><i class="fas fa-home"></i> HOME</li>
                    <li><i class="fas fa-motorcycle"></i> ABOUT</li>
                    <li><i class="fas fa-map-marker-alt"></i> Greater Noida, India</li>
                    <li>
                        <?php
                        if(isset($_SESSION['login_state']))
                        {
                            echo '<div class="dropdown">
                                <button id="dropdownProfile" class="profile dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i>'. $_SESSION['username'] .'</button>

                                <ul class="dropdown-menu">
                                <li><a href="#">Account</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a onclick="logout();">Logout</a></li>
                                    
                                </ul>
                            </div>

                            ';
                        }
                       
                        ?>
                    </li>


                </ul>



            </div>
        </div>
        <div class="bike-cont">
            <h2>Checkout <img src="../images/bike-logo.png" class="bike-icon"></h2>
            <div class="form-container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="cart-container" id="cartParent">
                            <h4>Your Cart <i class="fas fa-shopping-cart"></i></h4>
                            <hr class="light">
                            <!-- <div class="cart-items">
                                <div class="cart-item-pic">
                                    <img src="../images/bike1.jpg">
                                </div>
                                <div class="cart-item-details">
                                    <h4>UM Renegade</h4>
                                    <p>Qty: 1</p>
                                    <br>
                                    <a href="#" class="remove small"><i class="fas fa-trash-alt"></i> Remove</a>
                                </div>
                            </div> -->
                        </div>
                        <div class="form-wrapper" style="margin-top: 20px; color: white;">
                            <i class="fas fa-rupee-sign"></i> Total : <span id="total"></span><br>
                            <i class="far fa-clock"></i>Hours Booked :<span id="duration"></span><br>
                            <i class="far fa-clock"></i>Number of Bikes Selected :<span id="bikecount"></span>
                        </div>
                    </div>
                    <div class="col-sm-8 user-details">
                        <h4>Your Details <i class="far fa-address-card"></i></h4>
                        <form>
                            <i class="fas fa-user-alt"></i>
                            <input type="text" id="userName"name="fname" class="txt-sml-2" placeholder="<?php echo $_SESSION['username']?>" style="color:black;" disabled required>
                            <!-- <input type="text" name="lname" placeholder="Last Name" class="txt-sml-2" style="color:black;" required><br> -->
                            <i class="fas fa-mobile"></i>
                            <input id="userMobile" type="text" placeholder="<?php echo $_SESSION['contactnumber']?>" name="mobno"  class="txt-sml-2" style="color:black;"  disabled required><br>
                            <i class="fas fa-envelope"></i>
                            <input id="userEmail" type="text" disabled required name="email" style="color:black;" placeholder="<?php echo $_SESSION['email']?>"
                                class="txt-sml-2">
                            <i class="fas fa-home"></i>
                            <input id="userAddress" type="text"  disabled required name="address" style="color:black;" placeholder="<?php echo $_SESSION['address']?>"
                                class="txt-sml-2">
                            <br>
                            <br>
                            <i class="fas fa-file-upload"></i> Upload Documents<br><br>
                            <div>
                                <div class="col-sm-3">
                                    <label>
                                        <div class="card">
                                            <i class="fas fa-address-card" style="color: #C6878F"></i>
                                            <br>
                                            Aadhar Card
                                        </div>
                                        <input type="file" name="aadhar" class="hidden">
                                    </label>
                                </div>
                                <div class="col-sm-3">
                                    <label>
                                        <div class="card">
                                            <i class="fas fa-id-badge" style="color: #33658A"></i>
                                            <br>
                                            Id Card
                                        </div>
                                        <input type="file" name="aadhar" class="hidden">
                                    </label>
                                </div>
                                <div class="col-sm-3">
                                    <label>
                                        <div class="card">
                                            <i class="fas fa-id-card" style="color: #392F5A"></i>
                                            <br>
                                            Driving Licence
                                        </div>
                                        <input type="file" name="aadhar" class="hidden">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <br><br>
                                <i class="fas fa-money-check-alt"></i> Payment Mode
                                <select class="txt-sml-2" id="paymentmode" required>
                                    <option value="cod">Cash On Pickup</option>
                                    <option value="card">Credit / Debit Cards</option>
                                    <option value="paytm">Paytm</option>
                                    <option value="upi">UPI</option>
                                </select>
                                <button class="btn-sml-2" type="button" onclick="placeOrder();">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

</html>
<script>
    orderDetails = JSON.parse(localStorage.orderDetails);
    console.log(orderDetails);
    fetchCartBikes=''
    async function loadCartData() {
        let bikeFetchIds = orderDetails.bikeIds.join(',');
        
        //console.log(bikeFetchIds);
        fetchCartBikes = await fetch("../backend_modules/api.php", {
            method: 'POST',
            body: `action=fetchSelectedBikes&&bikeIds=${bikeFetchIds}`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });
        fetchCartBikes=await fetchCartBikes.text();
        cartParent.innerHTML=fetchCartBikes;
        total.innerText=orderDetails.totalprice;
        duration.innerText=orderDetails.duration;
        userEmail.value=userEmail.placeholder;
        bikecount.innerText=orderDetails.bikeIds.length;
        userName.value=userName.placeholder;
        userMobile.value=userMobile.placeholder;
        userAddress.value=userAddress.placeholder;
       // console.log(fetchCartBikes);
    }
    async function placeOrder(){
        let bikeSelIds = orderDetails.bikeIds.join(',');
        
        response = await fetch("../backend_modules/api.php", {
            method: 'POST',
            body: `action=placeOrder&&bikeIds=${bikeSelIds}&&duration=${orderDetails.duration}&&pickupdate=${orderDetails.pickupdate}
            &&pickuptime=${orderDetails.pickuptime}&&amount=${orderDetails.totalprice}&&paymentmode=${paymentmode.value}`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });
        response= await response.text();
        if(response=='{status:success,msg:orderplaced}')
        {
            alert('Order Placed Successfully');
        }
        else {
            alert('Error:'+response)
        }

    }
    loadCartData();
    $('#dropdownProfile').click(
        function() {
            $('.dropdown-menu').toggle();
        }
    )
    function logout()
    {
        localStorage.clear();
        window.location.href='../backend_modules/logout.php';
    }
</script>