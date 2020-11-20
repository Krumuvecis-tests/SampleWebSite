<?php
	include "../../pageGenerator/pageGenerator.php";
	pageGenerator\startPage("Lapa3", "lapa3", "../index.php", "layout_lapa3.css");
?>

<!-- šis menu jāpārnes uz pageGenerator -->
<header id="menu" style="width: 100%; min-height: 100px;">
	
	<section>
	<nav id="menuTitle">
		<h1>Galvenais nosaukums</h1>
	</nav>
	
	<article id="menuNavigation">
		<a href="index.php">Sākums</a>
	</article>
	
	<article id="menuNavigation">
		<a href="../lapa2/lapa2.php">Otrā lapa</a>
	</article>
	
	<article id="menuNavigation">
		<a href="../lapa3/lapa3.php">Trešā lapa</a>
	</article>
	
	<header style="text-align: center; height: 100%; width: 100%;">
	asd
	</header>
	
	</section>
</header>

<section style="height: 200px;">

	<header style="text-align: center; height: auto;">
	papildvirsraksts
	</header>
	
	<nav style="float: left; height: 100%; width: 20%; min-width: 100px; background-color: lime;">
		<h1>Sānu panelis</h1>
		
		<ul>
			<li><a href="index.php">atpakaļ</a></li>
		</ul>
	</nav>
	
	<article style="float: left; height: 100%; width: 80%; background-color: red;">
		<h1>Article</h1>
		
	</article>
</section>

<?php
	pageGenerator\finishPage();
?>