<?php namespace headGenerator;
	
	class HeadInfo{
		public $generatorLocation;
		public $language;
		public $title_site;
		public $title_page;
		public $icon;
		public $defaultLayoutFileName;
		public $specificLayoutFileName;
		
		
		public function __construct(
				$generatorLocation,
				$language, $title_site, $title_page,
				$icon,
				$defaultLayoutFileName, $specificLayoutFileName){
			$this->generatorLocation = $generatorLocation;
			$this->language = $language;
			$this->title_site = $title_site;
			$this->title_page = $title_page;
			$this->icon = $icon;
			$this->defaultLayoutFileName = $defaultLayoutFileName;
			$this->specificLayoutFileName = $specificLayoutFileName;
		}
	}
	
	function echoDefaultHead($headInfo){
		echo "<!DOCTYPE html>";
		echo '<html lang="' . $headInfo->language . '">';
		echo "<head>";
		echo '<meta charset="utf-8">';
		
		// <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-13">
		// <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-4">
		// <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-12">
		
		$defaultLayoutFileLocation = $headInfo->generatorLocation . $headInfo->defaultLayoutFileName;
		readStyles(
				$defaultLayoutFileLocation,
				$headInfo->specificLayoutFileName);
		
		setTitle($headInfo->title_page, $headInfo->title_site);
		setIcon($headInfo->generatorLocation . $headInfo->icon);
		
		echo "</head>";
	}
	
	function readStyles(
			$defaultLayoutFileLocation,
			$specificLayoutFileLocation){
		
		$_start = '<link rel="stylesheet" type="text/css" href="';
		$_end = '">';
		
		echo $_start . $defaultLayoutFileLocation . $_end;
		echo $_start . $specificLayoutFileLocation . $_end;
	}
	
	function setTitle($title_page, $title_site){
		echo "<title>" . $title_page . " - " . $title_site . "</title>";
	}
	
	function setIcon($iconLocation){
		echo "<link rel='icon' type='image/x-icon' href='" . $iconLocation . "'/>";
	}
?>