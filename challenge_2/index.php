<?php
/*
*
* Using PHP, create a function that loops through the following array and outputs the resulting HTML.
* Then, using JavaScript (jQuery is allowed), add the following functionality: clicking one of the games
* on the left should display the corresponding badges in the panel on the right.
*
*/
/*
$inputArray = ['{"game": "Royal Ruckus","badges": ["Approximate Beatdown", "Huge Money", "Taste the Rainbow", "Done & Dungeon", "Let\'s Rage"]}','{"game": "Cake\'s Tough Break","badges": ["Nip It!", "Yay BMO!", "One Fast Cat", "Hang In There, Baby", "Piece of Cake", "Super Amadeus"]}','{"game": "Lemon Break","badges": ["Lemon Aid", "Sweet Kicks", "BMO Hope", "Elephant Prowess", "Unacceptable Escape"]}','{"game": "Finn & Bones","badges": ["Rock Family Tree", "Clash of Bones", "Chemistry 101", "Mix Master", "Kiss of Death"]}'];

foreach($inputArray as $singleData){
	$jsonData = json_decode($singleData, true);
	print_r($jsonData["game"]);
	echo "<br>";

	foreach($jsonData["badges"] as $badgeItem){
		echo $badgeItem.", ";
	}
	echo "<br><br>";
}
*/

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cake's Tough Break</title>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){ // start function

				$("li").css("list-style-type", "none");

			}); // end function
    </script>
  </head>
  <body>

<?php
$dataJson =  <<<EOT
[{"game":"Royal Ruckus","badges":["Approximate Beatdown","Huge Money","Taste the Rainbow","Done & Dungeon","Let's Rage"]},{"game":"Cake's Tough Break","badges":["Nip It!","Yay BMO!","One Fast Cat","Hang In There, Baby","Piece of Cake","Super Amadeus"]},{"game":"Lemon Break","badges":["Lemon Aid","Sweet Kicks","BMO Hope","Elephant Prowess","Unacceptable Escape"]},{"game":"Finn & Bones","badges":["Rock Family Tree","Clash of Bones","Chemistry 101","Mix Master","Kiss of Death"]}]
EOT;
$badgeArray = json_decode($dataJson, true);
?>
	<div id="main-box">
		<div id="left-box">
			<ul>
					<?php foreach(array_values($badgeArray) as $i => $item){
							echo '<li id="left-game-' . $i . '">' . $item['game'] . '</li>' . "\n";
						};
					?>
	    </ul>
		</div>
		<div id="right-box">
			<?php
				foreach(array_values($badgeArray) as $i => $value){
					echo '<div id="game-' . $i . '">' . "\n";
					echo '<h2>' . $value['game'] . '</h2>' . "\n";
					echo '<ul>' . "\n";
					foreach($value['badges'] as $badge){
						echo '<li>' . $badge . '</li>' . "\n";
					}
					echo '</ul>' . "\n";
					echo '</div>' . "\n";
				}
			?>
		</div>
	</div>
</body>
</html>
