<?php
 
if(isset($_POST['submit'])) {
    
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "pattayacafeduluth@gmail.com";
    $email_subject = "Pattaya Costomer";
    
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
    
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
    
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

    if(strlen($message) < 2) {
        $error_message .= 'Please enter a message.<br />';
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
    $email_message .= "Message: ".clean_string($message)."\n";
 
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n";
    
    mail($email_to, $email_subject, $email_message, $headers);  
}
?>


<html>
<head>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Rokkitt:700|Oxygen:400,700' rel='stylesheet' type='text/css'>

    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <title>Pattaya Cafe</title>
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="../home.html" class="brand-logo center"><img id="nav-logo" class="responsive-img center-align" src="../assets/Pattaya%20Logo.png"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="../menu.html">Menu</a></li>
                    <li><a href="../gallery.html">Gallery</a></li>
                    <li><a href="../contacts.html">Contact Us</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="../menu.html">Menu</a></li>
                    <li><a href="../gallery.html">Gallery</a></li>
                    <li><a href="../contacts.html">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <script>
        $(".button-collapse").sideNav();
    </script>
    
    <div class="container">
        <h3>Thank you for contacting us!</h3>
    </div>
    
</body>

</html>

