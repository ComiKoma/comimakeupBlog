<?php
require_once "../../config/konekcija.php";
include "../postovi/postoviFunkcije.php";

$posts = dohvatiSvePostove();

$excel_app = new COM("Excel.Application");
$excel_app->Visible = true;
$excel_app->DisplayAlerts = false;
$excel_fajl = $excel_app->Workbooks->Add();
$worksheet = $excel_fajl->Worksheets("Sheet1");
$worksheet->activate;

$polje_A1 = $worksheet->Range("A1");
$polje_A1->activate;
$polje_A1->Value = "Naslov";

$polje_B1 = $worksheet->Range("B1");
$polje_B1->activate;
$polje_B1->Value = "Datum";

$polje_C1 = $worksheet->Range("C1");
$polje_C1->activate;
$polje_C1->Value = "Tekst";

$br=2;
foreach($posts as $post){
    $poljeA = $worksheet->Range("A".$br);
    $poljeA->activate;
    $poljeA->Value = "$post->naslovPosta";

    $poljeB = $worksheet->Range("B".$br);
    $poljeB->activate;
    $poljeB->Value = "$post->datPosta";

    $poljeC = $worksheet->Range("C".$br);
    $poljeC->activate;
    $poljeC->Value = "$post->tekstPosta";
    $br++;
}

$excel_fajl->_SaveAs("http://localhost/comimakeupBlog.rs/models/post/postovi.xlsx");

$excel_fajl->Close;
$excel_app->Quit();

?>