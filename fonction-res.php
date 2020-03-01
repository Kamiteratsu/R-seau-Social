<?php
require_once('../../LIB/librairie-res.php');

function retourne_auteur()
{
	$auteur = explode("/", $_SERVER['REQUEST_URI']);
	return $auteur[1];
}

function ajout_post_msg()
{
	global $auteur;
	$nbPost = prendre_un_post();
	$Post = "message\n" . $auteur . "\n" .  date("Y-m-d H:i:s") . "\n" . "0" . "\n\n" . $_POST["post_msg"] . "\n";
	file_put_contents("../../DATA/" . $nbPost . '-msg.txt', $Post, LOCK_EX);
}

function ajout_post_img()
{
	global $auteur;
	$nbPost = prendre_un_post();
	$fichier = $nbPost . "-" . $_FILES['post_img']['name'];
	if(verifie_image($fichier))
	{
		$Post = "image\n" . $auteur . "\n" .  date("Y-m-d H:i:s") . "\n" . "0" . "\n\n" . "./IMG/" . $nbPost . "-" . $_FILES['post_img']['name'] . "\n" . $_POST["post_msg"] . "\n";
		file_put_contents("../../DATA/" . $nbPost . '-img.txt', $Post, LOCK_EX);
	}
	else
	{
		echo "Erreur... Fichier non conforme.";
	}
}
?>
