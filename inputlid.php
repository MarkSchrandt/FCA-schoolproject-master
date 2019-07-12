<?php
$voornaam = "";
$achternaam = "";
$geboortedatum = "";
$aanhef = "";
$postcode = "";
$plaats = "";
$straat = "";
$huisnummer = "";
$telefoonnummer = "";
$mobielnummer = "";
$email = "";
$soortlid="";
$id = "";
$betaalt = "";
$hoeveel = "";
$kosten = "";
$training = "";
if(!empty ($lid)){
    $voornaam = $lid["voornaam"];
    $achternaam = $lid["achternaam"];
    $geboortedatum = $lid["geboortedatum"];
    $aanhef = $lid["aanhef"];
    $postcode = $lid["postcode"];
    $plaats = $lid["plaats"];
    $straat = $lid["straat"];
    $huisnummer = $lid["huisnummer"];
    $telefoonnummer = $lid["telefoonnummer"];
    $mobielnummer = $lid["mobielnummer"];
    $email = $lid["email"];
    $soortlid = $lid["soortlid"];
    $id = $lid["id"];
    $betaalt = $lid["betaalt"];
    $hoeveel = $lid["hoeveel"];
    $kosten = $lid["kosten"];
    $training = $lid["training"];
}
?>

<input type="text"   required name="voornaam"      placeholder="Voornaam"      class="form-control form-group" value="<?php echo $voornaam;?>">
<input type="text"   required name="achternaam"    placeholder="Achternaam"    class="form-control form-group" value="<?php echo $achternaam;?>">
<input type="date"   required name="geboortedatum" placeholder="Geboortedatum" class="form-control form-group" value="<?php echo $geboortedatum;?>">
<label>Aanhef</label>
<select name="aanhef" class="form-control form-group" value="<?php echo $aanhef;?>">
    <option>Dhr.</option>
    <option>Mevr.</option>
</select>
<input type="text"   required name="postcode"   placeholder="Postcode"       class="form-control form-group" value="<?php echo $postcode;?>">
<input type="text"   required name="plaats"     placeholder="Plaats"         class="form-control form-group" value="<?php echo $plaats;?>">
<input type="text"   required name="straat"     placeholder="Straat"         class="form-control form-group" value="<?php echo $straat;?>">
<input type="number" required name="huisnummer" placeholder="Huisnummer"     class="form-control form-group" value="<?php echo $huisnummer;?>">
<input type="number" name="telefoonnummer"      placeholder="Telefoonnummer" class="form-control form-group" value="<?php echo$telefoonnummer;?>">
<input type="number" name="mobielnummer"        placeholder="Mobielnummer"   class="form-control form-group" value="<?php echo $mobielnummer;?>">
<input type="email"  required name="email"      placeholder="Email"          class="form-control form-group" value="<?php echo $email;?>">

<label>Soortlid</label>
<select required name="soortlid" class="form-control form-group" value="<?php echo $soortlid;?>">
    <option>senioren</option>
    <option>recreanten</option>
    <option>jeugd a</option>
    <option>jeugd b</option>
    <option>jeugd c</option>
    <option>minis</option>
    <option>verenigingslid</option>
    <option>bijzonderlid</option>
</select>

<label>Betaalt</label>
<select name="betaalt" class="form-control form-group" value="<?php echo $betaalt;?>">
    <option>Ja</option>
    <option>Nee</option>
</select>

<input type="number" name="hoeveel"  placeholder="Hoeveel"  class="form-control form-group" value="<?php echo $hoeveel;?>">

<label>Training</label>
<select name="training" class="form-control form-group" value="<?php echo $training;?>">
    <option>1,5 uur</option>
    <option>2 uur</option>
    <option>heren 1 uur</option>
    <option>dames 1 uur</option>
    <option>jeugd > 2,5 uur</option>
</select>
<input type="number" name="kosten"   placeholder="Nog te betalen kosten"   class="form-control form-group" value="<?php echo $kosten;?>">
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="submit" value="Verzenden" class="btn btn-primary form-group">