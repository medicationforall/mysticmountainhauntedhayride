<?php
include('global.php');
include('pagesetup.php');


$page = clone $_SESSION['site'];

$page->setTitle('Contact - Mystic Mountain Haunted Hayride');

$page->setStyle('
#left{
margin-right:10px;
}

#right p{
margin-bottom:0px;
}

#right ul{
margin-top:0px;
}

');

$content = $page->findChild('content');

$right=new Panel('right');
$right->setUnique('right'); 

$left=new Panel('left');
$left->setUnique('left');

$email = new Email("Contact Us");

$contact = new Text('','<b>Donna and Mark Minnoe</b>
<div class="notice">
Address:
<ul>
<li>Southern Tier Stables<br />
2068 Dumplin Hill Rd.<br />
Moravia, N.Y. 13118<br /></li>
</ul>

Phone:
<ul>
<li>Stables: 315-496-2609</li> 
<li>Donna Cell: 315-224-9085</li>
</ul>
Email:
<ul>
<li>contact@southerntierstables.com</li>
</ul>
</div>');



$content->add($left);
$left->add($email);

$content->add($right);
$right->add($contact);

$page->process();
$page->show();

//$page->awesomeDebug();

?>
