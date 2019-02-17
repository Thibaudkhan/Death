<?php
	 require "bdd.php" ;
	 //ini_set('display_errors','off');
	 $valeurMax =1;
	 $valeurMin=1;
	 $compter;
	 $Limit;
	 $Couleur;
	 $mortFac;
	$db = Database::connect();
	 if (!empty($_POST)){
	 	$valeurMax = $_POST['valeurMax'];
	 	$valeurMin = $_POST['valeurMin'];
	 	$Limit = $_POST['Limit'];
	 	$compter = $_POST['compter'];
	 	$mortFac = $_POST['mortFac'];
	 	$Couleur = $_POST['Couleur'];
	
	 }
	 function lvl2($valeurMax,$valeurMin,$Couleur,$Limit,$compter,$mortFac){
	 	$db = Database::connect();
	 	if ($compter == "oui") {
	 		if ($Couleur == 'White' or $Couleur == 'white' or $Couleur == 'WHITE') {
	 		$statement = $db->query("SELECT * FROM `mort_usa` WHERE  age > $valeurMin AND age < $valeurMax AND race = 'White' and intent='$mortFac' AND age REGEXP '^2' ORDER BY age ASC Limit $Limit");
		 	}else{
		 		$statement = $db->query("SELECT * FROM `mort_usa` WHERE  age > $valeurMin AND age < $valeurMax AND race != 'White' and intent='$mortFac' AND age REGEXP '^2' ORDER BY age ASC Limit $Limit");
		 	}
		 }else{
		 	if ($Couleur == 'White' or $Couleur == 'white' or $Couleur == 'WHITE') {
	 		$statement = $db->query("SELECT COUNT(*) as 'nb' FROM `mort_usa` WHERE  age > $valeurMin AND age < $valeurMax AND race = 'White' and intent='$mortFac' AND age REGEXP '^2' ORDER BY age ASC Limit $Limit");
		 	}else{
		 		$statement = $db->query("SELECT COUNT(*) as 'nb' FROM `mort_usa` WHERE  age > $valeurMin AND age < $valeurMax AND race != 'White' and intent='$mortFac' AND age REGEXP '^2' ORDER BY age ASC Limit $Limit");
		 	}
	 		
	 	}
	 	
	 	
	 	echo "<td>"."race". " "."age". "</td><br />";
	 	if ($compter == "oui") {
	 		echo "";
	 		while($item = $statement->fetch()) {
        	echo "<td>>".$item['race'] ." "."</td>";
        	echo "<td >". $item['age']." " ."</td><br />";
        	echo "<tr>"."</tr>";}
	 	
        
	 }else{
	 	$item = $statement->fetch();
        echo "> result ".$item['nb']." <br />";
	 }
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
		 
		 		 <form action="indexLvl2.php" role="form" method="post" >
		 	<div class="form">
		 		<div class="result">
		 			<?php

		 			 if (empty($_POST)) {
		 				echo "> Dans la premiere case entrer le type de mort, dans la deuxieme la couleur de peau entre White Black , ensuite l'age min puis l'age max , combien de donnees à voir et enfin oui = un tableau non le total.";
		 			}else{
		 					$db = Database::connect();
		 					echo "> SELECT * FROM `mort_usa` WHERE age >$valeurMin  AND age < $valeurMax AND race != 'White' and intent='Suicide' age REGEXP '^2' ORDER BY age ASC Limit $Limit <br /> ";
					 		lvl2($valeurMax,$valeurMin,$Couleur,$Limit,$compter,$mortFac);
					 		 
		 			}

		 			?>

		 		</div>
	 		<div class="marge a2">
	 			<p>Ecrire la race qu'on veut White,Other(Black,Native American...)</p>
	 			<input type="text" name="mortFac" placeholder="mortFac">
	 			<input type="text" name="Couleur" placeholder="Race ">
	 			<input type="text" name="valeurMin" placeholder="Min">
			 	<input type="text" name="valeurMax" placeholder="Max ">
			 	<input type="text" name="Limit" placeholder="Limit ">
			 	<input type="text" name="compter" placeholder="Oui non ">
			 	<button type="submit" class="bOui"> Enter ></button>
		 	</div>
		 </div>
		 </form>
		  
	 
	 <div class="LeForm">
		 	<h2> Ta mission</h2>
		 	<div id="quete"><h4>Quel est le nombre de blanc suicidé dans la vingtaine ? </h4></div>
		 	

			 <input type="text" name="sethu" id="reponse" />
			 <input type="button" value="Ok" onclick="Reponses1();" />
	 <script type="text/javascript">
	 	
	 	function Reponses1(){
		 			var reponse = document.getElementById("reponse").value;
		 			if (reponse == 3261 ) {
		 				document.getElementById("quete" ).innerHTML = "Combien de noir tué dans la vingtaine ";
		 			}else if (reponse == 5952 ) {alert("tu as gagné");
		 			document.getElementById("quete" ).innerHTML = "<a href='indexLvl3.php'>> Press me</a> ";
		 		}
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