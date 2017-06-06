

<?php session_start();
   	    $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "proiect";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_SESSION["username"]))
		{
   		$sql = mysqli_query($conn, " SELECT * FROM date_user WHERE username='".$_SESSION["username"]."' ");
		$result = $sql->fetch_assoc();
		$nume=$result['nume'];
		$prenume=$result['prenume'];
		$sex=$result['sex'];
		$email=$result['email'];
		$adresa=$result['adresa'];
		$tara=$result['tara'];
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Top players</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
</head>
<body class="body_website">
	<img class="header2" src='../photos/banner1.png' alt="Guess the VIP">
	<ul>
		<li class = "li-customize"><a href="home.php">Home</a></li>
		<li class = "li-customize"><a href="start.php">Start playing</a></li>
		<li class = "li-customize"><a href="top.php">Top players</a></li>
		<li class = "li-customize"><a class="active" href="profile.php">Profile</a></li>
		
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="logout.php">Log out</a></li>
		<li class = "li-customize" style="float:right ;border-left: 1px solid #bbb"><a href="contact.php">Contact</a></li>
	</ul>
	<div class="continut">
	<div style="margin-top:10%;margin-left:10%;width:60%;">
	<p style="font-size:20px;">Formular resetare parola:</p><br>
	<form action="resetare_pass.php" method="POST">
	<p>Parola veche:</p>
	<input type="password" name="oldpas" style="color:white;">
	<p>Parola noua:</p>
	<input type="password" name="newpas" style="color:white;">
	<p>Repetare parola noua:</p>
	<input type="password" name="newpas2" style="color:white;">
	<br><br>
	<input type="submit" value="Resetare parola">
	</form>
	</div>
	<div style="margin-top:10%;width:60%;margin-bottom:10%;margin-left:10%;">
	<p style="font-size:20px;">Date personale:</p><br>
	<p>Nume:</p>
	<input type="text" name="nume" value="<?PHP echo     $nume?>" style="color:white;" disabled>
	<p>Prenume:</p>
	<input type="text" name="prenume"  value="<?PHP echo     $prenume?>" style="color:white;" disabled>
	<p>Sex:</p>
	<select name="sex" disabled>
      <option <?php if ($sex =='masculin' ) echo 'selected' ; ?> value="masculin">Masculin</option>
      <option <?php if ($sex =='feminin' ) echo 'selected' ; ?> value="feminin">Feminin</option>
    </select>
	<br><br>
	<p>Email:</p>
	<input type="email" name="email"  value="<?PHP echo     $email?>" style="color:white;" disabled>
	<p>Adresa:</p>
	<input type="text" name="user"  value="<?PHP echo     $adresa?>" style="color:white;" disabled>
	<p>Tara:</p>
	<select name="tara" value="<?PHP echo     $tara?>" style="width:100%;" disabled>
	<option <?php if ($tara =='AFG' ) echo 'selected' ; ?> value="AFG">Afghanistan</option>
	<option <?php if ($tara =='ALA' ) echo 'selected' ; ?> value="ALA">Åland Islands</option>
	<option <?php if ($tara =='ALB' ) echo 'selected' ; ?> value="ALB">Albania</option>
	<option <?php if ($tara =='DZA' ) echo 'selected' ; ?> value="DZA">Algeria</option>
	<option <?php if ($tara =='ASM' ) echo 'selected' ; ?> value="ASM">American Samoa</option>
	<option <?php if ($tara =='AND' ) echo 'selected' ; ?> value="AND">Andorra</option>
	<option <?php if ($tara =='AGO' ) echo 'selected' ; ?> value="AGO">Angola</option>
	<option <?php if ($tara =='AIA' ) echo 'selected' ; ?> value="AIA">Anguilla</option>
	<option <?php if ($tara =='ATA' ) echo 'selected' ; ?> value="ATA">Antarctica</option>
	<option <?php if ($tara =='ATG' ) echo 'selected' ; ?> value="ATG">Antigua and Barbuda</option>
	<option <?php if ($tara =='ARG' ) echo 'selected' ; ?> value="ARG">Argentina</option>
	<option <?php if ($tara =='ARM' ) echo 'selected' ; ?> value="ARM">Armenia</option>
	<option <?php if ($tara =='ABW' ) echo 'selected' ; ?> value="ABW">Aruba</option>
	<option <?php if ($tara =='AUS' ) echo 'selected' ; ?> value="AUS">Australia</option>
	<option <?php if ($tara =='AUT' ) echo 'selected' ; ?> value="AUT">Austria</option>
	<option <?php if ($tara =='AZE' ) echo 'selected' ; ?> value="AZE">Azerbaijan</option>
	<option <?php if ($tara =='BHS' ) echo 'selected' ; ?> value="BHS">Bahamas</option>
	<option <?php if ($tara =='BHR' ) echo 'selected' ; ?>  value="BHR">Bahrain</option>
	<option <?php if ($tara =='BGD' ) echo 'selected' ; ?>  value="BGD">Bangladesh</option>
	<option <?php if ($tara =='BRB' ) echo 'selected' ; ?>  value="BRB">Barbados</option>
	<option <?php if ($tara =='BLR' ) echo 'selected' ; ?>  value="BLR">Belarus</option>
	<option <?php if ($tara =='BEL' ) echo 'selected' ; ?>  value="BEL">Belgium</option>
	<option <?php if ($tara =='BLZ' ) echo 'selected' ; ?>  value="BLZ">Belize</option>
	<option <?php if ($tara =='BEN' ) echo 'selected' ; ?>  value="BEN">Benin</option>
	<option <?php if ($tara =='BMU' ) echo 'selected' ; ?>  value="BMU">Bermuda</option>
	<option <?php if ($tara =='BTN' ) echo 'selected' ; ?>  value="BTN">Bhutan</option>
	<option <?php if ($tara =='BOL' ) echo 'selected' ; ?>  value="BOL">Bolivia, Plurinational State of</option>
	<option <?php if ($tara =='BES' ) echo 'selected' ; ?>  value="BES">Bonaire, Sint Eustatius and Saba</option>
	<option <?php if ($tara =='BIH' ) echo 'selected' ; ?>  value="BIH">Bosnia and Herzegovina</option>
	<option <?php if ($tara =='BWA' ) echo 'selected' ; ?>  value="BWA">Botswana</option>
	<option <?php if ($tara =='BVT' ) echo 'selected' ; ?>  value="BVT">Bouvet Island</option>
	<option <?php if ($tara =='BRA' ) echo 'selected' ; ?>  value="BRA">Brazil</option>
	<option <?php if ($tara =='IOT' ) echo 'selected' ; ?>  value="IOT">British Indian Ocean Territory</option>
	<option <?php if ($tara =='BRN' ) echo 'selected' ; ?>  value="BRN">Brunei Darussalam</option>
	<option <?php if ($tara =='BGR' ) echo 'selected' ; ?>  value="BGR">Bulgaria</option>
	<option <?php if ($tara =='BFA' ) echo 'selected' ; ?>  value="BFA">Burkina Faso</option>
	<option <?php if ($tara =='BDI' ) echo 'selected' ; ?>  value="BDI">Burundi</option>
	<option <?php if ($tara =='KHM' ) echo 'selected' ; ?>  value="KHM">Cambodia</option>
	<option <?php if ($tara =='CMR' ) echo 'selected' ; ?>  value="CMR">Cameroon</option>
	<option <?php if ($tara =='CAN' ) echo 'selected' ; ?>  value="CAN">Canada</option>
	<option <?php if ($tara =='CPV' ) echo 'selected' ; ?>  value="CPV">Cape Verde</option>
	<option <?php if ($tara =='CYM' ) echo 'selected' ; ?>  value="CYM">Cayman Islands</option>
	<option <?php if ($tara =='CAF' ) echo 'selected' ; ?>  value="CAF">Central African Republic</option>
	<option <?php if ($tara =='TCD' ) echo 'selected' ; ?>  value="TCD">Chad</option>
	<option <?php if ($tara =='CHL' ) echo 'selected' ; ?>  value="CHL">Chile</option>
	<option <?php if ($tara =='CHN' ) echo 'selected' ; ?>  value="CHN">China</option>
	<option <?php if ($tara =='CXR' ) echo 'selected' ; ?>  value="CXR">Christmas Island</option>
	<option <?php if ($tara =='CCK' ) echo 'selected' ; ?>  value="CCK">Cocos (Keeling) Islands</option>
	<option <?php if ($tara =='COL' ) echo 'selected' ; ?>  value="COL">Colombia</option>
	<option <?php if ($tara =='COM' ) echo 'selected' ; ?>  value="COM">Comoros</option>
	<option <?php if ($tara =='COG' ) echo 'selected' ; ?>  value="COG">Congo</option>
	<option <?php if ($tara =='COD' ) echo 'selected' ; ?>  value="COD">Congo, the Democratic Republic of the</option>
	<option <?php if ($tara =='COK' ) echo 'selected' ; ?>  value="COK">Cook Islands</option>
	<option <?php if ($tara =='CRI' ) echo 'selected' ; ?>  value="CRI">Costa Rica</option>
	<option <?php if ($tara =='CIV' ) echo 'selected' ; ?>  value="CIV">Côte d'Ivoire</option>
	<option <?php if ($tara =='HRV' ) echo 'selected' ; ?>  value="HRV">Croatia</option>
	<option <?php if ($tara =='CUB' ) echo 'selected' ; ?>  value="CUB">Cuba</option>
	<option <?php if ($tara =='CUW' ) echo 'selected' ; ?>  value="CUW">Curaçao</option>
	<option <?php if ($tara =='CYP' ) echo 'selected' ; ?>  value="CYP">Cyprus</option>
	<option <?php if ($tara =='CZE' ) echo 'selected' ; ?>  value="CZE">Czech Republic</option>
	<option <?php if ($tara =='DNK' ) echo 'selected' ; ?>  value="DNK">Denmark</option>
	<option <?php if ($tara =='DJI' ) echo 'selected' ; ?>  value="DJI">Djibouti</option>
	<option <?php if ($tara =='DMA' ) echo 'selected' ; ?>  value="DMA">Dominica</option>
	<option <?php if ($tara =='DOM' ) echo 'selected' ; ?>  value="DOM">Dominican Republic</option>
	<option <?php if ($tara =='ECU' ) echo 'selected' ; ?>  value="ECU">Ecuador</option>
	<option <?php if ($tara =='EGY' ) echo 'selected' ; ?>  value="EGY">Egypt</option>
	<option <?php if ($tara =='SLV' ) echo 'selected' ; ?>  value="SLV">El Salvador</option>
	<option <?php if ($tara =='GNQ' ) echo 'selected' ; ?>  value="GNQ">Equatorial Guinea</option>
	<option <?php if ($tara =='ERI' ) echo 'selected' ; ?>  value="ERI">Eritrea</option>
	<option <?php if ($tara =='EST' ) echo 'selected' ; ?>  value="EST">Estonia</option>
	<option <?php if ($tara =='ETH' ) echo 'selected' ; ?>  value="ETH">Ethiopia</option>
	<option <?php if ($tara =='FLK' ) echo 'selected' ; ?>  value="FLK">Falkland Islands (Malvinas)</option>
	<option <?php if ($tara =='FRO' ) echo 'selected' ; ?>  value="FRO">Faroe Islands</option>
	<option <?php if ($tara =='FJI' ) echo 'selected' ; ?>  value="FJI">Fiji</option>
	<option <?php if ($tara =='FIN' ) echo 'selected' ; ?>  value="FIN">Finland</option>
	<option <?php if ($tara =='FRA' ) echo 'selected' ; ?>  value="FRA">France</option>
	<option <?php if ($tara =='GUF' ) echo 'selected' ; ?>  value="GUF">French Guiana</option>
	<option <?php if ($tara =='PYF' ) echo 'selected' ; ?>  value="PYF">French Polynesia</option>
	<option <?php if ($tara =='ATF' ) echo 'selected' ; ?>  value="ATF">French Southern Territories</option>
	<option <?php if ($tara =='GAB' ) echo 'selected' ; ?>  value="GAB">Gabon</option>
	<option <?php if ($tara =='GMB' ) echo 'selected' ; ?>  value="GMB">Gambia</option>
	<option <?php if ($tara =='GEO' ) echo 'selected' ; ?>  value="GEO">Georgia</option>
	<option <?php if ($tara =='DEU' ) echo 'selected' ; ?>  value="DEU">Germany</option>
	<option <?php if ($tara =='GHA' ) echo 'selected' ; ?>  value="GHA">Ghana</option>
	<option <?php if ($tara =='GIB' ) echo 'selected' ; ?>  value="GIB">Gibraltar</option>
	<option <?php if ($tara =='GRC' ) echo 'selected' ; ?>  value="GRC">Greece</option>
	<option <?php if ($tara =='GRL' ) echo 'selected' ; ?>  value="GRL">Greenland</option>
	<option <?php if ($tara =='GRD' ) echo 'selected' ; ?>  value="GRD">Grenada</option>
	<option <?php if ($tara =='GLP' ) echo 'selected' ; ?>  value="GLP">Guadeloupe</option>
	<option <?php if ($tara =='GUM' ) echo 'selected' ; ?>  value="GUM">Guam</option>
	<option <?php if ($tara =='GTM' ) echo 'selected' ; ?>  value="GTM">Guatemala</option>
	<option <?php if ($tara =='GGY' ) echo 'selected' ; ?>  value="GGY">Guernsey</option>
	<option <?php if ($tara =='GIN' ) echo 'selected' ; ?>  value="GIN">Guinea</option>
	<option <?php if ($tara =='GNB' ) echo 'selected' ; ?>  value="GNB">Guinea-Bissau</option>
	<option <?php if ($tara =='GUY' ) echo 'selected' ; ?>  value="GUY">Guyana</option>
	<option <?php if ($tara =='HTI' ) echo 'selected' ; ?>  value="HTI">Haiti</option>
	<option <?php if ($tara =='HMD' ) echo 'selected' ; ?>  value="HMD">Heard Island and McDonald Islands</option>
	<option <?php if ($tara =='VAT' ) echo 'selected' ; ?>  value="VAT">Holy See (Vatican City State)</option>
	<option <?php if ($tara =='HND' ) echo 'selected' ; ?>  value="HND">Honduras</option>
	<option <?php if ($tara =='HKG' ) echo 'selected' ; ?>  value="HKG">Hong Kong</option>
	<option <?php if ($tara =='HUN' ) echo 'selected' ; ?>  value="HUN">Hungary</option>
	<option <?php if ($tara =='ISL' ) echo 'selected' ; ?>  value="ISL">Iceland</option>
	<option <?php if ($tara =='IND' ) echo 'selected' ; ?>  value="IND">India</option>
	<option <?php if ($tara =='IDN' ) echo 'selected' ; ?>  value="IDN">Indonesia</option>
	<option <?php if ($tara =='IRN' ) echo 'selected' ; ?>  value="IRN">Iran, Islamic Republic of</option>
	<option <?php if ($tara =='IRQ' ) echo 'selected' ; ?>  value="IRQ">Iraq</option>
	<option <?php if ($tara =='IRL' ) echo 'selected' ; ?>  value="IRL">Ireland</option>
	<option <?php if ($tara =='IMN' ) echo 'selected' ; ?>  value="IMN">Isle of Man</option>
	<option <?php if ($tara =='ISR' ) echo 'selected' ; ?>  value="ISR">Israel</option>
	<option <?php if ($tara =='ITA' ) echo 'selected' ; ?>  value="ITA">Italy</option>
	<option <?php if ($tara =='JAM' ) echo 'selected' ; ?>  value="JAM">Jamaica</option>
	<option <?php if ($tara =='JPN' ) echo 'selected' ; ?>  value="JPN">Japan</option>
	<option <?php if ($tara =='JEY' ) echo 'selected' ; ?>  value="JEY">Jersey</option>
	<option <?php if ($tara =='JOR' ) echo 'selected' ; ?>  value="JOR">Jordan</option>
	<option <?php if ($tara =='KAZ' ) echo 'selected' ; ?>  value="KAZ">Kazakhstan</option>
	<option <?php if ($tara =='KEN' ) echo 'selected' ; ?>  value="KEN">Kenya</option>
	<option <?php if ($tara =='KIR' ) echo 'selected' ; ?>  value="KIR">Kiribati</option>
	<option <?php if ($tara =='PRK' ) echo 'selected' ; ?>  value="PRK">Korea, Democratic People's Republic of</option>
	<option <?php if ($tara =='KOR' ) echo 'selected' ; ?>  value="KOR">Korea, Republic of</option>
	<option <?php if ($tara =='KWT' ) echo 'selected' ; ?>  value="KWT">Kuwait</option>
	<option <?php if ($tara =='KGZ' ) echo 'selected' ; ?>  value="KGZ">Kyrgyzstan</option>
	<option <?php if ($tara =='LAO' ) echo 'selected' ; ?>  value="LAO">Lao People's Democratic Republic</option>
	<option <?php if ($tara =='LVA' ) echo 'selected' ; ?>  value="LVA">Latvia</option>
	<option <?php if ($tara =='LBN' ) echo 'selected' ; ?>  value="LBN">Lebanon</option>
	<option <?php if ($tara =='LSO' ) echo 'selected' ; ?>  value="LSO">Lesotho</option>
	<option <?php if ($tara =='LBR' ) echo 'selected' ; ?>  value="LBR">Liberia</option>
	<option <?php if ($tara =='LBY' ) echo 'selected' ; ?>  value="LBY">Libya</option>
	<option <?php if ($tara =='LTE' ) echo 'selected' ; ?>  value="LIE">Liechtenstein</option>
	<option <?php if ($tara =='LTU' ) echo 'selected' ; ?>  value="LTU">Lithuania</option>
	<option <?php if ($tara =='LUX' ) echo 'selected' ; ?>  value="LUX">Luxembourg</option>
	<option <?php if ($tara =='MAC' ) echo 'selected' ; ?>  value="MAC">Macao</option>
	<option <?php if ($tara =='MKD' ) echo 'selected' ; ?>  value="MKD">Macedonia, the former Yugoslav Republic of</option>
	<option <?php if ($tara =='MDG' ) echo 'selected' ; ?>  value="MDG">Madagascar</option>
	<option <?php if ($tara =='MWI' ) echo 'selected' ; ?>  value="MWI">Malawi</option>
	<option <?php if ($tara =='MYS' ) echo 'selected' ; ?>  value="MYS">Malaysia</option>
	<option <?php if ($tara =='MDV' ) echo 'selected' ; ?>  value="MDV">Maldives</option>
	<option <?php if ($tara =='MLI' ) echo 'selected' ; ?>  value="MLI">Mali</option>
	<option <?php if ($tara =='MLT' ) echo 'selected' ; ?>  value="MLT">Malta</option>
	<option <?php if ($tara =='MHL' ) echo 'selected' ; ?>  value="MHL">Marshall Islands</option>
	<option <?php if ($tara =='MTQ' ) echo 'selected' ; ?>  value="MTQ">Martinique</option>
	<option <?php if ($tara =='MRT' ) echo 'selected' ; ?>  value="MRT">Mauritania</option>
	<option <?php if ($tara =='MUS' ) echo 'selected' ; ?>  value="MUS">Mauritius</option>
	<option <?php if ($tara =='MYT' ) echo 'selected' ; ?>  value="MYT">Mayotte</option>
	<option <?php if ($tara =='MEX' ) echo 'selected' ; ?>  value="MEX">Mexico</option>
	<option <?php if ($tara =='FSM' ) echo 'selected' ; ?>  value="FSM">Micronesia, Federated States of</option>
	<option <?php if ($tara =='MDA' ) echo 'selected' ; ?>  value="MDA">Moldova, Republic of</option>
	<option <?php if ($tara =='MCO' ) echo 'selected' ; ?>  value="MCO">Monaco</option>
	<option <?php if ($tara =='MNG' ) echo 'selected' ; ?>  value="MNG">Mongolia</option>
	<option <?php if ($tara =='MNE' ) echo 'selected' ; ?>  value="MNE">Montenegro</option>
	<option <?php if ($tara =='MSR' ) echo 'selected' ; ?>  value="MSR">Montserrat</option>
	<option <?php if ($tara =='MAR' ) echo 'selected' ; ?>  value="MAR">Morocco</option>
	<option <?php if ($tara =='MOZ' ) echo 'selected' ; ?>  value="MOZ">Mozambique</option>
	<option <?php if ($tara =='MMR' ) echo 'selected' ; ?>  value="MMR">Myanmar</option>
	<option <?php if ($tara =='NAM' ) echo 'selected' ; ?>  value="NAM">Namibia</option>
	<option <?php if ($tara =='NRU' ) echo 'selected' ; ?>  value="NRU">Nauru</option>
	<option <?php if ($tara =='NPL' ) echo 'selected' ; ?>  value="NPL">Nepal</option>
	<option <?php if ($tara =='NLD' ) echo 'selected' ; ?>  value="NLD">Netherlands</option>
	<option <?php if ($tara =='NCL' ) echo 'selected' ; ?>  value="NCL">New Caledonia</option>
	<option <?php if ($tara =='NZL' ) echo 'selected' ; ?>  value="NZL">New Zealand</option>
	<option <?php if ($tara =='NIC' ) echo 'selected' ; ?>  value="NIC">Nicaragua</option>
	<option <?php if ($tara =='NER' ) echo 'selected' ; ?>  value="NER">Niger</option>
	<option <?php if ($tara =='NGA' ) echo 'selected' ; ?>  value="NGA">Nigeria</option>
	<option <?php if ($tara =='NIU' ) echo 'selected' ; ?>  value="NIU">Niue</option>
	<option <?php if ($tara =='NFK' ) echo 'selected' ; ?>  value="NFK">Norfolk Island</option>
	<option <?php if ($tara =='MNP' ) echo 'selected' ; ?>  value="MNP">Northern Mariana Islands</option>
	<option <?php if ($tara =='NOR' ) echo 'selected' ; ?>  value="NOR">Norway</option>
	<option <?php if ($tara =='OMN' ) echo 'selected' ; ?>  value="OMN">Oman</option>
	<option <?php if ($tara =='PAK' ) echo 'selected' ; ?>  value="PAK">Pakistan</option>
	<option <?php if ($tara =='PLW' ) echo 'selected' ; ?>  value="PLW">Palau</option>
	<option <?php if ($tara =='PSE' ) echo 'selected' ; ?>  value="PSE">Palestinian Territory, Occupied</option>
	<option <?php if ($tara =='PAN' ) echo 'selected' ; ?>  value="PAN">Panama</option>
	<option <?php if ($tara =='PNG' ) echo 'selected' ; ?>  value="PNG">Papua New Guinea</option>
	<option <?php if ($tara =='PRY' ) echo 'selected' ; ?>  value="PRY">Paraguay</option>
	<option <?php if ($tara =='PER' ) echo 'selected' ; ?>  value="PER">Peru</option>
	<option <?php if ($tara =='PHL' ) echo 'selected' ; ?>  value="PHL">Philippines</option>
	<option <?php if ($tara =='PCN' ) echo 'selected' ; ?>  value="PCN">Pitcairn</option>
	<option <?php if ($tara =='POL' ) echo 'selected' ; ?>  value="POL">Poland</option>
	<option <?php if ($tara =='PRT' ) echo 'selected' ; ?>  value="PRT">Portugal</option>
	<option <?php if ($tara =='PRI' ) echo 'selected' ; ?>  value="PRI">Puerto Rico</option>
	<option <?php if ($tara =='QAT' ) echo 'selected' ; ?>  value="QAT">Qatar</option>
	<option <?php if ($tara =='REU' ) echo 'selected' ; ?>  value="REU">Réunion</option>
	<option <?php if ($tara =='ROU' ) echo 'selected' ; ?>  value="ROU">Romania</option>
	<option <?php if ($tara =='RUS' ) echo 'selected' ; ?>  value="RUS">Russian Federation</option>
	<option <?php if ($tara =='RWA' ) echo 'selected' ; ?>  value="RWA">Rwanda</option>
	<option <?php if ($tara =='BLM' ) echo 'selected' ; ?>  value="BLM">Saint Barthélemy</option>
	<option <?php if ($tara =='SHN' ) echo 'selected' ; ?>  value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
	<option <?php if ($tara =='KNA' ) echo 'selected' ; ?>  value="KNA">Saint Kitts and Nevis</option>
	<option <?php if ($tara =='LCA' ) echo 'selected' ; ?>  value="LCA">Saint Lucia</option>
	<option <?php if ($tara =='MAF' ) echo 'selected' ; ?>  value="MAF">Saint Martin (French part)</option>
	<option <?php if ($tara =='SPM' ) echo 'selected' ; ?>  value="SPM">Saint Pierre and Miquelon</option>
	<option <?php if ($tara =='VCT' ) echo 'selected' ; ?>  value="VCT">Saint Vincent and the Grenadines</option>
	<option <?php if ($tara =='WSM' ) echo 'selected' ; ?>  value="WSM">Samoa</option>
	<option <?php if ($tara =='SMR' ) echo 'selected' ; ?>  value="SMR">San Marino</option>
	<option <?php if ($tara =='STP' ) echo 'selected' ; ?>  value="STP">Sao Tome and Principe</option>
	<option <?php if ($tara =='SAU' ) echo 'selected' ; ?>  value="SAU">Saudi Arabia</option>
	<option <?php if ($tara =='SEN' ) echo 'selected' ; ?>  value="SEN">Senegal</option>
	<option <?php if ($tara =='SRB' ) echo 'selected' ; ?>  value="SRB">Serbia</option>
	<option <?php if ($tara =='SYC' ) echo 'selected' ; ?>  value="SYC">Seychelles</option>
	<option <?php if ($tara =='SLE' ) echo 'selected' ; ?>  value="SLE">Sierra Leone</option>
	<option <?php if ($tara =='SGP' ) echo 'selected' ; ?>  value="SGP">Singapore</option>
	<option <?php if ($tara =='SXM' ) echo 'selected' ; ?>  value="SXM">Sint Maarten (Dutch part)</option>
	<option <?php if ($tara =='SVK' ) echo 'selected' ; ?>  value="SVK">Slovakia</option>
	<option <?php if ($tara =='SVN' ) echo 'selected' ; ?>  value="SVN">Slovenia</option>
	<option <?php if ($tara =='SLB' ) echo 'selected' ; ?>  value="SLB">Solomon Islands</option>
	<option <?php if ($tara =='SOM' ) echo 'selected' ; ?>  value="SOM">Somalia</option>
	<option <?php if ($tara =='ZAF' ) echo 'selected' ; ?>  value="ZAF">South Africa</option>
	<option <?php if ($tara =='SGS' ) echo 'selected' ; ?>  value="SGS">South Georgia and the South Sandwich Islands</option>
	<option <?php if ($tara =='SSD' ) echo 'selected' ; ?>  value="SSD">South Sudan</option>
	<option <?php if ($tara =='ESP' ) echo 'selected' ; ?>  value="ESP">Spain</option>
	<option <?php if ($tara =='LKA' ) echo 'selected' ; ?>  value="LKA">Sri Lanka</option>
	<option <?php if ($tara =='SDN' ) echo 'selected' ; ?>  value="SDN">Sudan</option>
	<option <?php if ($tara =='SUR' ) echo 'selected' ; ?>  value="SUR">Suriname</option>
	<option <?php if ($tara =='SJM' ) echo 'selected' ; ?>  value="SJM">Svalbard and Jan Mayen</option>
	<option <?php if ($tara =='SWZ' ) echo 'selected' ; ?>  value="SWZ">Swaziland</option>
	<option <?php if ($tara =='SWE' ) echo 'selected' ; ?>  value="SWE">Sweden</option>
	<option <?php if ($tara =='CHE' ) echo 'selected' ; ?>  value="CHE">Switzerland</option>
	<option <?php if ($tara =='SYR' ) echo 'selected' ; ?>  value="SYR">Syrian Arab Republic</option>
	<option <?php if ($tara =='TWN' ) echo 'selected' ; ?>  value="TWN">Taiwan, Province of China</option>
	<option <?php if ($tara =='TJK' ) echo 'selected' ; ?>  value="TJK">Tajikistan</option>
	<option <?php if ($tara =='TZA' ) echo 'selected' ; ?>  value="TZA">Tanzania, United Republic of</option>
	<option <?php if ($tara =='THA' ) echo 'selected' ; ?>  value="THA">Thailand</option>
	<option <?php if ($tara =='TLS' ) echo 'selected' ; ?>  value="TLS">Timor-Leste</option>
	<option <?php if ($tara =='TGO' ) echo 'selected' ; ?>  value="TGO">Togo</option>
	<option <?php if ($tara =='TKL' ) echo 'selected' ; ?>  value="TKL">Tokelau</option>
	<option <?php if ($tara =='TON' ) echo 'selected' ; ?>  value="TON">Tonga</option>
	<option <?php if ($tara =='TTO' ) echo 'selected' ; ?>  value="TTO">Trinidad and Tobago</option>
	<option <?php if ($tara =='TUN' ) echo 'selected' ; ?>  value="TUN">Tunisia</option>
	<option <?php if ($tara =='TUR' ) echo 'selected' ; ?>  value="TUR">Turkey</option>
	<option <?php if ($tara =='TKM' ) echo 'selected' ; ?>  value="TKM">Turkmenistan</option>
	<option <?php if ($tara =='TCA' ) echo 'selected' ; ?>  value="TCA">Turks and Caicos Islands</option>
	<option <?php if ($tara =='TUV' ) echo 'selected' ; ?>  value="TUV">Tuvalu</option>
	<option <?php if ($tara =='UGA' ) echo 'selected' ; ?>  value="UGA">Uganda</option>
	<option <?php if ($tara =='UKR' ) echo 'selected' ; ?>  value="UKR">Ukraine</option>
	<option <?php if ($tara =='ARE' ) echo 'selected' ; ?>  value="ARE">United Arab Emirates</option>
	<option <?php if ($tara =='GBR' ) echo 'selected' ; ?>  value="GBR">United Kingdom</option>
	<option <?php if ($tara =='USA' ) echo 'selected' ; ?>  value="USA">United States</option>
	<option <?php if ($tara =='UMI' ) echo 'selected' ; ?>  value="UMI">United States Minor Outlying Islands</option>
	<option <?php if ($tara =='URY' ) echo 'selected' ; ?>  value="URY">Uruguay</option>
	<option <?php if ($tara =='UZB' ) echo 'selected' ; ?>  value="UZB">Uzbekistan</option>
	<option <?php if ($tara =='VUT' ) echo 'selected' ; ?>  value="VUT">Vanuatu</option>
	<option <?php if ($tara =='VEN' ) echo 'selected' ; ?>  value="VEN">Venezuela, Bolivarian Republic of</option>
	<option <?php if ($tara =='VNM' ) echo 'selected' ; ?>  value="VNM">Viet Nam</option>
	<option <?php if ($tara =='VGB' ) echo 'selected' ; ?>  value="VGB">Virgin Islands, British</option>
	<option <?php if ($tara =='VIR' ) echo 'selected' ; ?>  value="VIR">Virgin Islands, U.S.</option>
	<option <?php if ($tara =='WLF' ) echo 'selected' ; ?>  value="WLF">Wallis and Futuna</option>
	<option <?php if ($tara =='ESH' ) echo 'selected' ; ?>  value="ESH">Western Sahara</option>
	<option <?php if ($tara =='YEM' ) echo 'selected' ; ?>  value="YEM">Yemen</option>
	<option <?php if ($tara =='ZMB' ) echo 'selected' ; ?>  value="ZMB">Zambia</option>
	<option <?php if ($tara =='ZWE' ) echo 'selected' ; ?>  value="ZWE">Zimbabwe</option>
</select>
	<br><br>
	<a href="profile_enabled.php"><input type="submit" value="Editare date personale" ></a>
	</div>
	</div>
	
	
	<div class="rightside">
	<h3 class='paddingg' style = "color : gold;">Online Players:</h3>
		<p class='paddingg' >VLAD </p>
		<p class='paddingg' >ANDREI </p>
		<p class='paddingg' >ADMIN </p>
	<div class="profileinfo"><h3 class='paddingg' style = "color : gold;">Profile info: </h3>
	<p class='paddingg' > Total games played: </p>
	<p class='paddingg' > Total used coins: </p>
	<p class='paddingg' > Total unused coins: </p>
	<p class='paddingg' > Personal record: </p>
	<p class='paddingg' > Global rank: </p>
	<p> </p>
	</div>
	</div>
	
	
	<div class="footer">
		<a class="time" id="time" style="float:right;margin-right: 10px;margin-top: 3px; text-decoration:none; color:silver"> 
			<script > 
			
				var time = document.getElementById('time');
				function writeDate () {
					var today = new Date();
					time.innerHTML = today.getHours() +":" + today.getMinutes() + ":" + today.getSeconds();
					time.innerHTML += " " + today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear();
				}

				setInterval(writeDate, 100);
				
			</script>
		</a>
	</div>
	
	
</body>
</html>