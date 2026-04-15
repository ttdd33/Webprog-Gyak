<?php
$ablakcim = array(
    'cim' => 'Forma1',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
	'cim' => 'Forma 1',
	'motto' => ''
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Mini honlap Kft.'
);

$oldalak = array(
    '/' => array('szoveg' => 'Címlap', 'fajl' => 'cimlap'),
    'csapatok' => array('szoveg' => 'Csapatok', 'fajl' => 'csapatok', 'almenu' => array(
        'ferrari' => array('szoveg' => 'Ferrari', 'fajl' => 'ferrari'),
        'mercedes' => array('szoveg' => 'Mercedes', 'fajl' => 'mercedes')
    )),

    'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás'),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat'),
	'cikkek' => array('fajl' => 'cikkek', 'szoveg' => 'Cikkek'),
    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Táblázat'),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés'),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés'),
    'belep' => array('fajl' => 'belep', 'szoveg' => ''),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '')

);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>