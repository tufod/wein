<?php


$filter_in=$_POST;

$filter_list=array('produkt_name','produkt_volumen','name_weintyp','name_weingut','land_name','name_region','name_kontinent');

$sql4form_feld='SELECT DISTINCT {feld} '
            . 'FROM produkt p JOIN weintyp w ON p.weintyp_id=w.id_weintyp JOIN weingut wg ON '
            . 'p.weingut_id=wg.id_weingut JOIN laender l ON wg.land_id=l.id_land JOIN region r ON'
            . ' wg.region_id=r.id_region JOIN kontinent k ON l.kontinent_id=k.id_kontinent ORDER BY {feld} ASC';



function filter_check($filter_in,$filter_list) {
    foreach($filter_list as $filter_item) {
        if(empty($fielter_in[$filter_item])){
            $filter_check = 0;
        }
        else {
            $filter_check = 1;
            break;
        }
    }
    echo $filter_check;
    //return $filter_check;
}

function filtrator($filter_in) {
    global $filter_list;
    if(filter_check($filter_in,$filter_list)==1) {
    $filtrator=" WHERE ";
    foreach ($filter_list as $filter_item) {
    $filtrator.=filtrator_child($filtrator,$filter_in,$filter_item);
    }
    }
    else {
        $filtrator = "";
    }
    return $filtrator;
}

//feld kann sein produkt_name,produkt_volumen,name_weintyp,name_weingut,land_name,name_region,name_kontinent
function filtrator_child($filtrator,$filter_in,$filter_item) {
    $filtrator_child='';
    if((strlen($filtrator)>7) && (strlen($filter_in[$filter_item])>0)) {
        $filtrator_child.=" AND ";
    }
    if ((isset($filter_in[$filter_item])) && (strlen($filter_in[$filter_item])>0)) {
        $filtrator_child.=$filter_item.' LIKE ';
        $filtrator_child.='"%'.$filter_in[$filter_item].'%"';
        }
    return $filtrator_child;
}
//generate html for div container with filter for list aussicht
function filter_div() {
    $filter_form='<div id="filter" class="filter">';
    $filter_form.='<form action="./liste.php" method="POST">';
    $filter_form.='<p> Name '.generate_html_form_datalist('produkt_name');
    $filter_form.=' Typ '.generate_html_form_datalist('name_weintyp');
    $filter_form.=' Weingut '.generate_html_form_datalist('name_weingut');
    $filter_form.=' Volume '.generate_html_form_datalist('produkt_volumen').'</p></br>';
    $filter_form.=' Land '.generate_html_form_datalist('land_name');
    $filter_form.=' Region '.generate_html_form_datalist('name_region');
    $filter_form.=' Kontinent '.generate_html_form_datalist('name_kontinent');
    $filter_form.='<input type="submit" value="filter">';
    $filter_form.='</form></div>';
    return $filter_form;
}



//$feld kann sein produkt_name,produkt_volumen,name_weintyp,name_weingut,land_name,name_region,name_kontinent
function generate_html_form_datalist($feld) {
    global $sql4form_feld;
    global $filter_in;
    if(!isset($filter_in[$feld])) {
        $filter_in[$feld]="";    
    }
    $sql = str_replace("{feld}",$feld,$sql4form_feld);
    $con = con_db();
    $datalist='<input list="'.$feld.'" name="'.$feld.'" value="'.$filter_in[$feld].'"><datalist id="'.$feld.'">';
    $res = mysqli_query($con, $sql);
    while ($zeil = mysqli_fetch_assoc($res)) {
        $datalist.='<option value="'.$zeil["$feld"].'">';
    }
    $datalist.='</datalist>';
return $datalist; 
}

//$feld kann sein produkt_name,produkt_volumen,name_weintyp,name_weingut,land_name,name_region,name_kontinent
function generate_html_form_select($feld) {
    global $sql4form_feld;
    $sql = str_replace("{feld}",$feld,$sql4form_feld);
    $con = con_db();
    $select='<input list="'.$feld.'" name="'.$feld.'"><select id="'.$feld.'">';
    $res = mysqli_query($con, $sql);
    while ($zeil = mysqli_fetch_assoc($res)) {
        $select.='<option value="'.$zeil["$feld"].'">'.$zeil["$feld"].'</option>';
    }
    $select.='</select>';
return $select; 
}