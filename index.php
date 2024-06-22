<!DOCTYPE html>

<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
	<link rel="icon" href="icon.png">
	<script src="script.js" defer></script>
	<title>Tacodle <?php

	if(isset($_GET['keyId'])) {

		echo '('.$_GET['keyId'].')';

	}

?></title>

</head>

<body onload="loadSettings();">

	<?php

		if(isset($_GET['keyId'])) {

			echo '<div id = "pokoj" name="'.$_GET['keyId'].'">'.$_GET['keyId'].' </div>';

		}

	?>

	<div id = "settings"> 

		Who Killed JFK: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Who Killed JFK"> </br>
		Young Hems: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Young Hems"/></br>
		Trójkąt Warszawski: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Trójkąt warszawski"/></br>
		Umowa o dzieło: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Umowa o dzieło"/></br>
		Wosk: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Wosk"/></br>
		Marmur: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Marmur"/></br>
		Szprycer: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Szprycer"/></br>
		Soma 0.5mg: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Soma 0.5"/></br>
		Soma 0.25mg: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Soma 0.25"/></br>
		Café Belga: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Café Belga"/></br>
		Flagey: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Flagey"/></br>
		Pocztówka z WWA: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Pocztowka"/></br>
		Jarmark: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Jarmark"/></br>
		Europa: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Europa"/></br>
		Nieopublikowane: <input onchange="saveData();" class="customCheckbox" type="checkbox" name="Unpublished"/>

	</div>

	<div id = "lol"> Jakub Gałgan 490072 </div>

	<div id = "punkty"> 0 </div>

	<div id = "mainBlock">

		<div id = "citation"> Z jakiego utworu pochodzi:</br></br>

			<?php 


				echo '';
				echo '<div id = "dailyTrack" gdzieSiePatrzysz="Nie oszukuj" name="Brak"></div>';
				echo '<div id = "dailyImage" name="Brak"></div>';
				echo '<div id = "dailyAlbum" name="Brak"></div>';



			?>

		</div>
		<div id = "podpowiedz" onClick = "showHint()">Pokaż Album</div>
		<center> <div id = "albumImage"></div> </center>

	</div>

	<div id = "search"> 

		<input list = "texts" type = "text" id = "wyszukajKGaZ" name = "search" placeholder="..."/>

		<div id = "guzik" onclick="search()"> > </div>

		<datalist id="texts">

			<option value="Bonfire (Remix)" class = "track WhoKilledJFK">
			<option value="Booze To Glug" class = "track WhoKilledJFK">
			<option value="Brilliant" class = "track WhoKilledJFK">
			<option value="Fake Tits/Ghosts" class = "track WhoKilledJFK">
			<option value="Gods, Mammals, Birds" class = "track WhoKilledJFK">
			<option value="Krusty's Children" class = "track WhoKilledJFK">
			<option value="Larry David Flow" class = "track WhoKilledJFK">
			<option value="Nevermore" class = "track WhoKilledJFK">
			<option value="Not Like Hov" class = "track WhoKilledJFK">
			<option value="Odd Mammal" class = "track WhoKilledJFK">
			<option value="Off/On" class = "track WhoKilledJFK">
			<option value="Redwinebeer" class = "track WhoKilledJFK">
			<option value="Stormtrooper with Horns" class = "track WhoKilledJFK">
			<option value="Such a Pretty Child" class = "track WhoKilledJFK">
			<option value="Twists" class = "track WhoKilledJFK">

			<option value="Blueberries" class = "track YoungHems">
			<option value="Chewbacca" class = "track YoungHems">
			<option value="Fuck Your List" class = "track YoungHems">
			<option value="Helle Berry" class = "track YoungHems">
			<option value="Listening To Arctic Monkeys" class = "track YoungHems">
			<option value="Luck" class = "track YoungHems">
			<option value="Normal Man / Pop Vulture" class = "track YoungHems">
			<option value="Twenty Two" class = "track YoungHems">		

			<option value="(Przerywnik)" class = "track Trójkątwarszawski">
			<option value="900729" class = "track Trójkątwarszawski">
			<option value="Marsz, Marsz" class = "track Trójkątwarszawski">
			<option value="Mięso" class = "track Trójkątwarszawski">
			<option value="Szlugi i Kalafiory" class = "track Trójkątwarszawski">
			<option value="Trójkąt" class = "track Trójkątwarszawski">
			<option value="Wszystko Jedno" class = "track Trójkątwarszawski">

			<option value="+4822" class = "track Umowaodzieło">
			<option value="100 kmh" class = "track Umowaodzieło">
			<option value="6 zer" class = "track Umowaodzieło">
			<option value="A mówiłem Ci" class = "track Umowaodzieło">
			<option value="Awizo" class = "track Umowaodzieło">
			<option value="Białkoholicy" class = "track Umowaodzieło">
			<option value="Następna stacja" class = "track Umowaodzieło">
			<option value="Od zera" class = "track Umowaodzieło">

			<option value="515" class = "track Wosk">
			<option value="BXL" class = "track Wosk">
			<option value="Koła" class = "track Wosk">
			<option value="Szczerze" class = "track Wosk">
			<option value="Wiatr" class = "track Wosk">
			<option value="Wosk" class = "track Wosk">

			<option value="Deszcz na betonie" class = "track Marmur">
			<option value="Grubo-chude psy" class = "track Marmur">
			<option value="Jak cień" class = "track Marmur">
			<option value="Krwawa jesień" class = "track Marmur">
			<option value="Marmur" class = "track Marmur">
			<option value="Mgła I (Siwe włosy)" class = "track Marmur">
			<option value="Mgła II (Mówisz, masz)" class = "track Marmur">
			<option value="Portier!" class = "track Marmur">
			<option value="To by było na tyle" class = "track Marmur">
			<option value="Tsunami blond" class = "track Marmur">
			<option value="Witaj w hotelu Marmur" class = "track Marmur">
			<option value="Ściany mają uszy" class = "track Marmur">
			<option value="Ślepe sumy" class = "track Marmur">
			<option value="Świat Jest WFem" class = "track Marmur">
			<option value="Świecące prostokąty" class = "track Marmur">
			<option value="Żyrandol" class = "track Marmur">
			<option value="Żywot" class = "track Marmur">

			<option value="35" class = "track Szprycer">
			<option value="Chodź" class = "track Szprycer">
			<option value="Dele" class = "track Szprycer">
			<option value="Głupi Byt" class = "track Szprycer">
			<option value="I.S.W.T" class = "track Szprycer">
			<option value="Karimata (mute)" class = "track Szprycer">
			<option value="Nostalgia" class = "track Szprycer">
			<option value="Saldo '07" class = "track Szprycer">
			<option value="Tlen" class = "track Szprycer">

			<option value="8 kobiet" class = "track Soma0.5">
			<option value="Art-B" class = "track Soma0.5">
			<option value="Ekodiesel" class = "track Soma0.5">
			<option value="Giro d'Italia" class = "track Soma0.5">
			<option value="Intro" class = "track Soma0.5">
			<option value="Kryptowaluty" class = "track Soma0.5">
			<option value="Metallica 808" class = "track Soma0.5">
			<option value="Mleko i miód" class = "track Soma0.5">
			<option value="Nóż" class = "track Soma0.5">
			<option value="PIN" class = "track Soma0.5">
			<option value="Sectumsempra" class = "track Soma0.5">
			<option value="Soma" class = "track Soma0.5">
			<option value="Tamagotchi" class = "track Soma0.5">
			<option value="Visa" class = "track Soma0.5">
			<option value="Wiem" class = "track Soma0.5">

			<option value="Benevento" class = "track Soma0.25">
			<option value="C3PO" class = "track Soma0.25">
			<option value="Leonardo" class = "track Soma0.25">
			<option value="Moje demony uciekły na urlop" class = "track Soma0.25">
			<option value="Outro" class = "track Soma0.25">
			<option value="TLC" class = "track Soma0.25">

			<option value="2031" class = "track CaféBelga">
			<option value="4 AM in Girona" class = "track CaféBelga">
			<option value="Abonent jest czasowo niedostępny" class = "track CaféBelga">
			<option value="Adieu" class = "track CaféBelga">
			<option value="Café Belga" class = "track CaféBelga">
			<option value="Fiji" class = "track CaféBelga">
			<option value="Modigliani" class = "track CaféBelga">
			<option value="Motorola" class = "track CaféBelga">
			<option value="Reżyseria: Kubrick" class = "track CaféBelga">
			<option value="Wszystko na niby" class = "track CaféBelga">
			<option value="ZTM" class = "track CaféBelga">

			<option value="Anja" class = "track Flagey">
			<option value="Bakayoko" class = "track Flagey">
			<option value="Czarna Kawa Czeka" class = "track Flagey">
			<option value="Italodisco" class = "track Flagey">
			<option value="Pokédex" class = "track Flagey">

			<option value="Alert RCB" class = "track Pocztowka">
			<option value="Antysmogowa maska w moim carry-on baggage" class = "track Pocztowka">
			<option value="Człowiek z dziurą zamiast krtani" class = "track Pocztowka">
			<option value="Kabriolety" class = "track Pocztowka">
			<option value="Leci nowy Future" class = "track Pocztowka">
			<option value="Sanatorium" class = "track Pocztowka">
			<option value="Tijuana" class = "track Pocztowka">
			<option value="W piątki leżę w wannie" class = "track Pocztowka">
			<option value="Wujek Dobra Rada" class = "track Pocztowka">
			<option value="WWA VHS" class = "track Pocztowka">
			<option value="Wytrawne (z nutą desperacji)" class = "track Pocztowka">

			<option value="1990s Utopia" class = "track Jarmark">
			<option value="Dwuzłotówki Dancing" class = "track Jarmark">
			<option value="Influenza" class = "track Jarmark">
			<option value="Nie mam czasu" class = "track Jarmark">
			<option value="Panie, to Wyście!" class = "track Jarmark">
			<option value="POL Smoke" class = "track Jarmark">
			<option value="Polskie Tango" class = "track Jarmark">
			<option value="Szczękościsk" class = "track Jarmark">
			<option value="W.N.P" class = "track Jarmark">
			<option value="Łańcuch I: Kiosk" class = "track Jarmark">
			<option value="Łańcuch II: Korek" class = "track Jarmark">
			<option value="Łańcuch III: Korpo" class = "track Jarmark">

			<option value="Big Pharma" class = "track Europa">
			<option value="Europa" class = "track Europa">
			<option value="Grand Prix" class = "track Europa">
			<option value="Luxembourg" class = "track Europa">
			<option value="Michael Essien Birthday Party" class = "track Europa">
			<option value="Na Paryskie Getto Pada Deszcz" class = "track Europa">
			<option value="Nie Ufam Sobie Sam" class = "track Europa">
			<option value="Ortalion" class = "track Europa">
			<option value="Pieniądz I Terror" class = "track Europa">
			<option value="Pireneje" class = "track Europa">
			<option value="Sztylet" class = "track Europa">
			<option value="Toskania Outro" class = "track Europa">
			<option value="WWA NIE Berlin" class = "track Europa">

			<option value="Algorytm" class = "track Unpublished">
			<option value="CC" class = "track Unpublished">
			<option value="GBP Freestyle" class = "track Unpublished">
			<option value="Metropolis" class = "track Unpublished">
			<option value="Nowy Wspaniały Świat" class = "track Unpublished">
			<option value="Sznycel" class = "track Unpublished">
			<option value="trollface" class = "track Unpublished">
			<option value="Tunarzywo" class = "track Unpublished">
			<option value="Wielki Gatsby z Benzynowej Stacji" class = "track Unpublished">

		</datalist>

	</div>

	<center>

	<div id = "wrongList"> 

		<!--<div class = "wrong"> Taco Hemingway - Karimata (mute) </div>

		<div class = "right"> Taco Hemingway - Tlen </div>-->

	</div>



</body>

</html>