<?php
include('global.php');
include('pagesetup.php');


$page = clone $_SESSION['site'];

$page->setTitle('Directions - Mystic Mountain Haunted Hayride');


$content = $page->findChild('content');

$html = file_get_contents('html/'.'directions.html');

$text= new Text('',$html);

$map = new Code('<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11725.052708850559!2d-76.3602621!3d42.7193201!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x863e535c217e45ab!2sSouthern+Tier+Stables!5e0!3m2!1sen!2sus!4v1467716539971" frameborder="0" allowfullscreen></iframe>');

$content->add($text);
$content->add($map);


//$center->add($welcome);

$page->process();
$page->show();

//$page->awesomeDebug();

?>
