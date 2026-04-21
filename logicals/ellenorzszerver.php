<?php 
// Csak akkor indítjuk el a session-t, ha még nincs elindítva
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Adatbázis kapcsolat
require_once("../includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hibak = [];

    // 1. Név meghatározása a belep.php változói alapján
    if (isset($_SESSION['login'])) {
        // Ha van login, összefűzzük a családnevet és az utónevet
        $mentendo_nev = $_SESSION['csn'] . " " . $_SESSION['un'];
    } else {
        $mentendo_nev = "vendég";
    }

    // 2. Validáció
    $re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/'; 
    if(!isset($_POST['email']) || !preg_match($re, $_POST['email'])) {
        $hibak[] = "Hibás email formátum.";
    }

    if(!isset($_POST['szoveg']) || empty(trim($_POST['szoveg']))) {
        $hibak[] = "Az üzenet szövege nem maradhat üres.";
    }

    // 3. Mentés az adatbázisba
    if (empty($hibak)) {
        try {
            // A $conn változót a db_connect.php biztosítja
            $sql = "INSERT INTO uzenetek (nev, email, szoveg, datum) VALUES (:nev, :email, :szoveg, NOW())";
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(':nev', $mentendo_nev);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':szoveg', $_POST['szoveg']);
            
            $stmt->execute();

            echo "<h3>Sikeres mentés!</h3>";
            echo "<p>Beküldő: <strong>$mentendo_nev</strong></p>";
            echo "<p>Időpont: " . date("Y-m-d H:i:s") . "</p>";
            echo "<br><a href='../index.php'>Vissza a főoldalra</a>";

        } catch(PDOException $e) {
            echo "Adatbázis hiba: " . $e->getMessage();
        }
    } else {
        echo "<h3>Hiba történt:</h3><ul>";
        foreach ($hibak as $hiba) {
            echo "<li style='color:red;'>$hiba</li>";
        }
        echo "</ul>";
        echo "<a href='javascript:history.back()'>Vissza az űrlaphoz</a>";
    }
}
?>