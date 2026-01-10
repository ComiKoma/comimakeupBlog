<?php
include_once "models/navigacija/navFunkcije.php";

function procenatPosete() {
    $menuitems = dohvatiNavigaciju();
    $menuCount = new class{};
    $menuCount->notfound = 0;
    $percentage = new class{};
    $percentage->notfound = 0;
    $count = 0;
    foreach($menuitems as $item) {
        $url = $item->hrefLinka;
        $menuCount->{$url} = 0;
        $percentage->{$url} = 0;
    }
    $redovi = file("data/log.txt");
    foreach($redovi as $red){
        $page = explode(" ", $red);
        $vrednost = trim($page[0]); // trim() zbog \n
        $nasao = false;
        foreach($menuitems as $item) {
            if($item->hrefLinka == $vrednost) {
                $url = $item->hrefLinka;
                $menuCount->{$url}++;
                $count++;
            }
        }
        if(!$nasao) {
            if($vrednost == "404") {
                $menuCount['notfound']++;
                $count++;
            }
        }
    }

    foreach($menuitems as $item) {
        $url = $item->hrefLinka;
        $percentage->{$url} = ceil(($menuCount->{$url}/$count) * 100);
    }

    $percentage->notfound = ceil(($menuCount->notfound/$count) * 100);

    return $percentage;
}

function pristupPoslednjemDanu() {
    $menuitems = dohvatiNavigaciju();
    $menuCount = new class{};
    $menuCount->notfound = 0;
    foreach($menuitems as $item) {
        $url = $item->hrefLinka;
        $menuCount->{$url} = 0;
    }
    $redovi = file("data/log.txt");
    foreach($redovi as $red){
        $page = explode(" ", $red);
        $vrednost = trim($page[0]); // trim() zbog \n
        $nasao = false;
        foreach($menuitems as $item) {
            if($item->hrefLinka == $vrednost) {
                $url = $item->hrefLinka;
                $menuCount->{$url}++;
            }
        }
        if(!$nasao) {
            if($vrednost == "404") {
                $menuCount['notfound']++;
            }
        }
    }
    return $menuCount;
}
?>