<!DOCTYPE html> 
<html> 
<head> 
<meta charset="utf-8"> 
<title>Kapcsolat</title> 
<link rel="stylesheet" type="text/css" href=".styles/kapcsolat.css"> 
<script type="text/javascript" src="logicals/ellenorzes.js"></script> 
</head> 
<body> 
<h1>Kapcsolat</h1> 
 
<form name="kapcsolat" action="logicals/ellenorzszerver.php" onsubmit="return ellenoriz();" method="post"> 

        <div> 
            <label><input type="text" id="email" name="email" placeholder="E-mail (kötelező)" size="30" maxlength="40"> </label> 
            <br/> 
            <label> <textarea id="szoveg" name="szoveg" placeholder="Üzenet (kötelező)" cols="40" rows="10"></textarea> </label> 
            <br/> 

            <input id="kuld" type="submit" value="Küld"> 
            <button onclick="ellenoriz();" type="button">Ellenőriz</button> 
        </div> 
    </form> 
</body> 
</html> 