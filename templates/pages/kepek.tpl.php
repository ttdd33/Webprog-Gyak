 <!-- Forrás: Megoldasok\11-PHP - képek, galéria, képfeltöltés-Web-alkalmazások biztonsága\Képek, galéria, képfeltöltés - config.inc-->
<?php
// ====== Forrás: PDF + minta config/index/feltolt logika alapján ======

$MAPPA = './kepek/';
$TIPUSOK = array('.jpg', '.png');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$DATUMFORMA = "Y.m.d. H:i";
$MAXMERET = 500 * 1024;

$uzenet = array();

// ====== Feltöltés csak bejelentkezett felhasználónak ======
if (isset($_SESSION['login']) && isset($_POST['kuld'])) {
    foreach ($_FILES as $fajl) {

        if ($fajl['error'] == 4) {
            continue; // nem választott fájlt
        }

        if (!in_array($fajl['type'], $MEDIATIPUSOK)) {
            $uzenet[] = "Nem megfelelő fájltípus: " . htmlspecialchars($fajl['name']);
        }
        elseif (
            $fajl['error'] == 1 ||
            $fajl['error'] == 2 ||
            $fajl['size'] > $MAXMERET
        ) {
            $uzenet[] = "Túl nagy állomány: " . htmlspecialchars($fajl['name']);
        }
        else {
            $vegsohely = $MAPPA . strtolower(basename($fajl['name']));

            if (file_exists($vegsohely)) {
                $uzenet[] = "Már létezik ilyen fájl: " . htmlspecialchars($fajl['name']);
            } else {
                if (move_uploaded_file($fajl['tmp_name'], $vegsohely)) {
                    $uzenet[] = "Sikeres feltöltés: " . htmlspecialchars($fajl['name']);
                } else {
                    $uzenet[] = "Sikertelen feltöltés: " . htmlspecialchars($fajl['name']);
                }
            }
        }
    }
}

// ====== Galéria beolvasása ======
$kepek = array();

if (is_dir($MAPPA)) {
    $olvaso = opendir($MAPPA);

    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA . $fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl) - 4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA . $fajl);
            }
        }
    }

    closedir($olvaso);
}

arsort($kepek);
?>
<section>
<h2>Képgaléria</h2>
</section>
<?php if (!empty($uzenet)): ?>
    <ul>
        <?php foreach ($uzenet as $u): ?>
            <li><?= $u ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (isset($_SESSION['login'])): ?>
    <section>
    <h3> Új képek feltöltése </h3>
    </section>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Első kép:</label>
        <input type="file" name="elso" required><br><br>

        <label>Második kép:</label>
        <input type="file" name="masodik"><br><br>

        <label>Harmadik kép:</label>
        <input type="file" name="harmadik"><br><br>

        <input type="submit" name="kuld" value="Feltöltés">
    </form>
<?php else: ?>
    <p><strong>Képfeltöltés csak bejelentkezett felhasználónak engedélyezett.</strong></p>
<?php endif; ?>

<hr>

<div id="galeria">
    <?php foreach ($kepek as $fajl => $datum): ?>
        <div class="kep">
            <a href="<?= $MAPPA . $fajl ?>" target="_blank">
                <img src="<?= $MAPPA . $fajl ?>" alt="<?= htmlspecialchars($fajl) ?>">
            </a>
            <p><strong>Név:</strong> <?= htmlspecialchars($fajl) ?></p>
            <p><strong>Dátum:</strong> <?= date($DATUMFORMA, $datum) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<style>
    #galeria {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }

    .kep {
        width: 200px;
        text-align: center;
    }

    .kep img {
        width: 200px;
        height: auto;
        border: 1px solid #ccc;
        padding: 4px;
        background: #fff;
    }
</style>