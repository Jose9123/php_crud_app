<?php
session_start();

$name = $_POST['name'];
$pass = $_POST['pass'];

$username = 'gsweb';
$password = 'gsweb2015';

if( isset($name) || isset($pass) )
{
    if( empty($name) ) {
        die ("ERROR: Please enter username!");
    }
    if( empty($pass) ) {
        die ("ERROR: Please enter password!");
    }


    if( $name == $username && $pass == $password )
    {
        // Authentication successful - Set session
        session_start();
        $_SESSION['auth'] = 1;
        setcookie("username", $_POST['name'], time()+(84600*7));
        header('Location: index.php');
   exit();
    }
    else {
        echo "ERROR: Incorrect username or password!";
    }
}


// If no submission, display login form
else {
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <style type="text/css">
        .form-signin {
          max-width: 330px;
          padding: 15px;
          margin: 1em auto;
        }   
        input.form-control{
            /*margin: 1em 1em;
            padding: 1em;*/
        }

        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="container">

      <form class="form-signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
       <!--  <h2 class="form-signin-heading">Please sign in</h2> -->
            <div class="form-group">
                <label for="inputUsername" class="sr-only">Username</label>
                <input  name="name" type="text" id="inputUsername" class="form-control" placeholder="Username" required="" autofocus="">
            </div>
       <div class="form-group"> <label for="inputPassword" class="sr-only">Password:</label>
               <input  name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
           </div>
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
      <div  class="form-group">  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button></div>
      </form>

    </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>

<?php
}
?>