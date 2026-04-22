<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="icon" type="image/png" href="./images/f1-kis.png" >
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">

<!-- FORRÁS: Megoldasok\08-Többszintű menü - Bootstrap-Reszponzív-tervezés/2-Bootstrap-reszponzív menü minta, oldal-07.html-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- FORRÁS: Megoldasok\08-Többszintű menü - Bootstrap-Reszponzív-tervezés/2-Bootstrap-reszponzív menü minta, oldal-07.html-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
    <header>
       <div class="header-left">
        <img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
        <h1><?= $fejlec['cim'] ?></h1>
        <?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
    </div>


    <?php if(isset($_SESSION['login'])) { ?>
        <div class="user-box">
            <img src="./images/user-symbol.png" alt="User" class="user-icon">
            <span class="user-name">
             Bejelentkezett: <strong><?= $_SESSION['csn']." ".$_SESSION['un'] ?></strong> (<?= $_SESSION['login'] ?>)
            </span>
        </div>
        <?php } ?>
    </header>
<!-- FORRÁS: Megoldasok\08-Többszintű menü - Bootstrap-Reszponzív-tervezés/2-Bootstrap-reszponzív menü minta, oldal-07.html-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="."><?= $fejlec['cim'] ?></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav top-level-menu">
                <?php foreach ($oldalak as $url => $oldal) { 
                        $belepve = isset($_SESSION['login']);
        
                        $lathatosag = isset($oldal['menun']) ? $oldal['menun'] : array(1, 1);
                      
                        if (!($belepve && $lathatosag[1]) && !(!$belepve && $lathatosag[0])) {
                            continue;
                        }

                        if($oldal['szoveg'] == "") continue;
                        
                        $hasSubmenu = isset($oldal['almenu']);
                ?>
                        <!-- ÚJ: has-submenu osztály -->
                        <!-- FORRÁS: tobbszintu-menu2.html logikája -->
                        <li class="nav-item <?= $hasSubmenu ? 'has-submenu' : '' ?>">
                            <a class="nav-link" href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                                <?= $oldal['szoveg'] ?>
                            </a>
                            
                            <?php if ($hasSubmenu) { ?>
                                <!-- ÚJ: second-level-menu -->
                                <!-- FORRÁS: tobbszintu-menu2.html -->
                                <ul class="second-level-menu">
                                    <?php foreach($oldal['almenu'] as $alurl => $aloldal) { 
                                        $hasThirdLevel = isset($aloldal['almenu']);
                                    ?>
                                        <!-- ÚJ: has-submenu osztály a 2. szinten -->
                                        <!-- FORRÁS: tobbszintu-menu2.html logikája -->
                                        <li class="<?= $hasThirdLevel ? 'has-submenu' : '' ?>">
                                            <a href="?oldal=<?= $alurl ?>">
                                                <?= $aloldal['szoveg'] ?>
                                            </a>

                                            <?php if ($hasThirdLevel) { ?>
                                                <!-- ÚJ: third-level-menu -->
                                                <!-- FORRÁS: tobbszintu-menu2.html -->
                                                <ul class="third-level-menu">
                                                    <?php foreach($aloldal['almenu'] as $harmadikUrl => $harmadikOldal) { ?>
                                                        <li>
                                                            <a href="?oldal=<?= $harmadikUrl ?>">
                                                                <?= $harmadikOldal['szoveg'] ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="wrapper"> 
        <main id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </main>
        
        <footer>
            <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
            &nbsp;
            <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
        </footer>
    </div> 
</body>
</html>
