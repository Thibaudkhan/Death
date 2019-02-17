<?php
	 require "bdd.php" ;
	 $lvl =1;
	 $valeur =1;

	$db = Database::connect();
	 if (!empty($_POST)){
	 	$valeur = $_POST['valeur'];
	 }

	 function lvl1($valeur){
	 	$db = Database::connect();
	 	$statement = $db->query("SELECT COUNT(*) as 'aze' FROM `mort_usa` WHERE intent = 'Suicide' and age < $valeur ");
        $item = $statement->fetch();
        echo "> result ".$item['aze']." <br />";

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


	
		 		 <form action="index.php" role="form" method="post" >
		 	<div class="form">
		 		<div class="result">
		 			<?php
		 			 if (empty($_POST)) {
		 				echo "<p>>Combien de suicide au total</p>";
		 			}else{
		 					$db = Database::connect();
		 					echo "> SELECT COUNT(*) as 'aze' FROM `mort_usa` WHERE <br/> intent = 'Suicide' and age < $valeur <br /> ";
					 		lvl1($valeur);
					 		
		 				}
		 			?>

		 		</div>
	 		<div class="marge">
	 			<p>Insérer un nombre  </p>
			 	<input type="text" name="valeur" placeholder="nombre">
			 	<button type="submit" class="bOui"> Enter ></button>
		 	</div>
		 </div>
		 </form>
	 
	  <div class="LeForm">
		 	<h2> Ta mission</h2>
		 	<div id="quete"><h4>Combien de suicide </h4></div>
		 	

			 <input type="text" name="sethu" id="reponse" placeholder="nombre" />
			 <input type="button" value="Ok" onclick="Reponses1();" />
	 <script type="text/javascript">
	 	
	 	function Reponses1(){
		 			var reponse = document.getElementById("reponse").value;
		 			if (reponse == 30626 ) {
		 				document.getElementById("quete" ).innerHTML = "<a href='indexLvl2.php'> Press me</a>";
		 				alert("tu as gagné");
		 			}
		 			else{
		 				alert('Loose');
		 			}
		 		 	
		 		 } 

	 	function play(idPlayer, control) {
		    var player = document.querySelector('#' + idPlayer);

		        	player.play();
		        	/*while (player.currentTime == 0) {
		        		player.play();
		        	}*/
		        	
		        }

	 </script>
	 </div>
	</div>
</body>
</html>