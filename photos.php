<?php
include('global.php');
include('pagesetup.php');


$page = clone $_SESSION['site'];

//css
$page->style('css/galleryView.css');

//javascript
$page->script('Core.js','mjs/script');
$page->script('GalleryStore.js','script');
$page->script('GalleryViewer.js','script');
$page->script('Image.js','script');
$page->script('photosMain.js','script');

//html template
$galleryView = new Code('<div class="galleryViewer"></div>');

$content = $page->findChild('content');

$content->add($galleryView);


//$center->add($welcome);

$page->process();
$page->show();

//$page->awesomeDebug();

?>
