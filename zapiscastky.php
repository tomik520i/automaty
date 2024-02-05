<?php
// připojení na databázi
require "databaze.php";

//var_dump($_GET);

if (array_key_exists("uzivatel", $_GET) && $_GET["uzivatel"] != "")
{
	$jmeno = $_GET["uzivatel"];
	$zustatek = $_GET["castka"];

	//var_dump($jmeno);

	$dotaz = $db->prepare("UPDATE uzivatel SET castka = ? WHERE jmeno = ?");
	$dotaz->execute([$zustatek, $jmeno]);

	$dotaz = $db->prepare("SELECT castka, nejvyssi FROM uzivatel WHERE jmeno = ?");
	$dotaz->execute([$jmeno]);
	$zustatek = $dotaz->fetch();

	if ($zustatek["castka"] > $zustatek["nejvyssi"])
	{
		$dotaz = $db->prepare("UPDATE uzivatel SET nejvyssi = ? WHERE jmeno = ?");
		$dotaz->execute([$zustatek["castka"], $jmeno]);
	}

	echo $zustatek["castka"];

	//var_dump($zustatek);



}
else
{
	echo $_GET["castka"];
}