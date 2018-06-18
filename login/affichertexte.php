<html>
<body>

<?php
	$name = $_POST["uname"];
	$email = $_POST["psw"];
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
	'nom' => $name,
	'possesseur' => $email,
	'console' => 'test',
	'prix' => 50,
	'nbre_joueurs_max' => 12,
	'commentaires' => 'epz'
	));

?>


</body>
</html>