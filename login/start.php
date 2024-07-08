<?php
// Create connection
require_once "../administration/configuration/config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<!doctype html>
<html>

<head>
    <title>Sign into Homewire.app | <?php echo date('Y'); ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="../app/css/general-styles.css">
    <link rel="stylesheet" href="../app/css/login-page-styles.css">
    <script src="https://kit.fontawesome.com/a2763a58b1.js"></script>
</head>

<body class="m-0 p-0 color-switch" id="login-page-body">
    <!-- Modal -->
    <!--User Sign In-->
    <div class="modal fade shadow" id="signin-modal" tabindex="-1" role="dialog" aria-labelledby="signin-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bg-" role="document">
            <div class="modal-content text-white shadow-lg color-switch" style="border-radius: 25px 25px 0 25px; background: rgb(28,105,99)" id="signin-modal-card">
                <div class="fixed-ld-logo-mesh-div-bg titles">
                    <div class="modal-header border-0">
                        <h2 class="modal-title titles" id="signin-modal-title">Homewire.app&trade; | Client Sign In</h2>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form class="mt-4 px-4 py-2 shadow-lg" style="border-radius: 25px">
                            <div class="form-group">
                                <label for="login-username" class="form-label">User ID/Email</label>
                                <input type="text" class="form-control rounded-pill" id="login-username" />
                            </div>
                            <div class="form-group">
                                <label for="login-username" class="form-label">Password</label>
                                <input type="text" class="form-control rounded-pill" id="login-username" />
                            </div>
                            <a class="text-decoration-none text-white">Forgot Password?</a>
                        </form>
                        <button type="button" class="btn btn-block bg-white shadow-lg rounded-pill my-4 py-3 titles" id="sign-in-btn">Sign In <span class="fas fa-arrow-right"></span></button>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-danger rounded-pill shadow" data-dismiss="modal"><span class="fas fa-times"></span> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--User Registration-->
    <div class="modal fade shadow" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered bg-" role="document">
            <div class="modal-content text-white shadow-lg color-switch" style="border-radius: 25px 25px 0 25px; background: rgb(28,105,99)" id="signup-modal-card">
                <div class="fixed-ld-logo-mesh-div-bg titles">
                    <div class="modal-header border-0">
                        <h2 class="modal-title titles" id="signup-modal-title">Homewire.app&trade; | Client Sign Up
                            (Registration)</h2>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form class="mt-4 px-4 py-2 shadow-lg" style="border-radius: 25px">
                            <div class="form-group">
                                <label for="signup-form-names">Your Name and Surname</label>
                                <input type="text" class="form-control rounded-pill" id="signup-form-names" placeholder="Name & Surname">
                            </div>
                            <div class="form-group">
                                <label for="signup-form-email">Your Email address</label>
                                <input type="email" class="form-control rounded-pill" id="signup-form-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="signup-form-phone">Your Contact Number</label>
                                <input type="phone" class="form-control rounded-pill" id="signup-form-phone" placeholder="Phone number">
                            </div>

                            <div class="form-group">
                                <label for="signup-form-password">Your New Password</label>
                                <input type="password" class="form-control rounded-pill" id="signup-form-password" placeholder="Create a password">
                            </div>

                            <div class="form-group">
                                <label for="signup-form-conf-password">Please Confirm your Password</label>
                                <input type="password" class="form-control rounded-pill" id="signup-form-conf-password" placeholder="Repeat the password above">
                            </div>

                            <!--<button class="btn rounded-pill btn-block product-card-buttons shadow-lg mb-4" id="signup-form-btn-submit"> Send</button>-->
                        </form>
                        <button type="button" class="btn btn-block bg-white shadow-lg rounded-pill my-4 py-3 titles" id="sign-in-btn"><span class="fas fa-file-signature"></span> Sign In <span class="fas fa-arrow-right"></span></button>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-danger rounded-pill shadow" data-dismiss="modal"><span class="fas fa-times"></span> Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="fixed-lw-logo-mesh-div-bg" style="min-height: 100vh">
        <div class="container-fluid m-0 p-0" id="login-page-top-container">
            <div class="h-100">
                <div class="row align-items-start">
                    <div class="col-md-4 p-4 mx-4 text-center">
                        <div class="text-center text-white">
                            <img id="home-page-logo" src="../app/media/general/icons/simple-brand-banner-bgtransp.png" alt="logo" class="img-fluid color-switch shadow my-4" style="heightz: 20vh;width: auto;border-radius: 25px;background: rgb(28,105,99)">
                        </div>
                        <button class="btn btn-light btn-block rounded-pill titles mb-4 p-4 shadow" style="font-size: 2vh" type="button" data-toggle="modal" data-target="#signin-modal">
                            <span class="fas fa-sign-in-alt"></span> Sign In
                        </button>
                        <button class="btn btn-light btn-block rounded-pill titles mt-4 p-4 shadow" style="font-size: 2vh" type="button" data-toggle="modal" data-target="#signup-modal">
                            <span class="fas fa-file-signature"></span> Sign Up
                        </button>
                    </div>
                    <div class="col p-4 m-4 color-switch" id="login-page-signup-msg">
                        <h1 class="titles">No need to stress about an account yet, just create one when you are ready!!!
                            <span class="fas fa-thumbs-up"></span>
                        </h1>
                        <p style="font-sizez: 50px">

                            You can explore our platform freely and benefit from our
                            online shopping experience and our social community tools and other resources. <br>
                            Get affordable products suited to your pocket and get them delivered to you.
                            On Homewire.app, you have the power to <strong>Inspire and get inspired</strong>.
                        </p>
                        <p class="titles text-right" style="font-size: 10px">- Homewire.app &copy; Adaptiv Media Concept
                            2021</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid m-0 p-0" id="login-page-bottom-container">
            <div class="m-0 p-0" style="width: 100%; heightz: 50vh!important;overflow: hidden">
                <div class="row align-items-end">
                    <div class="col" id="card-app" style="background: rgb(28,105,99); height: 100%">
                        <div class="fixed-lw-logo-mesh-div-bg h-100 m-0">
                            <div class="text-center text-white shadow p-4 m-4" style="backgroundz: rgb(28,105,99); border-radius: 25px">
                                <p class="titles text-left m-0 text-right" style="font-size: 20px">Homewire.app&trade;
                                </p>
                                <hr class="bg-white">
                                <h1 class="titles text-left m-0 h-links text-truncate" id="login-nav-to-app">.app<span class="fas fa-hand-pointer" style="font-size: 10px!important;transform: rotate(-40deg)"></span></h1>
                                <img src="../app/media/general/icons/icon-logo.png" class="img-fluid" alt="Loading">
                                <p class="p-0 m-0" style="font-size: 4px">Homewire.app&trade; &copy; Adaptiv Media
                                    Concept 2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="col" id="card-store" style="background: #E43D40; height: 100%;">
                        <div class="fixed-lw-logo-mesh-div-bg h-100 m-0 p-0">
                            <div class="text-center text-white shadow p-4 m-4" style="backgroundz: #E43D40; border-radius: 25px">
                                <p class="titles text-left m-0 text-right" style="font-size: 20px">Homewire.app&trade;
                                </p>
                                <hr style="background: white;">
                                <h1 class="titles text-left m-0 h-links text-truncate" id="login-nav-to-store">
                                    .Store<span class="fas fa-hand-pointer" style="font-size: 10px!important;transform: rotate(-40deg)"></span></h1>
                                <img src="../app/media/general/icons/icon-logo.png" class="img-fluid" alt="Loading">
                                <p class="p-0 m-0" style="font-size: 4px">Homewire.app&trade; &copy; Adaptiv Media
                                    Concept 2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="col" id="card-social" style="background: #D3C02F; height: 100%">
                        <div class="fixed-lg-logo-mesh-div-bg h-100 m-0">
                            <div class="text-center shadow p-4 m-4" style="backgroundz: #D3C02F; border-radius: 25px; color: #104210;">
                                <p class="titles text-left m-0 text-right" style="font-size: 20px">Homewire.app&trade;
                                </p>
                                <hr style="background: white;">
                                <h1 class="titles text-left m-0 h-links text-truncate" id="login-nav-to-social">
                                    .Social<span class="fas fa-hand-pointer" style="font-size: 10px!important;transform: rotate(-40deg)"></span></h1>
                                <img src="../app/media/general/icons/icon-logo.png" class="img-fluid" alt="Loading">
                                <p class="p-0 m-0" style="font-size: 4px">Homewire.app&trade; &copy; Adaptiv Media
                                    Concept 2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="col" id="card-blog" style="background: orange; height: 100%">
                        <div class="fixed-ld-logo-mesh-div-bg h-100 m-0">
                            <div class="text-center shadow p-4 m-4" style="backgroundz: orange; border-radius: 25px">
                                <p class="titles text-left m-0 text-right" style="font-size: 20px; color: #202020">
                                    Homewire.app&trade;</p>
                                <hr style="background: white;">
                                <h1 class="titles text-left m-0 h-links text-truncate" id="login-nav-to-blog">.Blog<span class="fas fa-hand-pointer" style="font-size: 10px!important;transform: rotate(-40deg)"></span></h1>
                                <img src="../app/media/general/icons/icon-logo.png" class="img-fluid" alt="Loading">
                                <p class="p-0 m-0" style="font-size: 4px; color: #202020">Homewire.app&trade; &copy;
                                    Adaptiv Media Concept 2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="col" id="card-admarket" style="background: #202020; min-height: 100%">
                        <div class="fixed-lp-logo-mesh-div-bg h-100 m-0">
                            <div class="text-center text-white shadow-lg p-4 m-4" style="backgroundz: #202020; border-radius: 25px">
                                <p class="titles text-left m-0 text-right" style="font-size: 20px; color: rebeccapurple">Homewire.app&trade;</p>
                                <hr style="background: white;">
                                <h1 class="titles text-left m-0 h-links text-truncate" id="login-nav-to-admarket">
                                    .adMarket<span class="fas fa-hand-pointer" style="font-size: 10px!important;transform: rotate(-40deg)"></span></h1>
                                <img src="../app/media/general/icons/icon-logo.png" class="img-fluid" alt="Loading">
                                <p class="p-0 m-0" style="font-size: 4px;">Homewire.app&trade; &copy; Adaptiv Media
                                    Concept 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('login-nav-to-app').addEventListener("click", function() {
            window.location.href = "../app/activities/app.html";
        });
        document.getElementById('login-nav-to-store').addEventListener("click", function() {
            window.location.href = "../app/activities/store.html";
        });
        document.getElementById('login-nav-to-social').addEventListener("click", function() {
            window.location.href = "../app/activities/social.html";
        });
        document.getElementById('login-nav-to-blog').addEventListener("click", function() {
            window.location.href = "../app/activities/blog.html";
        });
        document.getElementById('login-nav-to-admarket').addEventListener("click", function() {
            window.location.href = "../app/activities/admarket.html";
        });

        var colorSwitchTimer = window.setInterval(switchColor, 5000);
        var bgColorContainer = document.getElementById('login-page-body');
        var cycleCount = 0;
        var bgColorCode = "";

        function switchColor(hoverCardNumber) {
            cycleCount += 1;

            if (cycleCount == 1) {
                //provide color and then reset the count
                bgColorContainer.style.background = "rgb(28,105,99)";
                document.getElementById('home-page-logo').style.background = "rgb(28,105,99)";
                document.getElementById('login-page-signup-msg').style.color = "#fff";
                document.getElementById('signin-modal-card').style.background = "rgb(28,105,99)";
                document.getElementById('signup-modal-card').style.background = "rgb(28,105,99)";
                document.getElementById('login-nav-to-app').style.fontSize = "7vh";
                document.getElementById('login-nav-to-store').style.fontSize = "40px";
                document.getElementById('login-nav-to-social').style.fontSize = "40px";
                document.getElementById('login-nav-to-blog').style.fontSize = "40px";
                document.getElementById('login-nav-to-admarket').style.fontSize = "40px";
            } else if (cycleCount == 2) {
                //provide color and then reset the count
                bgColorContainer.style.background = "#E43D40";
                document.getElementById('home-page-logo').style.background = "#E43D40";
                document.getElementById('login-page-signup-msg').style.color = "#fff";
                document.getElementById('signin-modal-card').style.background = "#E43D40";
                document.getElementById('signup-modal-card').style.background = "#E43D40";
                document.getElementById('login-nav-to-app').style.fontSize = "40px";
                document.getElementById('login-nav-to-store').style.fontSize = "7vh";
                document.getElementById('login-nav-to-social').style.fontSize = "40px";
                document.getElementById('login-nav-to-blog').style.fontSize = "40px";
                document.getElementById('login-nav-to-admarket').style.fontSize = "40px";
            } else if (cycleCount == 3) {
                //provide color and then reset the count
                bgColorContainer.style.background = "#D3C02F";
                document.getElementById('home-page-logo').style.background = "#104210";
                document.getElementById('login-page-signup-msg').style.color = "#104210";
                document.getElementById('signin-modal-card').style.background = "#D3C02F";
                document.getElementById('signup-modal-card').style.background = "#D3C02F";
                document.getElementById('login-nav-to-app').style.fontSize = "40px";
                document.getElementById('login-nav-to-store').style.fontSize = "40px";
                document.getElementById('login-nav-to-social').style.fontSize = "6vh";
                document.getElementById('login-nav-to-blog').style.fontSize = "40px";
                document.getElementById('login-nav-to-admarket').style.fontSize = "40px";
            } else if (cycleCount == 4) {
                //provide color and then reset the count
                bgColorContainer.style.background = "orange";
                document.getElementById('home-page-logo').style.background = "#202020";
                document.getElementById('login-page-signup-msg').style.color = "#202020";
                document.getElementById('signin-modal-card').style.background = "orange";
                document.getElementById('signup-modal-card').style.background = "orange";
                document.getElementById('login-nav-to-app').style.fontSize = "40px";
                document.getElementById('login-nav-to-store').style.fontSize = "40px";
                document.getElementById('login-nav-to-social').style.fontSize = "40px";
                document.getElementById('login-nav-to-blog').style.fontSize = "7vh";
                document.getElementById('login-nav-to-admarket').style.fontSize = "40px";
            } else if (cycleCount == 5) {
                //provide color and then reset the count
                bgColorContainer.style.background = "#202020";
                document.getElementById('home-page-logo').style.background = "#663399";
                document.getElementById('login-page-signup-msg').style.color = "#663399";
                //document.getElementById('login-page-signup-msg').style.borderRadius = "25px";
                document.getElementById('signin-modal-card').style.background = "#663399";
                document.getElementById('signup-modal-card').style.background = "#663399";
                document.getElementById('login-nav-to-app').style.fontSize = "40px";
                document.getElementById('login-nav-to-store').style.fontSize = "40px";
                document.getElementById('login-nav-to-social').style.fontSize = "40px";
                document.getElementById('login-nav-to-blog').style.fontSize = "40px";
                document.getElementById('login-nav-to-admarket').style.fontSize = "5vh";
                cycleCount = 0;
            }
        }

        //auto-pass
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
</body>

</html>