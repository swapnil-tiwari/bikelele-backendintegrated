<?php
    session_start();

    
?>

<!DOCTYPE html>
<html>
<script>
    if (window.location.href.split("auth=")[1] == 'false') {
        alert("Wrong Credentials!");
    }
</script>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bikelele</title>
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Francois+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="maincont">
        <div class="nav-bar">
            <div class="nav-container">
                <div class="header">
                    <img src="images/logo.png" class="logo">
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
                                <button class="profile dropdown-toggle" data-toggle="dropdown"><i class="fas fa-user"></i>'. $_SESSION['username'] .'</button>

                                <ul class="dropdown-menu">
                                <li><a href="#">Account</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a onclick="logout();">Logout</a></li>
                                    
                                </ul>
                            </div>

                            ';
                        }
                        else
                        {
                            echo '<a data-toggle="modal" data-target="#login" class="login-tab"><i class="fas fa-lock"></i>Login</a>';
                        }
                        ?>
                    </li>


                </ul>


            </div>
        </div>
        <div class="bike-cont">
            <h2>Bikes <img src="images/bike-logo.png" class="bike-icon"></h2>
            <div class="filter-cont">
                <button class="active">
                    <div class="filter">
                        <div class="filter-icon">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        <div class="filter-text">
                            Available
                        </div>
                    </div>
                </button>
                <button>
                    <div class="filter">
                        <div class="filter-icon">
                            <i class="fas fa-stream"></i>
                        </div>
                        <div class="filter-text">
                            All
                        </div>
                    </div>
                </button>
                <button>
                    <div class="filter">
                        <div class="filter-icon">
                            <img src="images/cruise.png">
                        </div>
                        <div class="filter-text">
                            Cruise
                        </div>
                    </div>
                </button>
                <button>
                    <div class="filter">
                        <div class="filter-icon">
                            <img src="images/sports.png">
                        </div>
                        <div class="filter-text">
                            Sports
                        </div>
                    </div>
                </button>
                <button>
                    <div class="filter">
                        <div class="filter-icon">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <div class="filter-text">
                            Street
                        </div>
                    </div>
                </button>
            </div>
            <div class="bikes col-sm-12" id="bikesParent">
                <!-- <div class="bike-item col-sm-3">
                    <div class="bike-img">
                        <img src="images/bike1.jpg">
                    </div>
                    <div class="bike-details">
                        <code>Bike Id="#f2414f"</code>
                        <h4>UM Renegade</h4>
                        <p>Rs 240 / Hr | Min 3 Hours</p>
                        <button class="add-to-cart" data-bikeid="#f2414f"><i class="fas fa-cart-plus"></i> Add To
                            Cart</button>
                    </div>
                </div>
                <div class="bike-item col-sm-3">
                    <div class="bike-img">
                        <img src="images/bike1.jpg">
                    </div>
                    <div class="bike-details">
                        <code>Bike Id="#f2424f"</code>
                        <h4>UM Renegade</h4>
                        <p>Rs 240 / Hr | Min 3 Hours</p>
                        <button class="add-to-cart" data-bikeid="#f2424f"><i class="fas fa-cart-plus"></i> Add To
                            Cart</button>
                    </div>
                </div>
                <div class="bike-item col-sm-3">
                    <div class="bike-img">
                        <img src="images/bike1.jpg">
                    </div>
                    <div class="bike-details">
                        <code>Bike Id="#f2434f"</code>
                        <h4>UM Renegade</h4>
                        <p>Rs 240 / Hr | Min 3 Hours</p>
                        <button class="add-to-cart" data-bikeid="#f2434f"><i class="fas fa-cart-plus"></i> Add To
                            Cart</button>
                    </div>
                </div>
                <div class="bike-item col-sm-3">
                    <div class="bike-img">
                        <img src="images/bike1.jpg">
                    </div>
                    <div class="bike-details">
                        <code>Bike Id="#f2494f"</code>
                        <h4>UM Renegade</h4>
                        <p>Rs 240 / Hr | Min 3 Hours</p>
                        <button class="add-to-cart" data-bikeid="#f2494f"><i class="fas fa-cart-plus"></i> Add To
                            Cart</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="cart-sml" style='display:none;'>
        <button class="drag"><i class="fas fa-minus"></i></button>
        <div class="cart-items">
            <div class="cart-item-pic">
                <img src="images/bike1.jpg">
            </div>
            <div class="cart-item-details">
                <h4>UM Renegade</h4>
                <p>Qty: 1</p>
                <br>
                <a href="#" class="remove small"><i class="fas fa-trash-alt"></i> Remove</a>
            </div>
        </div>
    </div>
    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                <div class="login-window-cont">
                    <div class="login-header">
                        <div class="custom-nav-login">
                            <ul class="cust-ul">
                                <li class="active" id="signin"><a href="#">Sign In</a></li>
                                <li id="signup"><a href="#">Sign Up </a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="signup-form">
                        <form action="./backend_modules/api.php" method="post">
                            <input type="text" placeholder="Username" class="txt-sml-2" name="name" required>

                            <input type="email" placeholder="Email" class="txt-sml-2" name="email" required>

                            <input type="number" placeholder="Contact Nubmber" class="txt-sml-2" name="cno" required>

                            <input type="password" placeholder="Password" class="txt-sml-2" name="pass" required>

                            <input type="text" placeholder="Address" class="txt-sml-2" name="address" required>


                            <button class="login-button" name="user_signup">Sign Up</button>

                        </form>
                    </div>
                    <div class="login-form">
                        <form action="./backend_modules/api.php" method="post">
                            <input type="text" placeholder="Email" class="txt-sml-2" name="email" required>
                            <br>
                            <input type="password" placeholder="Password" class="txt-sml-2" name="pass" required>
                            <br>
                            <span><input type="checkbox" name="keep-signin" id="keep-sigin"> Keep me Signed In</span>
                            <br>
                            <button class="login-button" name="user_login">Sign In</button>

                        </form>
                        <hr>
                        <br>
                        <p style="text-align:center; color:white;"><a class="forgot-pass" href="#">Forgot Your
                                Password?</a></p>
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
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.js">
</script>
<script type="text/javascript">
    $("#signin").click(function () {
        $('.login-form').css("display", "block");
        $('.signup-form').css("display", "none");
        $(this).addClass('active');
        $("#signup").removeClass('active');

    });
    $("#signup").click(function () {
        $('.login-form').css("display", "none");
        $('.signup-form').css("display", "block");
        $(this).addClass('active');
        $("#signin").removeClass('active');

    });
</script>

<script type="text/javascript">
    var selected_bikes = [];

    function addCartButtonAction() {

        let bike = $(this).data('bikeid');
        let price=$(this).data('price');
        let bname=$(this).data('bname');
        selected_bikes.push(bike);
        $('.maincont').animate({
            width: '75%'
        }, "fast");
        if ($('.cart').length) {
            $('.cart-item-list').append(`
            <div class="cart-items">
                <div class="cart-item-pic">
                    <img src="images/bike1.jpg">
                </div>
                <div class="cart-item-details">
                <code>Bike Id:${bike}</code>
                    <h4>${bname}</h4>

                    <p>Qty: 1</p>
                    <br>
                    <a href="#" id="remove-item" class="remove small" data-bikeid="${bike}" data-price="${price}"><i class="fas fa-trash-alt"></i> Remove</a>
                </div>
            </div>`);

            var prev_price = parseInt($('#total').text());
            var new_price = prev_price + price;
            $('#total').empty();
            $('#total').append(new_price);


        } else {
            $('body').append(`<div class='cart'>
                <div style="display:grid; grid-template-columns:1fr 1fr; grid-auto-flow:columns;"><h4><i style="margin-left:0px;margin-right:10px;" class="fas fa-shopping-cart"></i>Your Cart </h4>
                <?php
              if(isset($_SESSION['login_state']))
                {
                   echo '<h4>'.$_SESSION['username'].'</h4>';
                }
                
                
                ?>
                </div>
                <hr class="light">
                
                <div class="cart-item-list">
                
                </div>

            <hr>


            <form>

             <div class="subtotal">

                <div class="form-wrapper">
                
                    <i class="fas fa-calendar"></i>
                    

                    
                    <input type="text" class="txt-sml date-input" placeholder="Pickup Date" id="pickupdate" required>
                    

                    <br>
                    
                    <i class="fas fa-clock"></i>
                        
                        <input type="text" class="txt-sml time" placeholder="Pickup Time" id="pickuptime" required>
                        
                    
                    <br>
                    <i class="fas fa-stopwatch"></i>
                    <input type= "number" class=" txt-sml" placeholder="Duration Required" id="duration" required>
                 </div>

                <h4>Total :  <i class="fas fa-rupee-sign"></i> <span id="total"></span></h4> 

                <?php 
                    if(!isset($_SESSION['login_state']))
                    {
                       echo '<button class="checkout" data-toggle="modal" data-target="#login" type="button"><i class="fas fa-cash-register"></i> Checkout </button>';
                
                    }
                    else
                    {
                        echo '<button class="checkout" type="button" onclick="checkoutAction();"><i class="fas fa-cash-register"></i> Checkout </button>';
                
                    }

                ?>
                
             </div>
            </form>

            </div>`);

            $('.cart-item-list').append(`
            <div class="cart-items">
                <div class="cart-item-pic">
                    <img src="images/bike1.jpg">
                </div>
                <div class="cart-item-details">
                    <code>Bike Id:${bike}</code>
                    <h4>${bname}</h4>

                    <p>Qty: 1</p>
                    <br>
                    <a href="#" class="remove small" data-bikeid="${bike}" id="remove-item" data-price="${price}"><i class="fas fa-trash-alt"></i> Remove</a>
                </div>
            </div>`);
            $('#total').append(price);

        }

    }
   // $('.add-to-cart').click(addCartButtonAction);

    $('body').on('focus', ".date-input", function () {
        $(this).datepicker({
            todayBtn: true,
            daysOfWeekDisabled: "0,6",
            todayHighlight: true
        });
    });
    $('body').on('focus', ".time", function () {
        $(this).clockpicker({
            donetext: 'DONE',
        });
    });

    $('body').on("click", '.remove', function () {

        remove_key = $(this).data('bikeid');
        let price=$(this).data('price');
        let index=selected_bikes.indexOf(remove_key);
        selected_bikes.splice(index,1);

        $(this).parent().parent('.cart-items').remove();
        var prev_price = parseInt($('#total').text());
        var new_price = prev_price - price;
        $('#total').empty();
        $('#total').append(new_price);
        if (new_price == 0) {
            $('.cart').remove();
            $('.maincont').animate({
                width: '100%'
            }, "fast");
        }
    });

    // $("#login").modal()
    var orderDetails = {}
    $('.drag').click(function () {
        if ($('.cart-sml').height() < 50) {
            $('.cart-sml').height("90vh");
        } else {
            $('.cart-sml').height(15);
        }

    });

    function setLocal(obj) {
        obj.bikeIds = selected_bikes;
        obj.pickupdate = pickupdate.value;
        obj.pickuptime = pickuptime.value;
        obj.duration = duration.value;
        obj.totalprice = total.innerText;

        localStorage.setItem('orderDetails', JSON.stringify(obj));
    }

    function checkoutAction() {
        setLocal(orderDetails);
        window.location.href = `./pages/checkout.php?userlogin=true`;

    }
    async function loadBikes() {
        fetchAllBikes = await fetch("./backend_modules/api.php", {
            method: 'POST',
            body: `action=fetchAllBikes`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        });
        fetchAllBikes = await fetchAllBikes.text();
        //console.log(fetchAllBikes);
        bikesParent.innerHTML += fetchAllBikes;
    }
    loadBikes();
    function logout()
    {
        localStorage.clear();
        window.location.href='./backend_modules/logout.php';
    }
</script>

</html>