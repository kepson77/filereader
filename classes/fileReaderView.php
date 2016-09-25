<?php
/*This is a simple file reader application written by Kevin Epson for demonstrative purposes. It employs the Strategy 
 *design pattern.
 *Written by Kevin Epson
 *kepson77@hotmail.com
 */

										/***BEGIN View Code of MVC Arch***/


class fileReaderView {

	public function getView() {
		echo "
			<form enctype='multipart/form-data' name='fileForm' action='$_SERVER[PHP_SELF]' method='POST'>
			<h2>Simple File Reader</h2>
			<h4>Created by Kevin Epson to demonstrate the <u>Strategy Design Pattern</u></h4>
			<br><h3>This application reads files with the following extensions: .csv, .pdf, .xml, and .txt</h3>
			Upload File <input type='file' name='uploadButton'><br><br>
			<input type='hidden' name='formSent' value='1'>
			<input type='submit' value='Read File'>
			</form>
		";		
	}
}
?>