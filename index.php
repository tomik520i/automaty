<?php
session_start();

$chyby = [];
$registrace = [];
$jmeno = "";

// připojení na databázi
require "databaze.php";

// registrace
require "registrace.php";

// přihlášení
require "prihlaseni.php";

// reset hodnoty
require "reset.php";


?>
<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GEMBL!!</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fonts/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
	<div class="container" id="container">

<?php
		if(array_key_exists("prihlasenyUzivatel", $_SESSION) == false)
		{
		?>
	<div class="tlacitka">
		<form>
			<button name="zaregistrovat">Zaregistrovat</button>
			<button name="prihlasit">Přihlásit</button>
		</form>
	</div>
<?php 
if(array_key_exists("prihlasit", $_GET))
{
	?>
	<div class="panel">
		<div class="login">
		<form method="post">
		<div class="log">
			<div class="jmeno">
				Zadejte Jméno: <input type="text" name="jmeno" value="<?php echo $jmeno ?>">
			</div>

			<div class="heslo">
				Zadejte heslo: <input type="password" name="heslo">
			</div>
			</div>

			<div class="prihlasit">
				<button name="prihlasit" id="prihlasit">
					Přihlásit
				</button><br>
				<?php
				echo $chybaPrihlaseni;
				?>
			</div>
		</form>
		</div>
	</div>
<?php
}

if(array_key_exists("zaregistrovat", $_GET))
{
?>
	<div class="panel">
		<div class="registrovat">
		<form method="post">
			<div class="reg">
			<div class="jmeno">
				Zadejte Jméno: <input type="text" name="jmeno" value="<?php echo $jmeno ?>"><br>
			</div>

			<div class="heslo">
				Zadejte heslo: <input type="password" name="heslo"><br>
			</div>
			</div>

			<div class="registrovattlacitko">
				<button name="zaregistrovat">
					Zaregistrovat
				</button><br>
				<?php
			    if (array_key_exists("jmeno", $chyby))
			    {
			        echo "{$chyby['jmeno']}<br>";
			    }
			    ?>
				<?php
			    if (array_key_exists("heslo", $chyby))
			    {
			        echo "{$chyby['heslo']}<br>";
			    }
			    ?>
				<?php
				if (array_key_exists("vseok", $registrace))
				{
				    echo $registrace["vseok"];
				}
				?>
			</div>
		</form>
		</div>
	</div>
<?php
}
}
?>

<?php
if (array_key_exists("prihlasenyUzivatel", $_SESSION))
{
?>
<div class="prihlasenyuzivatel">
<div class="prihlaseny">
	<form method="post">
		<button name="odhlasit">Odhlásit</button>
	</form>
</div>

<div class="reset">
	<form method="get">
	<button name="reset">
		Reset
	</button>
	</form>
</div>
</div>
<h1><?php echo $_SESSION["prihlasenyUzivatel"] ?></h1>
<?php
}
?>



	<div class="zustatek" id="zustatek">

	</div>

	<div class="realnahodnota" id="realnahodnota">

	</div>

	<div class="procentovyhry" id="procentovyhry">

	</div>

	<div class="autoroll">
		<div class="nadpis">
			Auto roll 
		</div>

	<input type="checkbox" id="autoclick" class="autoclick2">

	<label for="autoclick" class="autoclicktlacitko">
		<div class="ohraniceni">
			<div id="kulicka"></div>
			<div class="on">on</div>
			<div class="off">off</div>
		</div>
	</label>
	</div>

	<div class="fastroll">
		<div class="nadpis">
			Fast roll 
		</div>

	<input type="checkbox" id="fastroll" class="fastroll3">

	<label for="fastroll" class="fastrolltlacitko">
		<div class="ohraniceni2">
			<div id="kulicka2"></div>
			<div class="on2">on</div>
			<div class="off2">off</div>
		</div>
	</label>
	</div>

	<div class="okynka">
		<div class="okynko1" id="okynko1">
			<div class="cislo1" id="cislo1">

			</div>
		</div>
		
		<div class="okynko2" id="okynko2">
			<div class="cislo2" id="cislo2">

			</div>
		</div>

		<div class="oknyko3" id="okynko3">
			<div class="cislo3" id="cislo3">

			</div>
		</div>

		<img src="img/paka.png" height="150px" id="paka" class="paka">
	</div>

	<div class="cisla" id="jackpot">
		<div class="input">
			Zadej sázku: <input type="number">
		</div>

		<div class="vsazenaCastka" id="vsazenaCastka">

		</div>

		<div class="vyhra" id="vyhra">

		</div>
	</div>

	<div class="vyhry">
		<div class="dvakrat">
			<div class="procentovyhry2" id="procentovyhry2">

			</div>
			2x <i class="fa-solid fa-dice-one"></i> = 1.5x <br>
			2x <i class="fa-solid fa-ring"></i> = 1.5x <br>
			2x <i class="fa-solid fa-puzzle-piece"></i> = 1.5x <br>
			2x <i class="fa-solid fa-dragon"></i> = 1.5x <br>
			2x <i class="fa-solid fa-hand-fist"></i> = 1.5x <br>
			2x <i class="fa-solid fa-chess-king"></i> = 1.5x <br>
		</div>

		<div class="jackpot">
		<div class="procentovyhry4" id="procentovyhry4">

		</div>
			Jackpot <br>
			<br>
			<i class="fa-solid fa-diamond"></i> <i class="fa-solid fa-diamond"></i> <i class="fa-solid fa-diamond"></i> = 100x <br>
		</div>

		<div class="trikrat">
		<div class="procentovyhry3" id="procentovyhry3">

		</div>
			3x <i class="fa-solid fa-dice-one"></i> = 10x <br>
			3x <i class="fa-solid fa-ring"></i> = 10x <br>
			3x <i class="fa-solid fa-puzzle-piece"></i> = 10x <br>
			3x <i class="fa-solid fa-dragon"></i> = 10x <br>
			3x <i class="fa-solid fa-hand-fist"></i> = 10x <br>
		</div>
	</div>

	<div class="vyhry">
		<div class="pet">
			<div class="procentovyhry2" id="procentovyhry5">

			</div>
			2x <i class="fa-solid fa-skull-crossbones"></i> = 5x <br>
			2x <i class="fa-solid fa-ghost"></i> = 5x <br>
			2x <i class="fa-regular fa-heart"></i> = 5x <br>
			2x <i class="fa-solid fa-diamond"></i> = 5x <br>
		</div>

		<div class="padesat">
		<div class="procentovyhry4" id="procentovyhry6">

		</div>
			Big win <br>
			<br>
			<i class="fa-solid fa-dice-one"></i> <i class="fa-solid fa-ring"></i> <i class="fa-solid fa-puzzle-piece"></i> = 50x <br>
			<i class="fa-solid fa-dragon"></i> <i class="fa-solid fa-hand-fist"></i> <i class="fa-solid fa-chess-king"></i> = 50x <br>
			<i class="fa-solid fa-skull-crossbones"></i> <i class="fa-solid fa-ghost"></i> <i class="fa-regular fa-heart"></i> = 50x <br>
		</div>

		<div class="dvacet">
		<div class="procentovyhry3" id="procentovyhry7">

		</div>
			3x <i class="fa-solid fa-chess-king"></i> = 20x <br>
			3x <i class="fa-solid fa-skull-crossbones"></i> = 20x <br>
			3x <i class="fa-solid fa-ghost"></i> = 20x <br>
			3x <i class="fa-regular fa-heart"></i> = 20x <br>
		</div>
	</div>

<div class="tabulka">
<?php

$dotaz = $db->prepare("SELECT jmeno, castka, nejvyssi FROM uzivatel ORDER BY nejvyssi DESC LIMIT 10");
$dotaz->execute();
$hraci = $dotaz->fetchall();

//var_dump($hraci);
echo "<table border=1>";
echo "<tr> <th colspan='2'>Gambler</th> <th>Nejvyšší hodnota</th> <th>Momentální hodnota</th> </tr>";
foreach ($hraci as $index => $hrac)
{
	$index ++;

	$nejvyssi = number_format($hrac['nejvyssi'],2, ",", " ");
	$hodnota = number_format($hrac['castka'],2, ",", " ");

	//var_dump($hrac);

	echo "<tr> <td>$index.</td> <td>{$hrac['jmeno']}</td> <td>$nejvyssi</td> <td>$hodnota</td> </tr>";
}
echo "</table>";

?>
</div>
</div>

	<script>
		let kulicka2 = document.getElementById("kulicka2");

		let kulicka = document.getElementById("kulicka");

		paka = document.getElementById("paka");

		autoclick = document.getElementById("autoclick");

		autoclick.addEventListener("change", (udalost) => {
			if(autoclick.checked)
			{
				kulicka.classList.add("kulicka");
				console.log("check")
				paka.click();
			}
			else
			{
				console.log("uncheck");
			}
		})
		
		<?php
		if (array_key_exists("prihlasenyUzivatel", $_SESSION))
		{
			?>
			uzivatel = "<?php echo $_SESSION['prihlasenyUzivatel'] ?>";
			<?php
		}
		else
		{
			?>
			uzivatel = "";
			<?php
		}
		?>

			const ajax = new XMLHttpRequest();
			ajax.open("GET", "zjistenihodnoty.php?uzivatel=" + encodeURIComponent(uzivatel), false);
			
			//console.log(ajax);

			ajax.addEventListener("readystatechange", (udalost) => {
				if (ajax.readyState == 4)
				{
					zustatek = ajax.responseText;
					zustatek = zustatek*1;

					console.log(zustatek);

					//return zustatek;
					//console.log(zustatek);
				}
			});

			ajax.send();

			const ajax3 = new XMLHttpRequest();
			ajax3.open("GET", "procenta.php", false);

				ajax3.addEventListener("readystatechange", (udalost) => {
				if (ajax3.readyState == 4)
				{
					cisloprocenta = ajax3.responseText;

					//console.log(cisloprocenta);

					cisloprocenta2 = JSON.parse(cisloprocenta);
				}
			});

			ajax3.send();

			console.log(cisloprocenta2);

		cisloprohra = cisloprocenta2.prohra;
		cislovyhra = cisloprocenta2.vyhra;
		cislovyhrajednaapul = cisloprocenta2.jednaapul;
		cislovyhrasto = cisloprocenta2.jackpot;
		cislovyhradeset = cisloprocenta2.deset;

		cislovyhradvacet = cisloprocenta2.dvacet;
		cislovyhrapadesat = cisloprocenta2.padesat;
		cislovyhrapet = cisloprocenta2.pet;

		let procentovyhry = document.getElementById("procentovyhry")

		vysledek = cislovyhra / cisloprohra * 100;

		vysledek = Math.round(vysledek * 100) / 100;

		vysledek = vysledek.toLocaleString("cs-CZ");

		procentovyhry.innerText = `Procentuální šance na výhru: ${vysledek}%`;

		//----------------------------------------------------------------------

		let procentovyhry2 = document.getElementById("procentovyhry2")

		//----------------------------------------------------------------------

		let procentovyhry3 = document.getElementById("procentovyhry3")

		//-----------------------------------------------------------------------

		let procentovyhry4 = document.getElementById("procentovyhry4")

		//-----------------------------------------------------------------------

vysledek2 = cislovyhrajednaapul / cisloprohra * 100;

console.log(vysledek2)

vysledek2 = Math.round(vysledek2 * 100) / 100;

vysledek2 = vysledek2.toLocaleString("cs-CZ");

procentovyhry2.innerHTML = `Procentuální šance <br> na výhru: ${vysledek2}%`;

//-----------------------------------------------------------------------

vysledek3 = cislovyhradeset / cisloprohra * 100;

console.log(vysledek3);

vysledek3 = Math.round(vysledek3 * 100) / 100;

vysledek3 = vysledek3.toLocaleString("cs-CZ");

procentovyhry3.innerHTML = `Procentuální šance <br> na výhru: ${vysledek3}%`;

//-----------------------------------------------------------------------

vysledek4 = cislovyhrasto / cisloprohra * 100;

console.log(vysledek4);

vysledek4 = Math.round(vysledek4 * 100) / 100;

vysledek4 = vysledek4.toLocaleString("cs-CZ");

procentovyhry4.innerHTML = `Procentuální šance <br> na výhru: ${vysledek4}%`;

		//----------------------------------------------------------------------

		let procentovyhry5 = document.getElementById("procentovyhry5")

		//----------------------------------------------------------------------

		let procentovyhry6 = document.getElementById("procentovyhry6")

		//-----------------------------------------------------------------------

		let procentovyhry7 = document.getElementById("procentovyhry7")

		//-----------------------------------------------------------------------

vysledek5 = cislovyhrapet / cisloprohra * 100;

console.log(vysledek5)

vysledek5 = Math.round(vysledek5 * 100) / 100;

vysledek5 = vysledek5.toLocaleString("cs-CZ");

procentovyhry5.innerHTML = `Procentuální šance <br> na výhru: ${vysledek5}%`;

//-----------------------------------------------------------------------

vysledek6 = cislovyhrapadesat / cisloprohra * 100;

console.log(vysledek6);

vysledek6 = Math.round(vysledek6 * 100) / 100;

vysledek6 = vysledek6.toLocaleString("cs-CZ");

procentovyhry6.innerHTML = `Procentuální šance <br> na výhru: ${vysledek6}%`;

//-----------------------------------------------------------------------

vysledek7 = cislovyhradvacet / cisloprohra * 100;

console.log(vysledek7);

vysledek7 = Math.round(vysledek7 * 100) / 100;

vysledek7 = vysledek7.toLocaleString("cs-CZ");

procentovyhry7.innerHTML = `Procentuální šance <br> na výhru: ${vysledek7}%`;


		console.log(zustatek);

		//console.log(funcajax());

		const okynko1 = document.getElementById("cislo1");
		const okynko2 = document.getElementById("cislo2");
		const okynko3 = document.getElementById("cislo3");

		let zustatek2 = document.getElementById("zustatek");
		//zustatek = 100000;
		//console.log(zustatek);
		const sazka = document.querySelector('[type="number"]');
		const vyhra2 = document.getElementById("vyhra");
		const vsazenaCastka = document.getElementById("vsazenaCastka");

		const c1 = /1[0-9]1|11[0-9]|[0-9]11/;
		const c2 = /2[0-9]2|22[0-9]|[0-9]22/;
		const c3 = /3[0-9]3|33[0-9]|[0-9]33/;
		const c4 = /4[0-9]4|44[0-9]|[0-9]44/;
		const c5 = /5[0-9]5|55[0-9]|[0-9]55/;
		const c6 = /6[0-9]6|66[0-9]|[0-9]66/;
		const c7 = /7[0-9]7|77[0-9]|[0-9]77/;
		const c8 = /8[0-9]8|88[0-9]|[0-9]88/;
		const c9 = /9[0-9]9|99[0-9]|[0-9]99/;
		const c0 = /0[0-9]0|00[0-9]|[0-9]00/;

		const ikony = {
			0: '<i class="fa-solid fa-diamond"></i>',
			1: '<i class="fa-solid fa-dice-one"></i>',
			2: '<i class="fa-solid fa-ring"></i>',
			3: '<i class="fa-solid fa-puzzle-piece"></i>',
			4: '<i class="fa-solid fa-dragon"></i>',
			5: '<i class="fa-solid fa-hand-fist"></i>',
			6: '<i class="fa-solid fa-chess-king"></i>',
			7: '<i class="fa-solid fa-skull-crossbones"></i>',
			8: '<i class="fa-solid fa-ghost"></i>',
			9: '<i class="fa-regular fa-heart"></i>',
		}

		const container = document.getElementById("container");

		let pole1 = [];
		let pole2 = [];
		let pole3 = [];

		odpocet1 = 4;
		odpocet2 = 8;
		odpocet3 = 12;

		zustatek3 = Math.round(zustatek * 100) / 100;

		zustatek4 = zustatek3.toLocaleString("cs-CZ");

		//console.log(zustatek4);

		zustatek2.innerText = `${zustatek4} Kč`;

		let realnahodnota = document.getElementById("realnahodnota");

		automatbezi = false

		fastroll = document.getElementById("fastroll");

		fastroll.addEventListener("change", (udalost) => {
			if(fastroll.checked)
			{
				kulicka2.classList.add("kulicka2");
				cas300 = 100;
				cas500 = 200;
				cas4000 = 1500;
			}
			else
			{
				cas300 = 300;
				cas4000 = 4000;
				cas500 = 500;
			}
		})

		cas300 = 300;
		cas4000 = 4000;
		cas500 = 500;

		jackpot = document.getElementById("jackpot");

		paka.addEventListener("click", (udalost) => {
			
		if (automatbezi == false)
		{

			if (automatbezi == false)
			{
				automatbezi = true
			}

			paka.src = "img/paka.gif";

			const ajax3 = new XMLHttpRequest();
			ajax3.open("GET", "zapiscastky.php?castka=" + encodeURIComponent(zustatek) + "&uzivatel=" + encodeURIComponent(uzivatel), false);

			ajax3.addEventListener("readystatechange", (udalost) => {
				if (ajax3.readyState == 4)
				{
					zustatek = ajax3.responseText;
					zustatek = zustatek*1;
				}
			});
			
			ajax3.send();

			let sazkaVyplneno = sazka.value;
			//console.log(sazkaVyplneno);

			container.style.backgroundImage = ""
			container.style.backgroundSize = ""

			jackpot.style.backgroundImage = "";
			jackpot.style.backgroundSize = "";
			jackpot.style.backgroundRepeat = "";
			jackpot.style.backgroundPosition = "";

			if (zustatek <= 0)
			{
				zustatek2.innerText = `${zustatek4} Kč, Jsi na nule GAMBLERE!!!!!`;

				if(autoclick.checked)
				{
					console.log(autoclick.checked);

					setTimeout(() =>{
						autoclick.click();
					}, 1000)
				}

				if (automatbezi == true)
				{
					automatbezi = false
				}
			}
			else if (zustatek < sazkaVyplneno)
			{
				vyhra2.innerText = `Nemáš dostatečný zůstatek`;

				if(autoclick.checked)
				{
					console.log(autoclick.checked);

					setTimeout(() =>{
						autoclick.click();
					}, 1000)
				}

				if (automatbezi == true)
				{
					automatbezi = false
				}
			}
			else if (sazkaVyplneno == "")
			{
				vyhra2.innerText = `Musíš zadat sázku`;

				if(autoclick.checked)
				{
					console.log(autoclick.checked);

					setTimeout(() =>{
						autoclick.click();
					}, 1000)
				}

				if (automatbezi == true)
				{
					automatbezi = false
				}
			}
			else if (sazkaVyplneno <= 0)
			{
				vyhra2.innerText = `Neplatná částka`;

				if(autoclick.checked)
				{
					console.log(autoclick.checked);

					setTimeout(() =>{
						autoclick.click();
					}, 1000)
				}

				if (automatbezi == true)
				{
					automatbezi = false
				}
			}
			else
			{

			//zustatek = funcajax2();

			zustatek -= sazkaVyplneno;

			zustatek3 = Math.round(zustatek * 100) / 100;

			zustatek4 = zustatek3.toLocaleString("cs-CZ");

			zustatek2.innerText = `${zustatek4} Kč`;

			console.log(zustatek);

			vyhra3 = Math.round(vyhra * 100) / 100;

			vyhra4 = vyhra3.toLocaleString("cs-CZ");

			sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

			sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

			vsazenaCastka.innerText = `Vsazená částka ${sazkaVyplneno3} Kč`;

			let casovac1 = setInterval(() => {
				if (odpocet1 != 0)
				{
					if (cas300 == 300)
					{
						okynko1.style.animationDuration = "300ms"
					}
					else
					{
						okynko1.style.animationDuration = "100ms"
					}

					okynko1.style.animationName = "slide";
					okynko1.style.animationPlayState = "running";
					okynko1.style.animationIterationCount = "3"

					cislo1 = Math.floor(Math.random() * 10);
					okynko1.innerHTML = `${ikony[cislo1]}`;
					odpocet1--;
				}
				if (odpocet1 == 0)
				{
					if (cas500 == 500)
					{
						okynko1.style.animationDuration = "500ms"
					}
					else
					{
						okynko1.style.animationDuration = "200ms"
					}

					okynko1.style.animationName = "slide2";
					okynko1.style.animationPlayState = "running";
					okynko1.style.animationIterationCount = "1"

					clearInterval(casovac1);
					odpocet1 = 4;
					//console.log(odpocet1);

					console.log(`cislo 1 = ${cislo1}`);

					pole1.push(cislo1);
					console.log(`pole 1: ${pole1}`);

				}
			}, cas300)

			let casovac2 = setInterval(() => {
				if (odpocet2 != 0)
				{
					if (cas300 == 300)
					{
						okynko2.style.animationDuration = "300ms"
					}
					else
					{
						okynko2.style.animationDuration = "100ms"
					}

					okynko2.style.animationName = "slide";
					okynko2.style.animationPlayState = "running";
					okynko2.style.animationIterationCount = "7"

					cislo2 = Math.floor(Math.random() * 10);
					okynko2.innerHTML = `${ikony[cislo2]}`;
					odpocet2--;
				}
				if (odpocet2 == 0)
				{
					if (cas500 == 500)
					{
						okynko2.style.animationDuration = "500ms"
					}
					else
					{
						okynko2.style.animationDuration = "200ms"
					}
					okynko2.style.animationName = "slide2";
					okynko2.style.animationPlayState = "running";
					okynko2.style.animationIterationCount = "1"

					clearInterval(casovac2);
					odpocet2 = 8;
					//console.log(odpocet2);

					console.log(`cislo 2 = ${cislo2}`);


					pole2.push(cislo2);
					console.log(`pole 2: ${pole2}`);

					okynko2.style.animationIterationCount = "unset";
					okynko2.classList.remove("cislo2");
				}
			}, cas300)

			let casovac3 = setInterval(() => {
				if (odpocet3 != 0)
					{
						if (cas300 == 300)
						{
							okynko3.style.animationDuration = "300ms"
						}
						else
						{
							okynko3.style.animationDuration = "100ms"
						}

						okynko3.style.animationName = "slide";
						okynko3.style.animationPlayState = "running";
						okynko3.style.animationIterationCount = "11"

						cislo3 = Math.floor(Math.random() * 10);
						okynko3.innerHTML = `${ikony[cislo3]}`;
						odpocet3--;
					}
					if (odpocet3 == 0)
					{
						if (cas500 == 500)
						{
							okynko3.style.animationDuration = "500ms"
						}
						else
						{
							okynko3.style.animationDuration = "200ms"
						}
						okynko3.style.animationName = "slide2";
						okynko3.style.animationPlayState = "running";
						okynko3.style.animationIterationCount = "1"

						clearInterval(casovac3);
					}
					}, cas300)

					setTimeout(() =>{
					if (odpocet3 == 0)
					{
						odpocet3 = 12;
						console.log("funguju");
					
						pole3.push(cislo3);

						let polecislo = pole3.length - 1;

						console.log(`cislo 3 = ${cislo3}`);

						console.log(`pole 3: ${pole3}`);

						console.log(`posledni index v poli: ${polecislo}`);

						cislo = `${pole1[polecislo]}${pole2[polecislo]}${pole3[polecislo]}`;
						//cislo = parseInt(cislo);
						console.log(`vylosovane cislo = ${cislo}`);

						okynko3.classList.remove("cislo3");

							if (111 == cislo || 222 == cislo || 333 == cislo || 444 == cislo || 555 == cislo)
							{
								const deset = 10;
								vyhra = sazkaVyplneno * deset;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${deset} = ${vyhra4} Kč`;

								container.style.backgroundImage = "url('img/penize.gif')"
								container.style.backgroundSize = "cover"

								console.log(`výhra = ${vyhra}`);

								const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cislovyhra=1&deset=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											cislovyhradeset = ajax3.responseText;

											cislovyhradeset = JSON.parse(cislovyhradeset);
										}
									});

									ajax3.send();

									console.log(cislovyhradeset);

									cislovyhra = cislovyhradeset.vyhra;

									cislovyhradeset = cislovyhradeset.deset

									console.log(cislovyhra);
									
							}
							else if (666 == cislo || 777 == cislo || 888 == cislo || 999 == cislo)
							{
								const dvacet = 20;
								vyhra = sazkaVyplneno * dvacet;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${dvacet} = ${vyhra4} Kč`;

								container.style.backgroundImage = "url('img/penize.gif')"
								container.style.backgroundSize = "cover"

								console.log(`výhra = ${vyhra}`);

								const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cislovyhra=1&dvacet=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											cislovyhradvacet = ajax3.responseText;

											cislovyhradvacet = JSON.parse(cislovyhradvacet);
										}
									});

									ajax3.send();

									console.log(cislovyhradvacet);

									cislovyhra = cislovyhradvacet.vyhra;

									cislovyhradvacet = cislovyhradvacet.dvacet

									console.log(cislovyhra);
									
							}
							else if (cislo == "000")
							{
								const sto = 100;
								vyhra = sazkaVyplneno * sto;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${sto} = ${vyhra4} Kč`;

								container.style.backgroundImage = "url('img/penize.gif')"
								container.style.backgroundSize = "cover"

								jackpot.style.backgroundImage = "url('img/jackpot.gif')";
								jackpot.style.backgroundSize = "90%";
								jackpot.style.backgroundRepeat = "no-repeat";
								jackpot.style.backgroundPosition = "center";

								console.log(`výhra = ${vyhra}`);

								const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cislovyhra=1&sto=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											cislovyhrasto = ajax3.responseText;

											cislovyhrasto = JSON.parse(cislovyhrasto);
										}
									});

									ajax3.send();

									console.log(cislovyhrasto)

									cislovyhra = cislovyhrasto.vyhra;

									cislovyhrasto = cislovyhrasto.sto;

									console.log(cislovyhra);
							}
							else if (cislo == 123 || cislo == 456 || cislo == 789)
							{
								const padesat = 50;
								vyhra = sazkaVyplneno * padesat;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${padesat} = ${vyhra4} Kč`;

								container.style.backgroundImage = "url('img/penize.gif')"
								container.style.backgroundSize = "cover"

								jackpot.style.backgroundImage = "url('img/bigwin.gif')";
								jackpot.style.backgroundSize = "50%";
								jackpot.style.backgroundRepeat = "no-repeat";
								jackpot.style.backgroundPosition = "center";

								console.log(`výhra = ${vyhra}`);

								const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cislovyhra=1&padesat=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											cislovyhrapadesat = ajax3.responseText;

											cislovyhrapadesat = JSON.parse(cislovyhrapadesat);
										}
									});

									ajax3.send();

									console.log(cislovyhrapadesat)

									cislovyhra = cislovyhrapadesat.vyhra;

									cislovyhrapadesat = cislovyhrapadesat.padesat;

									console.log(cislovyhra);
							}
							else if (c1.test(cislo) || c2.test(cislo) || c3.test(cislo) || c4.test(cislo) || c5.test(cislo) || c6.test(cislo))
							{
								const jednaapul2 = 1.5;
								vyhra = sazkaVyplneno * jednaapul2;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${jednaapul2} = ${vyhra4} Kč`;

								container.style.backgroundImage = "url('img/penize.gif')"
								container.style.backgroundSize = "cover"

								console.log(`výhra = ${vyhra}`);

								const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cislovyhra=1&jednaapul=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											cislovyhrajednaapul = ajax3.responseText;

											cislovyhrajednaapul = JSON.parse(cislovyhrajednaapul);
										}
									});

									ajax3.send();

									console.log(cislovyhrajednaapul);

									cislovyhra = cislovyhrajednaapul.vyhra;

									cislovyhrajednaapul = cislovyhrajednaapul.jednaapul;

									console.log(cislovyhra);
							}
							else if (c0.test(cislo) || c7.test(cislo) || c8.test(cislo) || c9.test(cislo))
							{
								const pet = 5;
								vyhra = sazkaVyplneno * pet;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${pet} = ${vyhra4} Kč`;

								container.style.backgroundImage = "url('img/penize.gif')"
								container.style.backgroundSize = "cover"

								console.log(`výhra = ${vyhra}`);

								const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cislovyhra=1&pet=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											cislovyhrapet = ajax3.responseText;

											cislovyhrapet = JSON.parse(cislovyhrapet);
										}
									});

									ajax3.send();

									console.log(cislovyhrapet);

									cislovyhra = cislovyhrapet.vyhra;

									cislovyhrapet = cislovyhrapet.pet;

									console.log(cislovyhra);

							}
							else
							{
								//console.log(zustatek);

								//console.log(zustatek2);

								const nula = 0;

								vyhra = sazkaVyplneno * nula;

								zustatek += vyhra;

								zustatek3 = Math.round(zustatek * 100) / 100;

								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								vyhra3 = Math.round(vyhra * 100) / 100;

								vyhra4 = vyhra3.toLocaleString("cs-CZ");

								sazkaVyplneno2 = Math.round(sazkaVyplneno * 100) / 100;

								sazkaVyplneno3 = sazkaVyplneno2.toLocaleString("cs-CZ");

								vyhra2.innerText = `Výhra ${sazkaVyplneno3} x ${nula} = ${vyhra4} Kč`;

								if (zustatek <= 0)
								{
									zustatek2.innerText = `${zustatek4} Kč, Jsi na nule GAMBLERE!!!!!`;

									container.style.backgroundImage = ""
									container.style.backgroundSize = ""
								}
								else
								{
									zustatek2.innerText = `${zustatek4} Kč`;

									console.log(`výhra = ${vyhra}`);

									container.style.backgroundImage = ""
									container.style.backgroundSize = ""
								}
							}

							//console.log(zustatek);
							const ajax2 = new XMLHttpRequest();
							ajax2.open("GET", "zapiscastky.php?castka=" + encodeURIComponent(zustatek) + "&uzivatel=" + encodeURIComponent(uzivatel), false);

							//console.log(ajax);

							ajax2.addEventListener("readystatechange", (udalost) => {
								if (ajax2.readyState == 4)
								{
									zustatek = ajax2.responseText;
									zustatek = zustatek*1;

								}
							});

							ajax2.send();
						
								zustatek3 = Math.round(zustatek * 100) / 100;
								zustatek4 = zustatek3.toLocaleString("cs-CZ");

								zustatek2.innerText = `${zustatek4} Kč`;

								console.log(zustatek4);

								if (zustatek <= 0)
								{
									zustatek2.innerText = `${zustatek4} Kč, Jsi na nule GAMBLERE!!!!!`;

									container.style.backgroundImage = ""
									container.style.backgroundSize = ""

									if(autoclick.checked)
									{
										console.log(autoclick.checked);

										setTimeout(() =>{
											autoclick.click();
										}, 1000)
									}
								}



								if (vyhra == 0)
								{
									const ajax3 = new XMLHttpRequest();
									ajax3.open("GET", "procenta.php?cisloprohra=1", false);

										ajax3.addEventListener("readystatechange", (udalost) => {
										if (ajax3.readyState == 4)
										{
											neco4 = ajax3.responseText;

											neco4 = JSON.parse(neco4);

											console.log(neco4);

											cisloprohra = neco4.prohra;
											cislovyhra = neco4.vyhra;

										}
									});

									ajax3.send();
								}

								console.log(cislovyhra);

								vysledek = cislovyhra / cisloprohra * 100;

								console.log(vysledek);

								vysledek = Math.round(vysledek * 100) / 100;

								vysledek = vysledek.toLocaleString("cs-CZ");

								procentovyhry.innerText = `Procentuální šance na výhru: ${vysledek}%`;

								//-----------------------------------------------------------------------

								vysledek2 = cislovyhrajednaapul / cisloprohra * 100;

								vysledek2 = Math.round(vysledek2 * 100) / 100;

								vysledek2 = vysledek2.toLocaleString("cs-CZ");

								procentovyhry2.innerHTML = `Procentuální šance <br> na výhru: ${vysledek2}%`;

								//-----------------------------------------------------------------------

								vysledek3 = cislovyhradeset / cisloprohra * 100;
								
								vysledek3 = Math.round(vysledek3 * 100) / 100;

								vysledek3 = vysledek3.toLocaleString("cs-CZ");

								procentovyhry3.innerHTML = `Procentuální šance <br> na výhru: ${vysledek3}%`;

								//-----------------------------------------------------------------------

								vysledek4 = cislovyhrasto / cisloprohra * 100;

								vysledek4 = Math.round(vysledek4 * 100) / 100;

								vysledek4 = vysledek4.toLocaleString("cs-CZ");

								procentovyhry4.innerHTML = `Procentuální šance <br> na výhru: ${vysledek4}%`;

								//-----------------------------------------------------------------------

								vysledek5 = cislovyhrapet / cisloprohra * 100;

								//console.log(vysledek2)

								vysledek5 = Math.round(vysledek5 * 100) / 100;

								vysledek5 = vysledek5.toLocaleString("cs-CZ");

								procentovyhry5.innerHTML = `Procentuální šance <br> na výhru: ${vysledek5}%`;

								//-----------------------------------------------------------------------

								vysledek6 = cislovyhrapadesat / cisloprohra * 100;

								//console.log(vysledek6);

								vysledek6 = Math.round(vysledek6 * 100) / 100;

								vysledek6 = vysledek6.toLocaleString("cs-CZ");

								procentovyhry6.innerHTML = `Procentuální šance <br> na výhru: ${vysledek6}%`;

								//-----------------------------------------------------------------------

								vysledek7 = cislovyhradvacet / cisloprohra * 100;

								//console.log(vysledek7);

								vysledek7 = Math.round(vysledek7 * 100) / 100;

								vysledek7 = vysledek7.toLocaleString("cs-CZ");

								procentovyhry7.innerHTML = `Procentuální šance <br> na výhru: ${vysledek7}%`;

								console.log(autoclick.checked);

								if (automatbezi == true)
								{
									automatbezi = false
								}

		
								if (zustatek > 0)
								{
									if(autoclick.checked)
									{
										setTimeout(() =>{
											console.log("check")
											paka.click();
										}, 500)
									}
								}
					}
				}, cas4000)
			}
		}
		});
	
		

		paka.addEventListener("click", (udalost) => {
			setTimeout(() => {
				paka.src = "img/paka.png";
			}, 1100)
		});

		zustatek2.addEventListener("mouseenter", (udalost) => {

			realnahodnota.innerHTML = `<div class="realnahodnota2" id="realnahodnota2"> ${zustatek} Kč </div>`

		});

		zustatek2.addEventListener("mouseleave", (udalost) => {

			realnahodnota.innerHTML = "";

		});


	</script>
</body>
</html>