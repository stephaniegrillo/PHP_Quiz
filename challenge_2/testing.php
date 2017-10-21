
<?php

$array = array(0 => "a", 1 => "b", 2 => "c", 3 => "d");

for($i = 0; $i < count($array); $i++){

echo $array[$i];

unset($array[$i]);

}

?>



<div id="left-box">
  <ul>
      <?php foreach(array_values($badgeArray) as $i => $item){
          echo "<li id=\"left-game-{$i}\">" . $item['game'] . "</li>";
        };
      ?>
  </ul>
</div>
<div id="right-box">
  <?php
