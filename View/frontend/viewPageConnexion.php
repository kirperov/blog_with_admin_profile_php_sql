<?php
$title = "Connexion"?>
<!-- Début pour recupèrer le code HTML dans une variable $content  -->
<?php
ob_start();
?>
<div class="col-md-12 align-items-center">
     <div class="col-md-4 mx-auto mt-5">
       <h1 class="text-center"><?php
echo $title;
?></h1>
       <form  action="index.php?action=connect" method="post">
         <div class="form-group">
           <label for="exampleInputEmail1">Login</label>
           <input type="text" class="form-control" id="login" name="login" placeholder="Entrer login" required>
          </div>
         <div class="form-group">
           <label for="password">Mot de passe</label>
           <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
           </div>
<?php
$passwordOk    = false;
$passwordNotOk = false;
while ($dbAllUsersList = $allUsersList->fetch()) {
   if (isset($_POST['password']) && isset($_POST['login']) && !empty($_POST['password']) && !empty($_POST['login'])) {
       sleep(1); // Une pause de 1 sec
       $isPasswordCorrect = password_verify($_POST['password'], $dbAllUsersList['password']);
       if ($isPasswordCorrect && $_POST['login'] == $dbAllUsersList['login']) {
           $passwordOk            = true;
           $_SESSION['goodLogin'] = $_POST['login'];
           $cookie_name           = "ticket";
           //Génetation aléatoire et hash
           $ticket                = session_id() . microtime() . rand(0, 9999999999);
           $ticket                = hash('sha512', $ticket);
           // On enregistre des deux cotés
           setcookie($cookie_name, $ticket, time() + (60 * 20)); // Expire au bout de 20 min
           $_SESSION['ticket'] = $ticket;
           // $_SESSION['goodLogin'] = htmlspecialchars($_POST['login']);
           // $_SESSION['goodPassword'] = htmlspecialchars($dbAllUsersList['password']);
           header("Location: index.php?action=adminSpace");
       }
       if (!$isPasswordCorrect && $_POST['login'] != $dbAllUsersList['login']) {
           $passwordNotOk = true;
       }
   }
}
if (!$passwordNotOk) {
?>
                 <div class="alert alert-primary alert-dismissible fade show" role="alert"  data-aos="zoom-in"> <span> Veillez rentrer votre login et mot de passe </span>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
           <?php
} elseif (!$passwordOk) {
?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert"  data-aos="zoom-in"> <span>Mauvaus login ou mot de passe! </span>
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
<?php
}
$allUsersList->closeCursor();
?>
        <button type="submit" class="btn btn-primary">Se connecter</button>
       </form>
       <?php // Instantiation and passing `true` enables exceptions
       // Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     // SMTP username
    $mail->Password   = 'secret';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} ?>
        <br>
   </div>
</div>



<?php
$content = ob_get_clean();
?>
<!-- Je fini et je mets le code HTML dans une variable $content -->
<?php
require('view/frontend/template.php');
?>
