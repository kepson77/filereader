<?php
/*This is a simple file reader application written by Kevin Epson for demonstrative purposes. It employs the Strategy 
 *design pattern.
 *Written by Kevin Epson
 *kepson77@hotmail.com
 */

										/***BEGIN Controller Code of MVC Arch***/

require 'fileReaderModel.php';
require 'fileReaderView.php';

ini_set('display_errors', 0);	

class fileReaderController {

	public function initReader() {

		$view = new fileReaderView;
		$view->getView();

		if ($_POST['formSent'] == 1) {

			//get file extension
			function getFileExt() {
				$fileName = $_FILES['uploadButton']['name'];
				$fileExtension = strtoupper(strrev(substr(strrev($fileName), 0, 3)));
				return $fileExtension;
			}

			$fileName = $_FILES['uploadButton']['tmp_name'];
			$fileExtension = getFileExt();
			$open = new fileReadStrategy($fileExtension);
			$open->openExecute($fileName);
		}
	}
}
?>