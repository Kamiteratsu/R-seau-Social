<?php
	global $auteur;
	require_once('fonction-res.php');
	$auteur = retourne_auteur();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8>
		<title>Le réseau social de LIFASR2</title>
		<link rel="stylesheet" type="text/css" href="style-res.css">
	</head>
		<body>
			<nav>
                        </nav>
			<section>
				<div class="nouveau_post">
					<p><b>Bonjour <?php echo $auteur; ?></b></p>
					<form method="POST" action="res.php" enctype="multipart/form-data">
						<input type="textarea" placeholder="Quoi de neuf?" name="post_msg"/>
						<p>Ajouter une image : <input type="file" name="post_img" value="Parcourir..."/></p>
						<input type="hidden" name="MAX_FILE_SIZE" value="500000"/>
						<input type="submit" name="action" value="Poster"/>
					</form>
				</div>
				<article>
					<p><?php
						if($_POST["action"] == "Poster")
						{
							if(!empty($_POST["post_msg"]) && empty($_FILES['post_img']['name']))
							{
								ajout_post_msg();
								echo $_POST["post_msg"] . "<br/>" . "De " . $auteur . " à " . date("h:i:s d-m-Y");
							}
							if(!empty($_FILES['post_img']['name']))
							{
								ajout_post_img();
							}
						}
					?><p>
				</article>
			</section>
                </body>
        </html>
