<?php

require_once('../swiftmailer/lib/swift_required.php');

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
		->setUsername('jimsbookcorner@gmail.com')
		->setPassword('jimsbookcornermdp');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Votre réservation est disponible !')
  ->setFrom(array('noreply@jimsbookcorner.fr' => 'Jim\'s Book Corner Library'))
  ->setTo(array('jtraulle@opencomp.fr' => 'Jean Traullé'))
  ->setBody('<p>Bonjour,</p>
<p>Votre réservation est dès à présent disponible.<br />
Vous pouvez venir la retirer dès que vous le souhaitez.</p>
<p>Cordialement, <br />L\'équipe de Jim\'s Book Corner Library</p>')
  ;

// Send the message
$result = $mailer->send($message);

?>