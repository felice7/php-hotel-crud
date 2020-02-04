<?php

include 'functions.php';

if(
    !empty($_POST) &&
    controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))
) {
    // recuperare i dati della stanza da salvare
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);

    // salvare la stanza nel db
    $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())";
    $result = esegui_query($sql);
    // svuoto la post così se l'utente ricarica la pagina non creo 2 volte la stessa stanza

} else {
    $result = false;
}


if($result){
  $get_message = '?success=true';
}else {
  $get_message = '?success=false';
}
header('Location: create.php' .$get_message);
