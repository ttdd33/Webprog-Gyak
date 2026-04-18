<?php
    include 'includes/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['nev'] != ""){
            $stmt = $conn->prepare('UPDATE pilota set nev = :nev, nem = :nem, szuldat = :szuldat, nemzet = :nemzet where az = :az');
            $stmt->execute(array(
                ':nev' => $_POST['nev'],
                ':nem' => $_POST['nem'],
                ':szuldat' => $_POST['szuldat'],
                ':nemzet' => $_POST['nemzet'],
                ':az' => $_GET['id'],
            ));
        }
        echo "<script>window.location.href='index.php?oldal=tablazat';</script>";
        exit;
    }

    $stmt = $conn->prepare('SELECT * from pilota where az = :az');
    $stmt->execute(array(':az' => $_GET["id"]));
    $pilotaData = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="POST">
    <div class="col-md-6">
        <label>Név:</label>
        <input type="text" value="<?php echo $pilotaData['nev']; ?>" name="nev" class="form-control" placeholder="Név"><br />
        <label>Pilóta neme:</label>
        <select name="nem" class="form-control">
            <option value="">Válassz nemet</option>
            <option value="F" <?php if($pilotaData['nem'] == 'F') echo 'selected'; ?>>F</option>
            <option value="N" <?php if($pilotaData['nem'] == 'N') echo 'selected'; ?>>N</option>
        </select><br />
        <label>Születési dátum:</label>
        <input type="date" value="<?php echo $pilotaData['szuldat']; ?>" name="szuldat" class="form-control"><br />
        <label>Pilóta nemzetisége:</label>
        <input type="text" value="<?php echo $pilotaData['nemzet']; ?>" name="nemzet" class="form-control" placeholder="Nemzet"><br />
        <button class="btn btn-primary">Mentés</button>
        <a href="index.php?oldal=tablazat"><button type="button" class="btn btn-danger">Vissza</button></a>
    </div>
</form>