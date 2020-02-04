<?php



include 'functions.php';

if(
    !empty($_POST) && !empty($_POST['id_stanza']) &&
    controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))
) {
    // recuperare i dati della stanza da salvare
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);
    $id_stanza = intval($_POST['id_stanza']);

    // salvare la stanza nel db
    $sql = "UPDATE stanze
            SET room_number = $numero_stanza, floor = $piano, beds = $letti, update_at = NOW() WHERE id = $id_stanza";
    $result = esegui_query($sql);
    // svuoto la post così se l'utente ricarica la pagina non creo 2 volte la stessa stanza
    echo $sql;
}
else {
    $result = false;
}


if($result){
  $get_message = '?success=true&id_stanza=' . $id_stanza;
}else {
  $get_message = '?success=false';
}
header('Location: edit.php' .$get_message);

 ?>
