<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db-hotel";
// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
echo ("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT room_number, floor FROM stanze";
$result = $conn->query($sql);

$conn->close();
?>

<?php

include 'functions.php';
$sql = "SELECT id, room_number, floor FROM stanze";
$result = esegui_query($sql);

// apertura tag html, head e body + inclusione navbar
include 'layout/head.php';
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Tutte le stanze dell'hotel</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a id="crea-stanza" class="btn btn-success" href="create.php">
                        Crea nuova stanza
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Room number</th>
                                    <th>Floor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result && $result->num_rows > 0) {

                                    // output data of each row
                                    while($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['room_number']; ?></td>
                                            <td><?php echo $row['floor']; ?></td>
                                            <td>
                                                <a class="btn btn-info" href="details.php?id_stanza=<?php echo $row['id']; ?>">
                                                    Visualizza
                                                </a>
                                                <a class="btn btn-warning" href="edit.php?id_stanza=<?php echo $row['id']; ?>">
                                                    Modifica
                                                </a>
                                                <a class="btn btn-danger" href="delete.php">
                                                    Cancella
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                	}
                                } elseif ($result) { ?>
                                    <tr>
                                        <td colspan="3">Non ci sono risultati</td>
                                    </tr>
                                    <?php
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3">Si è verificato un errore</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
<?php
// footer + chiusura body e html
include 'layout/footer.php'

 ?>
