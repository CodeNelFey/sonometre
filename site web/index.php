<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Sonomètre</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <?php
  
  $bdd = new PDO('mysql:host=localhost;dbname=sonomètre', 'root', '')
  
  ?>
  <body>
    <div class="web">
<form method="GET">
      <div class="actualsound"> 
        <?php 
        $reponse = $bdd->query('SELECT * FROM sound');
        while ($donnees = $reponse->fetch()) {
          echo"Actuelement : ".$donnees['sound_limit']." dB";
        }
        ?>
      </div>
      <div class="range">
        <div class="sliderValue">
          <span>100</span>
        </div>
        <div class="field">
            <div class="value left">10</div>
            <input type="range" min="10" max="100" value="<?php echo($donnees) ?>", steps="1", name="sounddb">
            <div class="value right">100</div>
        </div>
    </div>
    <input type="submit", class="submit", value="Appliquer">
</form>

<?php
		if (isset($_GET['sounddb'])) {
			$mysqli = new mysqli("localhost", "root", "", "sonomètre");
            $mysqli->set_charset("utf8");
            $requete = "UPDATE `sound` SET `sound_limit`='".$_GET['sounddb']."' WHERE 1";
		    $resultat = $mysqli->query($requete);
            if ($resultat)
              header("Location: http://localhost/sonomètre/index.php");            
              else
                echo "<p>Erreur</p>";
		}
		?>

    </div>
<script>
      const slideValue = document.querySelector("span");
      const inputSlider = document.querySelector("input");
      inputSlider.oninput = (()=>{
        let value = inputSlider.value;
        slideValue.textContent = value;
        slideValue.style.left = (value) + "%";
        slideValue.classList.add("show");
      });
      inputSlider.onblur = (()=>{
        slideValue.classList.remove("show");
      });
    </script>

  </body>
</html>

<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  text-align: center;
  place-items: center;
  background: #000000;
}
.range{
  height: 80px;
  width: 380px;
  background: #1a1a1a;
  border-radius: 10px;
  padding: 0 65px 0 45px;
  box-shadow: 2px 4px 8px rgba(0,0,0,0.1);
  margin-top: 10px;
}
.actualsound{
  height: 80px;
  width: 380px;
  background: #1a1a1a;
  border-radius: 10px;
  padding: 0 65px 0 45px;
  box-shadow: 2px 4px 8px rgba(0,0,0,0.1);
  font-size: 1.5em;
  text-align: center;
  display: table-cell;
  vertical-align: middle;
  color: #fff;
}
.submit{
  width: 380px;
  height: 60px;
  margin-top: 10px;
  background-color: #34ebe1;
  border: none;
  border-radius: 10px;
  font-size: 2em;
  transition: 0.3s;
}
.submit:hover{
  background-color: #76e8e2;
  cursor: pointer;
}
.sliderValue{
  position: relative;
  width: 100%;
}
.sliderValue span{
  position: absolute;
  height: 45px;
  width: 45px;
  transform: translateX(-70%) scale(0);
  font-weight: 500;
  top: -40px;
  line-height: 55px;
  z-index: 2;
  color: #fff;
  transform-origin: bottom;
  transition: transform 0.3s ease-in-out;
}
.sliderValue span.show{
  transform: translateX(-70%) scale(1);
}
.sliderValue span:after{
  position: absolute;
  content: '';
  height: 100%;
  width: 100%;
  background: #000000;
  border: 3px solid #34ebe1;
  z-index: -1;
  left: 50%;
  transform: translateX(-50%) rotate(45deg);
  border-bottom-left-radius: 50%;
  box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
  border-top-left-radius: 50%;
  border-top-right-radius: 50%;
}
.field{
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  position: relative;
}
.field .value{
  position: absolute;
  font-size: 18px;
  color: #34ebe1;
  font-weight: 600;
}
.field .value.left{
  left: -22px;
}
.field .value.right{
  right: -43px;
}
.range input{
  -webkit-appearance: none;
  width: 100%;
  height: 3px;
  background: #555;
  border-radius: 5px;
  outline: none;
  border: none;
  z-index: 2222;
}
.range input::-webkit-slider-thumb{
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  background: red;
  border-radius: 50%;
  background: #34ebe1;
  border: 1px solid #34ebe1;
  cursor: pointer;
}
.range input::-moz-range-thumb{
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  background: red;
  border-radius: 50%;
  background: #34ebe1;
  border: 1px solid #34ebe1;
  cursor: pointer;
}
.range input::-moz-range-progress{
  background: #664AFF; //this progress background is only shown on Firefox
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
 
/* Chrome */
input::-webkit-inner-spin-button,
input::-webkit-outer-spin-button { 
	-webkit-appearance: none;
	margin:0;
}
 
/* Opéra*/
input::-o-inner-spin-button,
input::-o-outer-spin-button { 
	-o-appearance: none;
	margin:0
}

</style>


<!--<!DOCTYPE html><html lang=\"fr\"><head><meta charset=\"utf-8\"><title>Sonomètre</title><link rel=\"stylesheet\" href=\"style.css\"></head><?php $bdd = new PDO('mysql:host=localhost;dbname=sonomètre', 'root', '') ?><?php if (isset($_GET['sounddb'])) { $mysqli = new mysqli(\"localhost\", \"root\", \"\", \"sonomètre\"); $mysqli->set_charset(\"utf8\"); $requete = \"UPDATE `sound` SET `sound_limit`='".$_GET['sounddb']."' WHERE 1\"; $resultat = $mysqli->query($requete); if ($resultat) header(\"Location: http://localhost/sonomètre/index.php\"); else echo \"<p>Erreur</p>\"; } ?><body><div class=\"web\"><form method=\"GET\"><div class=\"actualsound\"><?php $reponse = $bdd->query('SELECT * FROM sound'); while ($donnees = $reponse->fetch()) { echo\"Actuelement : \".$donnees['sound_limit'].\" dB\"; } ?></div><div class=\"range\"><div class=\"sliderValue\"><span>100</span></div><div class=\"field\"><div class=\"value left\">10</div><input type=\"range\" min=\"10\" max=\"100\" value=\"<?php echo($donnees) ?>\", steps=\"1\", name=\"sounddb\"><div class=\"value right\">100</div></div></div><input type=\"submit\", class=\"submit\", value=\"Appliquer\"></form><script>const slideValue = document.querySelector(\"span\");const inputSlider = document.querySelector(\"input\");inputSlider.oninput = (()=>{let value = inputSlider.value;slideValue.textContent = value;slideValue.style.left = (value) + \"%\";slideValue.classList.add(\"show\");});inputSlider.onblur = (()=>{slideValue.classList.remove(\"show\");});</script></div></body></html><style>@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');*{margin: 0;padding: 0;box-sizing: border-box;font-family: 'Poppins', sans-serif;}html,body{display: grid;height: 100%;text-align: center;place-items: center;background: #000000;}.range{height: 80px;width: 380px;background: #1a1a1a;border-radius: 10px;padding: 0 65px 0 45px;box-shadow: 2px 4px 8px rgba(0,0,0,0.1);margin-top: 10px;}.actualsound{height: 80px;width: 380px;background: #1a1a1a;border-radius: 10px;padding: 0 65px 0 45px;box-shadow: 2px 4px 8px rgba(0,0,0,0.1);font-size: 1.5em;text-align: center;display: table-cell;vertical-align: middle;color: #fff;}.submit{width: 380px;height: 60px;margin-top: 10px;background-color: #34ebe1;border: none;border-radius: 10px;font-size: 2em;transition: 0.3s;}.submit:hover{background-color: #76e8e2;cursor: pointer;}.sliderValue{position: relative;width: 100%;}.sliderValue{position:relative;width:100%;}.sliderValue span{position:absolute;height:45px;width:45px;transform:translateX(-70%)scale(0);font-weight:500;top:-40px;line-height:55px;z-index:2;color:#fff;transform-origin:bottom;transition:transform 0.3s ease-in-out;}.sliderValue span.show{transform:translateX(-70%)scale(1);}.sliderValue span:after{position:absolute;content:'';height:100%;width:100%;background:#000000;border:3px solid #34ebe1;z-index:-1;left:50%;transform:translateX(-50%)rotate(45deg);border-bottom-left-radius:50%;box-shadow:0px 0px 8px rgba(0,0,0,0.1);border-top-left-radius:50%;border-top-right-radius:50%;}.field{display:flex;align-items:center;justify-content:center;height:100%;position:relative;}.field .value{position:absolute;font-size:18px;color:#34ebe1;font-weight:600;}.field .value.left{left:-22px;}.field .value.right{right:-43px;}.range input{-webkit-appearance:none;width:100%;height:3px;background:#555;border-radius:5px;outline:none;border:none;z-index:2222;}.range input::-webkit-slider-thumb{-webkit-appearance:none;width:20px;height:20px;background:red;border-radius:50%;background:#34ebe1;border:1px solid #34ebe1;cursor:pointer;}.range input::-moz-range-thumb{-webkit-appearance:none;width:20px;height:20px;background:red;border-radius:50%;background:#34ebe1;border:1px solid #34ebe1;cursor:pointer;}.range input::-moz-range-progress{background:#664AFF;}.input[type=number]{-moz-appearance:textfield;}.input::-webkit-inner-spin-button,.input::-webkit-outer-spin-button{-webkit-appearance:none;margin:0;}.input::-o-inner-spin-button,.input::-o-outer-spin-button{-o-appearance:none;margin:0}

172.18.147.212
doghunter



