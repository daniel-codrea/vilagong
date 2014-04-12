<?php
//If the form is submitted
if(isset($_POST['submit'])) {

    //Check to make sure that the name field is not empty
    if(trim($_POST['name']) == '') {
        $hasError = true;
    } else {
        $name = trim($_POST['name']);
    }

    //Check to make sure sure that a valid email address is submitted
    if(trim($_POST['email']) == '')  {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    //Check to make sure comments were entered
    if(trim($_POST['comments']) == '') {
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }

    if(trim($_POST['subject']) == '') {
        $subject = "Formular de contact vilagong.ro";
    } else {
        $subject = trim($_POST['subject']);
    }
    //If there is no error, send the email
    if(!isset($hasError)) {
        $emailTo = 'info@vilagong.ro'; //Put your own email address here
        $body = "Nume: $name \n\nEmail: $email \n\nMesaj:\n $comments";
        $headers = "From: $email" . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vila Gong | Contact</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link href="../css/colorbox.css" rel="stylesheet" />
      <link href="../css/font-awesome.css" rel="stylesheet" />

    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
      <div class="row collapse">
          <div class="small-12 columns">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d87485.6226747592!2d23.388431!3d46.74664699999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47491ad95cca95e1%3A0xf3966c6135ac4a16!2sVila+Gong!5e0!3m2!1sen!2s!4v1396411873804" width="940" height="400" frameborder="0" style="border:0; margin-bottom:-2px;"></iframe>
          </div>
      </div>

    <div id="siteTop">
         <div class="row">
            <div class="small-12 columns">
                <div id="logo" class="left">
                    <a href="index.html">
                        <img src="../img/logo.png" alt="Vila Gong" />
                    </a>
                </div>
                <div id="lang" class="right">
                    <ul class="inline-list">
                        <li><a href="../contact.php"><img src="../img/Romania.png" alt="Romnian" /></a></li>
                        <li><a href="../en/contact/php"><img src="../img/United-Kingdom.png" alt="English" /></a></li>
                        <li><a href="kapcsolat.php"><img src="../img/Hungary.png" alt="Hungarian" /></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div id="bookings">
            <p class="semibolditalic">Online foglalás</p>
        </div>
    </div>




      <div id="menu" class="row">
        <div class="small-12 columns">
            <nav>
                <ul class="inline-list">
                    <li><a href="index.html">Home</a></li>
                    <li class="pozRel"><a href="#">Szolgáltatások <i class="fa fa-caret-down fa-lg mL5"></i></a>
                        <ul class="sub-menu">
                            <li><a href="szobak.html">Szobák</a></li>
                            <li><a href="etterem.html">Étterem</a></li>
                            <li><a href="konferenciaterem.html">Konferenciaterem</a></li>
                        </ul>
                    </li>
                    <li><a href="kepgaleria.html">Képgaléria</a></li>
                    <li><a href="ajanlat.html">Ajánlat</a></li>
                    <li><a href="kornyek.html">Környék</a></li>
                    <li><a class="active" href="kapcsolat.php">Kapcsolat</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <p class="spacer20">&nbsp;</p>
    <div class="row">
        <div class="small-12 columns content">
            <div class="row collapse">
                <div class="small-6 columns">
                    <div class="p20">
                        <p class="spacer20">&nbsp;</p>
                        <p>Postacím: 407310 Gilău, 1153/C Someşul Rece utca, Cluj megye</p>
                        <p>Telefon: +40-264-371468, +40-723-193977</p>
                        <p>Fax: +40-264-371498</p>
                        <p>Email: info@vilagong.ro</p>
                        <p>Web: http://www.vilagong.ro/</p>
                        <p class="small"><span class="semibold">SC Rentaporta Import Export SRL</span>, Bejegyzési rendszám: J12/2665/1993, Bejegyzési kod: 4341094</p>
                        <p class="spacer20">&nbsp;</p>
                    </div>
                </div>
                <div class="small-6 columns">
                    <div class="p20">
                        <h4>Hagyanak üzenetett</h4>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactForm">
                            <input type="text" name="name" placeholder="Név" />
                            <input type="email" name="email" placeholder="Email" />
                            <input type="text" name="subject" placeholder="Téma" />
                            <textarea name="comments" placeholder="Üzenet"></textarea>
                            <input type="submit" class="button radius tiny" name="submit" value="Küldes" />
                        </form>
                        <?php if(isset($hasError)) { //If errors are found ?>
                            <p class="error"><b>Hiba!</b></p>
                            <p class="error">Kérjük ellenőrizze hogy helyesen kitöltött minden kötelező mezőt. Köszönjük!</p>
                        <?php } ?>
                        <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
                            <p><b>Üzenet sikeresen elküldve!</b></p>
                            <p>Köszönjük <b><?php echo $name;?></b> az üzenetet! Válaszolni fogunk a lehető leghamarabb.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="spacer20">&nbsp;</p>

    <footer>

        <div class="row">
            <div class="small-6 columns">
                <p class="small">&copy <span id="currentYear"></span> Vila Gong. Minden jog fenntartva.</p>
            </div>
            <div class="small-6 columns">
                <p class="small textRight">Design by: <a href="http://inadcod.com">inadcodDesign</a>. Powered by: <a href="http://seewebsolutions.ro">See-Web Solutions</a></p>
            </div>
        </div>

    </footer>





    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.min.js"></script>
    <script src="../js/bjqs-1.3.min.js"></script>
    <script src="../js/jquery.colorbox-min.js"></script>
    <script>
        $(document).foundation();
        $(window).load(function(){
            $('a.colorbox').colorbox();
            var date = new Date();
            var currentYear = date.getFullYear();
            $("#currentYear").html(currentYear);
        });
    </script>
  </body>
</html>
