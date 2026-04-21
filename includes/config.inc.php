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
    'ceg' => 'Készítette: Harmatiné Pásztor Éva, Deák Dávid'
);

$oldalak = array(
    '/' => array('szoveg' => 'Föoldal', 'fajl' => 'cimlap'),
    'csapatok' => array('szoveg' => 'Csapatok', 'fajl' => 'csapatok', 'almenu' => array(
        'ferrari' => array('szoveg' => 'Ferrari', 'fajl' => 'ferrari', 
            'almenu' => array(
                'leclerc' => array('szoveg' => ' Charles Leclerc', 'fajl' => 'leclerc'),
                'hamilton' => array('szoveg' => 'Lewis Hamilton', 'fajl' => 'hamilton')
    )),

        'mercedes' => array('szoveg' => 'Mercedes', 'fajl' => 'mercedes', 
            'almenu' => array(
                'russell' => array('szoveg' => 'George Russell', 'fajl' => 'russell'),
                'antonelli' => array('szoveg' => 'Kimi Antonelli', 'fajl' => 'antonelli')
    )),

        'redbull' => array('szoveg' => 'Red Bull', 'fajl' => 'redbull', 
            'almenu' => array(
                'verstappen' => array('szoveg' => 'Max Verstappen', 'fajl' => 'verstappen'),
                'hadjar' => array('szoveg' => 'Isack Hadjar', 'fajl' => 'hadjar')


    ))
    )),

    'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás'),
	'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek'),
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