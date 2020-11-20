<?php namespace pageGenerator;
	
	use siteInfo;
	use pageInfo;
	use defaultOperations;
	
	$siteDetails;
	$pageDetails;
	
	function startPage($pageTitle, $pageDirectory, $backReference, $specificLayoutFileName){
		global $siteDetails;
		$siteDetails = new siteInfo\SiteInfo();
		
		global $pageDetails;
		$pageDetails = new pageInfo\PageInfo($pageDirectory, $pageTitle, $backReference);
		
		defaultOperations\generateHead($siteDetails, $pageDetails, $specificLayoutFileName);
		defaultOperations\startBody();
	}
	
	function finishPage(){
		global $pageDetails;
		defaultOperations\finishBody($pageDetails->backReference);
		echo "</html>";
	}
	
?>

<?php namespace siteInfo;
	
	class SiteInfo{
		public $rootDirectory;
		public $language;
		public $title;
		public $icon;
		public $autors;
		
		public function __construct(){
			$this->rootDirectory = "../";
			$this->language = "lv";
			$this->title = "Ehnatons";
			$this->icon = "icon.ico";
			$this->autors = "Oskars A. Arājs";
		}
	}
?>

<?php namespace pageInfo;
	
	class PageInfo{
		
		public $pageDirectory;
		public $pageTitle;
		public $backReference;
		
		public function __construct($pageDirectory, $pageTitle, $backReference){
			$this->pageDirectory = $pageDirectory;
			$this->pageTitle = $pageTitle;
			$this->backReference = $backReference;
		}
	}
?>

<?php namespace defaultOperations;
	
	include "headGenerator.php";
	use headGenerator;
	
	use bodyGenerator;
	use siteInfo;
	use pageInfo;
	
	function generateHead($siteDetails, $pageDetails, $specificLayoutFileName){
		
		$generatorLocation = "../../pageGenerator/";
		
		$headInfo = new headGenerator\HeadInfo(
				$generatorLocation,
				$siteDetails->language, $siteDetails->title,
				$pageDetails->pageTitle, $siteDetails->icon,
				"standartLayout.css",
				$specificLayoutFileName);
		
		headGenerator\echoDefaultHead($headInfo);
	}
	
	function startBody(){
		bodyGenerator\startBody();
	}
	
	function finishBody($backReference){
		bodyGenerator\finishBody($backReference);
	}
?>

<?php namespace bodyGenerator;
	function startBody(){
		echo "<body>";
	}
	
	function finishBody($backReference){
		if ($backReference != "main") {
			echo "<p>------------<br>";
			echoBackReference($backReference);
			echo "</p>";
		}
		
		echo "</body>";
	}
	
	function echoBackReference($backReference){
		echo "<a href='../" . $backReference . "'>Atpakaļ</a>";
	}
?>