<?php
	 require "bdd.php" ;
	 $valeur = "14";
	 if (!empty($_POST)) {
	 	$valeur = $_POST['valeur'];
	 	$db = Database::connect();
		
	 	$statement = $db->query("SELECT COUNT(*) as 'aze' FROM `mort_usa` WHERE intent = 'Suicide' and age < '".$valeur."' ");
        $item = $statement->fetch();
	 }
		

       /* while($item = $statement->fetch()) {
        	echo "<tr>"."</tr>";
        	echo "<td>". $item['aze']. "</td><br />";
        	echo "<tr>"."</tr>";*/

		Database::disconnect();

	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Mort</title>
	<meta charset="utf-8">
</head>
<body >
	
	<h1>Taux de mort</h1>
	<p>
		Bonjour jeune recrue, vous êtes ici pour éviter les suicides par armes à feu dans ce pays ....<br />
		Ce ne sera pas facile pour cela vous devrez réussir à convaincre la personne de vivre...<br />
		Bonne chance...
	 </p>
	 <div class="image image1 image2 image3">


		 <table>
		 	<tr>
		 		<td>Nombre</td>
		 	</tr>
		 </table>
		 
		 		 <form action="index.php" role="form" method="post">
		 	<div class="form">
		 		<div class="result">
		 			<?php if (empty($_POST)) {
		 				echo "Bonjour écris 5";
		 				}else{
		 				if ($valeur < 16) { 
		 					echo $item['aze'];
		 				}else{
		 					echo "nope";

		 				}
		 			}
		 			?>

		 		</div>
	 		<div class="marge">
			 	<input type="text" name="valeur">
			 	<button type="submit" class="bOui"> Enter ></button>
		 	</div>
		 </div>
		 </form>
	 </div>
	 
</body>
</html>