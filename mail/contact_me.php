<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Champs obligatoires vides!";
   return false;
   }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "stephaniemiguet@wanadoo.fr"; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contact depuis Stephaniemiguet.com :  $name";
$email_body = "Bonjour Stéphanie ! Vous avez reçu un nouveau message depuis votre site stephaniemiguet.com.\n\n"."Nom: $name\nEmail: $email_address\nTéléphone: $phone\n\nMessage:\n$message";
$headers = "From: nepasrepondre@stephaniemiguet.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
