<?php
//create session variable
$sitename = 'mmh';

	if(empty($_SESSION['site']) || strcmp($_SESSION['site']->getSettings()->getSite(),$sitename)!=0)
	{
		Core::debug('site is empty');

		$site = new Page('Mystic Mountain Haunted Hayride','./css/mmh.css');

		$settings = $site->getSettings();
		$settings->setSite($sitename);
		$settings->setScriptBase('./framework/script');
		$site->setFavIcon('true');
		$site->getSettings()->setEmail('support@southerntierstables.com');
		$site->meta('Developer','James M Adams');
		$site->meta('viewport','width=device-width, initial-scale=1');
		$site->setScriptsTop(false);

		$site->getConnect()->dbConnect(false);


		$site->script('jquery-*.min.js');
		$site->script('jquery-ui-*.custom.min.js');

		$account = $site->getAccount();

		$center = new Panel('center');
		$center->setUnique('center');

		//header
		$header = new Panel('header');
		$header->setUnique('header');

		$logo = new Code('<h1>Mystic Mountain Haunted Hayride</h1>');
		$header->add($logo);

		//navigation
		$nav = new Panel('nav');
		$nav->setUnique('nav');

		$home = new Menu('Home','index.php');

		$directions = new Menu('Directions','directions.php');

		$contact = new Menu('Contact','contact.php');

		$facebook = new Menu('<img src="image/square-facebook-32.png" title="Southern Tier Stables on Facebook">','https://www.facebook.com/SouthernTierStables/');
		$facebook->setTarget(true);

		$photos = new Menu('Photos','photos.php');

		$nav->add($home);
		$nav->add($directions);
		//$nav->add($schedule);
		$nav->add($contact);
		$nav->add($photos);
		$nav->add($facebook);

		//content
		$content = new Panel('content');
		$content->setunique('content');

		//footer
		$footer = new Panel('footer');
		$footer->setUnique('footer');
		$copyright = new Code('&copy; '.date('Y').' Southern Tier Stables');
		$footer->add($copyright);


		$site->add($center);
		$center->add($header);
		$center->add($nav);
		$center->add($content);
		$center->add($footer);


		$_SESSION['site']=$site;
	}
	else
	{
		Core::debug('site is not empty');
	}
?>
