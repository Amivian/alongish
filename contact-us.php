<?php
    require 'include/active-user.php';
    
    $obj = new User;

    $prop = new \admin\Property;
?>




<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Contact Us</title>
    <style>
        .wrapper {
            width: 715px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.05);
        }

        .wrapper header {
            font-size: 22px;
            font-weight: 600;
            padding: 20px 30px;
            border-bottom: 1px solid #ccc;
        }

        .wrapper form {
            margin: 35px 30px;
        }

        .wrapper form.disabled {
            pointer-events: none;
            opacity: 0.7;
        }

        form .dbl-field {
            display: flex;
            margin-bottom: 25px;
            justify-content: space-between;
        }

        .dbl-field .field {
            height: 50px;
            display: flex;
            position: relative;
            width: calc(100% / 2 - 13px);
        }

        .wrapper form i {
            position: absolute;
            top: 50%;
            left: 18px;
            color: #ccc;
            font-size: 17px;
            pointer-events: none;
            transform: translateY(-50%);
        }

        form .field input,
        form .message textarea {
            width: 100%;
            height: 100%;
            outline: none;
            padding: 0 18px 0 48px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .field input::placeholder,
        .message textarea::placeholder {
            color: #ccc;
        }

        .field input:focus,
        .message textarea:focus {
            padding-left: 47px;
            border: 2px solid #FF385C;
        }

        .field input:focus~i,
        .message textarea:focus~i {
            color: #FF385C;
        }

        form .message {
            position: relative;
        }

        form .message i {
            top: 30px;
            font-size: 20px;
        }

        form .message textarea {
            min-height: 130px;
            max-height: 230px;
            max-width: 100%;
            min-width: 100%;
            padding: 15px 20px 0 48px;
        }

        form .message textarea::-webkit-scrollbar {
            width: 0px;
        }

        .message textarea:focus {
            padding-top: 14px;
        }

        form .button-area {
            margin: 25px 0;
            display: flex;
            align-items: center;
        }

        .button-area button {
            color: #fff;
            border: none;
            outline: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            padding: 13px 25px;
            background: #FF385C;
            transition: background 0.3s ease;
        }

        .button-area button:hover {
            background: #FF385C;
        }

        .button-area h6 {
            font-size: 17px;
            margin-left: 30px;
            display: none;
        }

        @media (max-width: 600px) {
            .wrapper header {
                text-align: center;
            }

            .wrapper form {
                margin: 35px 20px;
            }

            form .dbl-field {
                flex-direction: column;
                margin-bottom: 0px;
            }

            form .dbl-field .field {
                width: 100%;
                height: 45px;
                margin-bottom: 20px;
            }

            form .message textarea {
                resize: none;
            }

            form .button-area {
                margin-top: 20px;
                flex-direction: column;
            }

            .button-area button {
                width: 100%;
                padding: 11px 0;
                font-size: 16px;
            }

            .button-area h6 {
                margin: 20px 0 0;
                text-align: center;
            }
        }
    </style>
    <?php
require('include/head.php');

?>

</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <div id="header">
                <?php
require('include/header002.php');
?>
            </div>


        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
    </div>
    </div>
    <!-- Header / End -->

    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Contact Us</h1>
                <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Contact Us</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION CONTACT US -->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="wrapper p-3 ">
                        <header>Contact Us</header>
                        <form action="#" class="contactus">
                            <div class="button-area mb-2">
                                <h6 class="message"></h6>
                            </div>
                            <div class="dbl-field">
                                <div class="field">
                                    <input type="text" name="name" placeholder="Enter your name">
                                    <i class='fas fa-user'></i>
                                </div>
                                <div class="field">
                                    <input type="text" name="email" placeholder="Enter your email">
                                    <i class='fas fa-envelope'></i>
                                </div>
                            </div>
                            <div class="dbl-field">
                                <div class="field">
                                    <input type="text" name="phone" placeholder="Enter your phone">
                                    <i class='fas fa-phone-alt'></i>
                                </div>
                            </div>
                            <div class="message">
                                <textarea placeholder="Write your message" name="message"></textarea>
                                <i class="material-icons">message</i>
                            </div>
                            <div class="button-area mb-2">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 bgc">
                    <div class="call-info">
                        <h3>Contact Details</h3>
                        <p class="mb-5">Please find below contact details and contact us today!</p>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p"> <a href=""
                                            style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">
                                            Federal Complex, Phase 1, Annex II</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p"><a href="tel:+2340908646633"
                                            style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">+2340908646633</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti"><a href="mailto:support@alongish.com"
                                            style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">support@alongish.com</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="info cll">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <p class="in-p ti"> <a href=""
                                            style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">8:00
                                            a.m - 9:00 p.m</a> </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT US -->
    <?php include "include/foot.php"?>
    
    <script src="js/jquery-3.5.1.min.js"></script>    
    <script src="js/contact.js"></script>
    <?php require('include/footer.php')?>