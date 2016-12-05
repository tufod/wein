<?php
// database

function con_db() {
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_set_charset($con, 'utf8');
    mysqli_select_db($con, 'weinhandel_test');
    return $con;
}

function uncon_db() {
    @mysqli_close($con);
}

function list_output($table){
    $con=con_db();
    if($table=='produkt'){
     $sql='SELECT produkt_nummer,produkt_name,produkt_beschr,produkt_preis FROM produkt';   
    }  else {
        
    }
    
    $res= mysqli_query($con,$sql);
    $list='';
    while ($zeil=mysqli_fetch_assoc($res)){
        $list.='<div class="pro">';
        $list.='<img src="images/weinbilder/klein/w'
                .$zeil['produkt_nummer']
                .'.jpg" onerror="this.src=\'images/weinbilder/klein/blank.jpg\' ">';
        $list.=$zeil['produkt_name'].' '.$zeil['produkt_beschr'].', '.$zeil['produkt_preis'].' €';
        $list.=' <a class="button" href="#">Warenkorb</a>';
        
        
        $list.='<input type="button" name="sub" id="'
                .$zeil['produkt_nummer'].'" value="-" onclick="operation(\'-\','
                .$zeil['produkt_nummer'].')">
        <input type="text" name="menge" id="menge" size="3" value="1" onkeyup="menge_pruefen()">
        <input type="button" name="addieren" id="addieren" value="+" onclick="operation(\'+\')">';
        
        
        
        
        $list.='</div>';
    }
    uncon_db($con);
    return $list;
}

//template

function load_tpl($load){
     global $template;
    $template = file_get_contents($load);
}
function tpl_output() {
    global $template;
    echo $template;
}

