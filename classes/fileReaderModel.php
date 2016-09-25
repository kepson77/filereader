<?php
/*This is a simple file reader application written by Kevin Epson for demonstrative purposes. It employs the Strategy 
 *design pattern.
 *Written by Kevin Epson
 *kepson77@hotmail.com
 */

									   /***BEGIN Model Code of MVC Arch***/

/*Implements STRATEGY PATTERN***/

//Common Interface
interface fileRead {
	public function openFile($file);
}

//strategy1 - PDF
class openPDF implements fileRead {
	public $file;
	
	public function openFile($file) {
		$this->file = $file;
		header("Content-Type: Application/pdf");
		readfile($this->file);
	}
}


//strategy2 - CSV
class openCSV implements fileRead {
	public $file;

	public function openFile($file) {
		$this->file = $file;
		$openFile = fopen($file, "r");
		$openFile = fgetcsv($openFile);
		foreach($openFile as $key => $value) {
			echo $key . " ... ". $value;
			foreach($value as $key2 => $value2) {
				echo $value2 . "<br>";
			}
		}
	}
}


//strategy3 - XML
class openXML implements fileRead {

	public $file;

	public function openFile($file) {
		$this->file = $file;
		$xmlFile = simplexml_load_file($this->file);
		echo "Root Element: " . $xmlFile->getName() . "<br>";
		foreach($xmlFile->children() as $child) {
			foreach ($child->attributes() as $attrs) {
				echo $attrs . "<br>";
			}
		}
	}
}

//strategy4 - TXT
class openTXT implements fileRead {
	
	public $file;

	public function openFile($file) {
		$this->file = $file;
		echo file_get_contents($this->file);
	}
}

//strategyLogic
class fileReadStrategy {
	public $strategy;

	public function __construct($fileExtension) {

		switch ($fileExtension) {
			case "CSV": 
			$this->strategy = new openCSV();
			break;

			case "PDF":
			$this->strategy = new openPDF();
			break;

			case "XML":
			$this->strategy = new openXML();
			break;

			case "TXT":
			$this->strategy = new openTXT();
			break;

			default:
			die($fileExtension . " is an incompatible File Type");
		}

	}

	public function openExecute($file) {
		$this->strategy->openFile($file);
	}
}


?>