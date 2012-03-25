<?php

require_once('../swiftmailer/lib/swift_required.php');
require_once('../Params.ini.php');
require_once('../DB.class.php');
require_once('../../classes/Table.class.php');
require_once('../../classes/Emailing.class.php');
require_once('../../classes/Settings.class.php');

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
		->setUsername(Settings::chercherParCleSetting('adresseGmail')->valSetting)
		->setPassword(Settings::chercherParCleSetting('mdpGmail')->valSetting);

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

//On définit notre requête (on récupère l'ensemble des enregistrements)
$sql="SELECT * FROM emailing";

//Comme on est dans un contexte statique, on récupère l'instance de la BDD
$db=DB::get_instance();
$reponse = $db->query($sql);

while($enregistrement = $reponse->fetch(PDO::FETCH_ASSOC)){
	$mail = new Emailing(
		$enregistrement['to'],
		$enregistrement['subject'],
		$enregistrement['body'],
		$enregistrement['idMail']
		);

	$liste[]=$mail;
}

if(isset($liste))
{
	foreach($liste as $lignemessage)
	{
		// Create a message
		$message = Swift_Message::newInstance($lignemessage->subject)
		  ->setContentType("text/html")
		  ->setFrom(array('noreply@jimsbookcorner.fr' => 'Jim\'s Book Corner Library'))
		  ->setReplyTo(array('noreply@jimsbookcorner.fr' => 'Jim\'s Book Corner Library'))
		  ->setTo(array($lignemessage->to => $lignemessage->to))
		  ->setBody($lignemessage->body);

		// Send the message
		$result = $mailer->send($message);

		echo 'Message envoy&eacute;<br />';
		$lignemessage->supprimer();
	}
}
else
{
	echo 'Aucun message en attente d\'envoi ;)';
}




?>