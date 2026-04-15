<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="icon" type="image/png" href="./images/f1-kis.png" >
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<link rel="stylesheet" href="./styles/menu.css" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
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
             <strong><?= $_SESSION['csn']." ".$_SESSION['un'] ?></strong>
            </span>
        </div>
        <?php } ?>
    </header>

    <nav>
    <ul class="top-level-menu">
        <?php foreach ($oldalak as $url => $oldal) { 
            // 1. Ha be vagyunk lépve, ne mutassa a "Belépés" menüpontot
            if(isset($_SESSION['login']) && $url == 'belepes') continue;
            
            // 2. Ha NEM vagyunk belépve, ne mutassa a "Kilépés" menüpontot
            if(!isset($_SESSION['login']) && $url == 'kilepes') continue;
            
            // 3. A rejtett (szöveg nélküli) oldalakat (pl. regisztral, belep) ne tegye a menübe
            if($oldal['szoveg'] == "") continue;
        ?>
            <li>
                <a href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                    <?= $oldal['szoveg'] ?>
                </a>
                <?php if (isset($oldal['almenu'])) { ?>
                    <ul class="second-level-menu">
                        <?php foreach($oldal['almenu'] as $alurl => $aloldal) { ?>
                            <li><a href="?oldal=<?= $alurl ?>"><?= $aloldal['szoveg'] ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
</nav>

    <div id="wrapper"> <div id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
        
        <footer>
            <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
            &nbsp;
            <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
        </footer>
    </div> </body>
</html>
