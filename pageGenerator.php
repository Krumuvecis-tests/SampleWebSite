<?php namespace pageGenerator;
	
	use headGenerator;
	use bodyGenerator;
	
	class PageStart{
		public function __construct($title, $specificLayoutFileName){
			$this -> generateHead($title, $specificLayoutFileName);
			$this -> startBody();
		}
		
		function generateHead($title, $specificLayoutFileName){
			$headInfo = new headGenerator\HeadInfo(
					"lv", $title,
					"standartLayout.css",
					$specificLayoutFileName);
			
			headGenerator\defaultHead($headInfo);
		}
		
		function startBody(){
			bodyGenerator\startBody();
		}
	}
	
	function finishPage(){
		bodyGenerator\finishBody();
		echo "</html>";
	}
?>

<?php namespace headGenerator;
	
	class HeadInfo{
		public $language;
		public $title;
		public $defaultLayoutFileName;
		public $specificLayoutFileName;
		
		
		public function __construct(
				$language, $title,
				$defaultLayoutFileName, $specificLayoutFileName){
			$this->language = $language;
			$this->title = $title;
			$this->defaultLayoutFileName = $defaultLayoutFileName;
			$this->specificLayoutFileName = $specificLayoutFileName;
		}
	}
	
	function defaultHead($headInfo){
		echo "<!DOCTYPE html>";
		echo '<html lang="' . $headInfo->language . '">';
		echo "<head>";
		echo '<meta charset="utf-8">';
		
		readStyles(
				$headInfo->defaultLayoutFileName,
				$headInfo->specificLayoutFileName);
		
		setTitle($headInfo->title);
		
		echo "</head>";
	}
	
	function readStyles(
			$defaultLayoutFileName,
			$specificLayoutFileName){
		
		$_start = '<link rel="stylesheet" type="text/css" href="';
		$_end = '">';
		
		echo $_start . $defaultLayoutFileName . $_end;
		echo $_start . $specificLayoutFileName . $_end;
	}
	
	function setTitle($title){
		echo "<title>";
		echo $title;
		echo "</title>";
	}
?>

<?php namespace bodyGenerator;
	function startBody(){
		echo "<body>";
	}
	
	function finishBody(){
		echo "</body>";
	}
?>