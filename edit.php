<?php

include 'functions.php';
// apertura tag html, head e body + inclusione navbar
include 'layout/head.php';

$sql = "SELECT * FROM stanze WHERE id = " . $_GET['id_stanza'];
$result = esegui_query($sql);

?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Modifica stanza</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a id="torna-in-home" class="btn btn-success" href="index.php">
                    Torna in homepage
                </a>
            </div>
        </div>
        <?php
        if (!empty($_GET['success'])) {?>
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3"><?php
              if ($_GET['success'] == 'true'){ ?>
                <div class="alert alert-success" role="alert">
                  Stanza inserita con successo
                </div>
                  <?php
                } else {?>
                  <div class="alert alert-danger" role="alert">
                    Si e' verificato un errore
                  </div>
                <?php
              }?>
            </div>
            </div>
            <?php
          }?>
        <div class="row">
            <div class="col-sm-12">

              <?php
              if ($result && $result->num_rows > 0) {

                  // output data of each row
                  $row = $result->fetch_assoc(); ?>

                  <form method="post" action="update.php">
                    <input type="hidden" name="id_stanza" value="<?php echo $row['id']?>">
                    <div class="form-group">
                      <label for="numero_stanza">Numero stanza</label>
                      <input name="numero_stanza" type="text"
                      class="form-control" id="numero_stanza"
                      placeholder="Numero stanza" required
                      value="<?php echo $row['room_number']?>">
                    </div>
                    <div class="form-group">
                      <label for="piano">Piano</label>
                      <input name="piano" type="text"
                      class="form-control" id="piano"
                      placeholder="Piano" required
                      value="<?php echo $row['floor']?>">
                    </div>
                    <div class="form-group">
                      <label for="letti">Numero letti</label>
                      <input name="letti" type="text"
                      class="form-control" id="letti"
                      placeholder="Letti" required
                      value="<?php echo $row['beds']?>">
                    </div>
                    <button type="submit" class="btn btn-success">Modifica stanza</button>
                  </form>
                  <?php
              } elseif ($result) { ?>
                  <p>Stanza inesistente</p>
                  <?php
              } else {
                  ?>
                  <p>Si è verificato un errore</p>
                  <?php
              }
              ?>
            </div>
        </div>
    </div>
</main>
<?php
// footer + chiusura body e html
include 'layout/footer.php'

 ?>
