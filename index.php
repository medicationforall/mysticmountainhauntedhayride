<?php
include('global.php');
include('pagesetup.php');


$index = clone $_SESSION['site'];

$index->meta('keywords','Mystic Mountain Haunted Hayride, mystic, mountain, mystic mountain, haunted, haunted harride, hayride, hay ride, heyride, hey ride, halloween, halloween hayride');
$index->meta('description','Mystic Montain haunted hayride at Southern Tier Stables in Moravia, NY. Offers many events for people of all ages.');


$index->style('css/cubeSlider.css');
/*$index->script('jquery-1.11.2.min.js','script/lib');*/
$index->script('cubeSlider.js','script/');

$header = $index->findChild('header');

$banner = new code('
<div id="wrapper">
  <div id="cube">
    <div class="face one"><img src="image/02.jpg" /></div>
	<div class="face two"><img src="image/01.jpg" /></div>
	<div class="face three"><img src="image/02.jpg" /></div>
    <div class="face four"><img src="image/03.jpg" /></div>
	<div class="face five"><img src="image/04.jpg" /></div>
	<div class="face six"><img src="image/03.jpg" /></div>
  </div>
</div>
');

$header->after($banner);

$content = $index->findChild('content');

$html = file_get_contents('html/'.'index.html');

$text= new Text('',$html);

$content->add($text);

$index->process();
$index->show();


?>
