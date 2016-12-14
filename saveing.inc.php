<?php

session_start();
require_once './biblio.inc.php';
$id = $_POST['id'];
$produkt_nummer = $_POST['produkt_nummer'];
$produkt_name = $_POST['produkt_name'];
$produkt_beschr = $_POST['produkt_beschr'];
$produkt_preis = floatval($_POST['produkt_preis']);
$produkt_volumen = floatval($_POST['produkt_volumen']);
$name_weintyp = $_POST['name_weintyp'];
$name_weingut = $_POST['name_weingut'];
$produkt_text = $_POST['produkt_text'];
$con = con_db();
$sql = 'SELECT id_weintyp FROM weintyp WHERE name_weintyp =\'' . $name_weintyp . '\';';
$res = mysqli_query($con, $sql);
$id_weintyp = mysqli_fetch_assoc($res);
$idWeinTyp = intval($id_weintyp['id_weintyp']);
$sql = 'SELECT id_weingut FROM weingut WHERE name_weingut =\'' . $name_weingut . '\';';
$res = mysqli_query($con, $sql);
$idweingut = mysqli_fetch_assoc($res);
$idWeinGut = intval($idweingut['id_weingut']);
if ($id == 'new') {
    $sql = 'INSERT INTO produkt (
                     produkt_nummer,
                     produkt_name,
                     produkt_beschr,
                     produkt_preis,
                     produkt_volumen,
                     weintyp_id,
                     weingut_id
                    ,produkt_text
                                )
                                VALUES (
                                ' . $produkt_nummer . ',
                                "' . $produkt_name . '",';
    ($produkt_beschr == '') ? $sql .= '"' . '",' : $sql .= '"' . $produkt_beschr . '",';
    $sql .= $produkt_preis . ',
                                ' . $produkt_volumen . ',
                                ' . $idWeinTyp . ',
                                ' . $idWeinGut;
    ($produkt_text == '') ? $sql .= ',"' . '"' : $sql .= ',"' . $produkt_text . '"';
    $sql .= ');';
    mysqli_query($con, $sql);
    uncon_db($con);
    header('Location: test_khaled.php');
    exit;
} else {
    $id = intval($id);
    $sql = 'UPDATE produkt SET 
                 produkt_nummer=' . $produkt_nummer . ',
                 produkt_name="' . $produkt_name . '",
                 produkt_beschr="' . $produkt_beschr . '",
                 produkt_preis=' . $produkt_preis . ',
                 produkt_volumen=' . $produkt_volumen . ',
                 weintyp_id=' . $idWeinTyp . ',
                 weingut_id=' . $idWeinGut . ',
                 produkt_text="' . $produkt_text . '"
                 WHERE id_produkt=' . $id . ';';
    mysqli_query($con, $sql);
    uncon_db($con);
    header('Location: test_khaled.php');
}
?>
