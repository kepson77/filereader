
<?php
/*This is a simple file reader application written by Kevin Epson for demonstrative purposes. It employs the Strategy 
 *design pattern.
 *Written by Kevin Epson
 *kepson77@hotmail.com
 */

									   /***BEGIN application file (reader.php)***/


require 'classes/fileReaderController.php';

$reader = new fileReaderController;
$reader->initReader();



?>