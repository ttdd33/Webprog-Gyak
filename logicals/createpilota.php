<?php
    include 'includes/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST['nev'] != "" && $_POST['nem'] != "" && $_POST['szuldat'] != "" && $_POST['nemzet'] != "") {
            $stmt = $conn->prepare('INSERT into pilota (nev, nem, szuldat, nemzet) VALUES (:nev, :nem, :szuldat, :nemzet)');
            $stmt->execute(array(
                ':nev' => $_POST['nev'],
                ':nem' => $_POST['nem'],
                ':szuldat' => $_POST['szuldat'],
                ':nemzet' => $_POST['nemzet'],
            ));
        echo "<script>window.location.href='index.php?oldal=tablazat';</script>";
        exit;
        }
    }
?>


<form method="POST">
    <div class="col-md-6">
        <label>Név:</label>
        <input type="text" name="nev" class="form-control" placeholder="Név"><br />
        <label>Pilóta neme:</label>
        <select name="nem" class="form-control">
            <option value="">Válassz nemet</option>
            <option value="F">F</option>
            <option value="N">N</option>
        </select><br />
        <label>Születési dátum:</label>
        <input type="date" name="szuldat" class="form-control"><br />
        <label>Pilóta nemzetisége:</label>
        <input type="text" name="nemzet" class="form-control" placeholder="Nemzet"><br />
        <button class="btn btn-primary">Mentés</button>
        <a href="index.php?oldal=tablazat"><button type="button" class="btn btn-danger">Vissza</button></a>
    </div>
</form>
