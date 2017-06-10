<?php
if(isset($_POST['email'])) {
    
    // CHANGE THE TWO LINES BELOW
    $email_to = "jayp11505@gmail.com";
    
    $email_subject = "Rhien Centennial Comment Form";
    
    
    function died($error) {
        // your error code can go here
        echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');        
    }
    
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
      $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
      $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
      $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
      $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
      died($error_message);
  }
    $email_message = "Form details below.\n\n";
    
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
    
    
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- place your own success html below -->

Thank you for contacting us. We will be in touch with you very soon.

<?php
}
die();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPINA RECORDS</title>
    
    <link rel="icon" type="image/png" href="img/favicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Carter+One|Open+Sans" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        body, .navbar-custom, .navbar-custom.top-nav-collapse {
            background-color: black;
            font-family: 'Open Sans', sans-serif;
            color: #f1c137;
        }
        .btn-default {
            border: 1px solid #ffffff;
            color: #f1c137;
        }
        .btn-default:hover, .btn-default:focus{
            border: 1px solid #ffffff;
            background-color: #f1c137;
            color: white;
        }
        a {
            color: #f1c137;
        }
        a:hover {
           color: lightgrey;
        }
        h1,h2, h3, h4, h5, h6, a#cursive {
            font-family: 'Carter One', cursive;
            text-transform: none;
        }
        .btn {
            font-family: 'Open Sans', sans-serif;
        }
        span.large {
            font-size: xx-large;
            text-align: center;
        }
        * {
            color: #f1c137;
        }
        i:hover, i:focus {
            color: white;
        }
        div.border {
            border: 2px solid #ffffff;
            padding: 100px;
            border-image: url(img/border.png);
            border-image-slice: 100;
            border-image-width: 50px;
            background-color: black;
        }
        @media screen and (max-width: 768px) {
            div.border{
                padding: 50px;
            }
        }
        .faq-section {
            width: 100%;
            padding: 50px 0;
            color: white;
            background: url(img/downloads-bg.jpg) no-repeat center center scroll;
            background-color: black;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        a.navbar-brand, .navbar-header {
            float: none;
            text-align: center;
            padding-top: 15px;
        }
        div.collapse {
            max-width: 560px;
            margin: auto;
            float: none!important;
        }
    </style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container center">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a id="cursive" class="navbar-brand page-scroll" href="#page-top">
                    <span class="large">Spina <span class="light">Records</span></span>
                </a>
            <br>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#faq">F.A.Q.</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#shop">Shop Online</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="sell.html">Sell Us Records</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
        </div>
    </nav>
    
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        
                        <p>Thank you for your submission!</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>
    </body>
