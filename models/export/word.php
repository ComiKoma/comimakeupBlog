<?php
require_once "../../config/konekcija.php";
include "../functions.php";


$word = new COM("word.application");

$word->Visible = 0;

//Create new document
$word->Documents->Add();

// Define page margins 
$word->Selection->PageSetup->LeftMargin = '2';
$word->Selection->PageSetup->RightMargin = '2';

// Define font settings
$word->Selection->Font->Name = 'Arial';
$word->Selection->Font->Size = 10;

$autori = oAutoru();
foreach($autori as $autor){
    $word->Selection->TypeText("$autor->naslov \n $autor->tekst");
}
// Add text


// Save document
$filename = tempnam(sys_get_temp_dir(), "word");
$word->Documents[1]->SaveAs("portfolio.doc");

// Close and quit
$word->quit();
unset($word);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=portfolio.doc");

// Send file to browser
readfile($filename);
unlink($filename);
?>