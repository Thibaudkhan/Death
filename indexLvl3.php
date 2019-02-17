<?php
	 require "bdd.php" ;
	 //ini_set('display_errors','off');
	 $valeurMax ="50";
	 $valeurMin= "20";
	 $Couleur ;
	 $mortType ;
	 $intervention ;
	 $sexe ;
	 $lieu ;
	 
	$db = Database::connect();
	 if (!empty($_POST)){
	 	$valeurMax = $_POST['valeurMax'];
	 	$valeurMin = $_POST['valeurMin'];
	 	$Couleur = $_POST['Couleur'];
	 	$mortType = $_POST['mortType'];
	 	$intervention = $_POST['intervention'];
	 	$sexe = $_POST['sexe'];
	 	$lieu = $_POST['lieu']; 	
	 }

	 function lvl2($valeurMax,$valeurMin,$Couleur,$mortType,$intervention,$sexe,$lieu){
	 	$db = Database::connect();
	 		$statement = $db->query("SELECT COUNT(*) as 'nb' FROM mort_usa WHERE intent='$mortType' AND police='$intervention' AND sex='$sexe' AND age >= $valeurMin AND age <= $valeurMax AND race='$Couleur' AND place='$lieu'");
	 	echo "<td>"."race". " "."age". "</td><br />";

	 	$item = $statement->fetch();
        echo "> result ".$item['nb']." <br />";
	}


	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Mort</title>
	<meta charset="utf-8">
</head>
<body >
	
	 <div class="image">
	 	<button class="control" onclick="play('audioPlayer,this')">GOOOO</button>
	 	<p>&nbsp;</p>
	 	<audio id="audioPlayer" src="music/1.mp3"></audio>

		 
		 		 <form action="indexLvl3.php" role="form" method="post" >
		 	<div class="form">
		 		<div class="result">
		 			<?php

		 			 if (empty($_POST)) {
		 				echo "> Dans la premiere case entrer le lieu de la mort domicile street, dans le sex, puis si il y a eu intervention de la police (true ou false), quel type de mort, la couleur de peau entre White Black , ensuite l'age min puis l'age max .";
		 			}else{
		 					$db = Database::connect();
		 					echo "> SELECT COUNT(*) as 'nb' FROM mort_usa WHERE intent='$mortType' AND police='$intervention' AND sex='$sexe' AND age >= $valeurMin AND age <= $valeurMax AND race='$Couleur' AND place='$lieu'  <br /> ";
					 		lvl2($valeurMax,$valeurMin,$Couleur,$mortType,$intervention,$sexe,$lieu);
					 		echo "<a href='indexLvl2.php'>> Press me</a> ";
		 			}

		 			?>

		 		</div>
	 		<div class="marge a2">
	 			<p>Ecrire la race qu'on veut White,Other(Black,Native American...)</p>
	 			<input type="text" name="lieu" placeholder="lieu ">
	 			<input type="text" name="sexe" placeholder="Sexe ">
	 			<input type="text" name="intervention" placeholder="Police ">
	 			<input type="text" name="mortType" placeholder="mort ">
	 			<input type="text" name="Couleur" placeholder="Race ">
	 			<input type="text" name="valeurMin" placeholder="Min">
			 	<input type="text" name="valeurMax" placeholder="Max ">
			 	<button type="submit" class="bOui">></button>
		 	</div>
		 </div>
		 	<div class="LeForm">
		 	<h2> Ta mission</h2>
		 	<div id="quete"><h4>Quel est le nombre d'Homme blanc suicidé entre 30 et 50 ans y compris ? </h4></div>
		 	

			 <input type="text" name="sethu" id="reponse" />
			 <input type="button" value="Ok" onclick="Reponses1();" />
		 	<script type="text/javascript">
		 		
		 		function Reponses1(){
		 			var reponse = document.getElementById("reponse").value;
		 			if (reponse == 500 ) {
		 				document.getElementById("quete" ).innerHTML = "Bravo Quel est le nombre de femme à dommicile non blanche tuée ?"
		 			}else if (reponse == 44  ) {
		 				document.getElementById("quete" ).innerHTML = "Bravo !! Combien de mineur mort ont eu l'intervention de la Police?"

		 			}else if (reponse == 5) {alert("tu as gagné")}
		 			else{
		 				alert('Loose');
		 			}
		 		 	
		 		 } 
		 		 function play(idPlayer, control) {
		    var player = document.querySelector('#' + idPlayer);

		        	player.play();

		        }
		 			
		 	</script>
		 
		 	</div>
		
		  
	 </div>
	 
</body>
</html>