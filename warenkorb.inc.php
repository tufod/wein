<?php

//on start
if(isset($_GET['delete_id'])) {
    delete_produkt($_GET['delete_id'],$_SESSION['id_warenkorb'],$_SESSION['id_benutzer']);
}
if((isset($_GET['update_id'])) && (isset($_GET['update_menge']))) {
    update_produkt($_GET['update_id'],$_GET['update_menge'],$_SESSION['id_benutzer']);
}
if((isset($_GET['add_id'])) && (isset($_GET['add_menge'])) && (isset($_GET['add_preis']))) {
    insert_produkt($_GET['add_id'],$_GET['add_menge'],$_GET['add_preis'],$_SESSION['id_benutzer']);
}


function delete_produkt($delete_id,$id_warenkorb,$id_benutzer) {
    $id_warenkorb=get_act_warenkorb($id_benutzer);
    $con = con_db();
    $sql='UPDATE warenkorb_items SET menge=0 WHERE warenkorb_id='.$id_warenkorb.' AND produkt_id='.$delete_id;
    echo $sql;
    mysqli_query($con, $sql);
    header('Location: ./warenkorb.php');
}

function update_produkt($update_id,$update_menge,$id_benutzer) {
    $id_warenkorb=get_act_warenkorb($id_benutzer);
    $con = con_db();
    $sql='UPDATE warenkorb_items SET menge='.$update_menge.' WHERE warenkorb_id='.$id_warenkorb.' AND produkt_id='.$update_id;
    mysqli_query($con, $sql);
    header('Location: ./warenkorb.php');
}

function insert_produkt($insert_id,$insert_menge,$insert_preis,$id_benutzer) {
    $id_warenkorb=get_act_warenkorb($id_benutzer);
    $con = con_db();
    if(check_produkt($id_warenkorb,$insert_id)) {
        $sql_update_produkt='UPDATE warenkorb_items SET menge=(menge+'.$insert_menge.') WHERE warenkorb_id='.$id_warenkorb.' AND produkt_id='.$insert_id;
        echo "Produkt war im warenkorb.UPDATED.";
    }
    else {
        $sql_insert_produkt='INSERT INTO warenkorb_items (produkt_id,menge,preis,warenkorb_id) VALUE ('.$insert_id.','.$insert_menge.','.$insert_preis.','.$id_warenkorb.')';
        echo "INSERTED";
    }
    mysqli_query($con, $sql);
    header('Location: ./warenkorb.php');
}


function check_produkt($id_warenkorb,$id_produkt) {
    $con = con_db();
    $sql = 'SELECT * FROM warenkorb_items WHERE produkt_id='.$id_produkt;
    mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)==1) {
       $warenkorb = mysqli_fetch_assoc($res);
    
}
}

//functionen

//pruft ob gibt ein aktives warenkorb, wenn nein generiert eins
// input id_benutzer
// output id_warenkorb
function get_act_warenkorb($id_benutzer) {
    if(!isset($_SESSION['id_warenkorb'])) {
       $con = con_db();
       $sql = 'SELECT id_warenkorb FROM warenkorb WHERE benutzer_id='.$id_benutzer.' AND ISNULL(rechung_id)';
       echo $sql;
       $res = mysqli_query($con, $sql);
       if (!mysqli_affected_rows($con)==0) {
       $warenkorb = mysqli_fetch_assoc($res);
       var_dump($warenkorb);
       $act_warenkorb=$warenkorb['id_warenkorb'];
       }
       else {
       $act_warenkorb=warenkorb_new($id_benutzer);
       }      
    }
    else {
        $act_warenkorb=$_SESSION['id_warenkorb'];
    }
return $act_warenkorb;
}

//generiert ein neues warenkorb fur user
function warenkorb_new($id_benutzer) {
    $con = con_db();
    $sql = 'INSERT INTO warenkorb(benutzer_id) VALUES ('.$id_benutzer.')';
    mysqli_query($con, $sql);
    $id_warenkorb=mysqli_insert_id($con);
    return $id_warenkorb;
}

//sql commando fur warenkorb liste
$sql4warenkorb='SELECT p.id_produkt,produkt_name,p.produkt_beschr,p.produkt_nummer,wi.menge,p.produkt_volumen, CONVERT((wi.preis), DECIMAL(10,2)) AS preis,CONVERT((wi.menge*wi.preis), DECIMAL(10,2)) AS gesamtpreis
FROM warenkorb_items wi
JOIN produkt p ON wi.produkt_id=p.id_produkt
JOIN warenkorb w ON wi.warenkorb_id=w.id_warenkorb
WHERE wi.menge >0 AND w.id_warenkorb=';

//get list 
//parameter
function get_warenkorb() {
  global $sql4warenkorb;
  $con = con_db();
  $id_benutzer=$_SESSION['id_benutzer'];
  $sql=$sql4warenkorb;
  $sql.=get_act_warenkorb($id_benutzer);
  echo $sql;
  $res=mysqli_query($con, $sql);
  $list='<div>Warenkorb</div>';
  $list.='<div><table width="100%" float:>';
  $list.='<thead><tr"><th>Artikel</th><th style="allign:left">Anzahl</th><th>Einzelpreis</th><th>Gesamtpreis</th><th>Wählen</th>';
  $list.='</tr></thead><tbody>';
  while ($list_array = mysqli_fetch_assoc($res)) {
    $list.='<tr>';
    $list.='<td><img src="./Images/weinbilder/klein/w'.$list_array["produkt_nummer"].'.jpg" ';
    $list.='onerror="this.src="./images/weinbilder/klein/blank.jpg" alt="'.$list_array["produkt_name"].'">';
    $list.=$list_array["produkt_name"];
    $list.='<td>'.gen_upd_menge_form($list_array["id_produkt"],$list_array["menge"]).'</td>';
    $list.='<td>'.$list_array["preis"].'</td>';
    $list.='<td>'.$list_array["gesamtpreis"].'</td>';
    $list.='<td>'.gen_del_produkt_link($list_array["id_produkt"]).'</td>';
    $list.='</tr>';
  }
$list.='</tbody></table></div>';
 
  return $list;
  }   

function gen_del_produkt_link($id_produkt) {
    $delete='<a href="./warenkorb.php?delete_id='.$id_produkt.'">';
    $delete.='<img height="20" width="20" src="./images/icons/delete.png" alt="Artikel löschen"></a>';
    return $delete;
}

function gen_upd_menge_form($id_produkt,$menge) {
    $aktualisation='<form action="warenkorb.php" method="GET">';
    $aktualisation.='<input type ="number" name="update_menge" value="'.$menge.'"/>';
    $aktualisation.='<input type ="hidden" name="update_id" value="'.$id_produkt.'"/>';
    $aktualisation.='<input type="image" name="submit" height="20" width="20" src="./images/icons/update.png" alt="Submit"/></form>';
    return $aktualisation;
}