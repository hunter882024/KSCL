<?php
if (isset($_GET['file']) && isset($_GET['dpc'])){
    if($_GET['file'] == "onl"){
        if($_GET['dpc'] == "bias"){
            $nameFile = "./DPCBIAS.html"; // duong dan
            $name="DPCBIAS";
        }
        else if($_GET['dpc'] == "radial"){
            $nameFile = "./DPCRADIAL.html"; // duong dan
            $name="DPCRADIAL";
        }
    }
    else if($_GET['file'] == "html"){
        if($_GET['dpc'] == "bias"){
            $nameFile = "./data/DPCBIAS.html"; // duong dan
            $name="DPCBIAS";
        }
        else if($_GET['dpc'] == "radial"){
            $nameFile = "./data/DPCRADIAL.html"; // duong dan
            $name="DPCRADIAL";
        }
    }
    else {
        if($_GET['dpc'] == "bias"){
            $nameFile = "./data/databias.js"; // duong dan
            $name="databias";
        }
        else if($_GET['dpc'] == "radial"){
            $nameFile = "./data/dataradial.js"; // duong dan
            $name="dataradial";
        }
    }
    $FileExtension = explode(".",$nameFile)[count(explode(".",$nameFile))-1];
    $file_url = $nameFile;
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=".$name.".".$FileExtension); 
    readfile($file_url);
}
?>