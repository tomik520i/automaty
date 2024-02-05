<?php

// připojení na databázi
require "databaze.php";

if (array_key_exists("uzivatel", $_GET) && $_GET["uzivatel"] != "")
{
	$jmeno = $_GET["uzivatel"];

    $dotaz = $db->prepare("SELECT castka FROM uzivatel WHERE jmeno = ?");
    $dotaz->execute([$jmeno]);
    $castka = $dotaz->fetch();

	//var_dump($castka);

	echo $castka["castka"];
}
else
{	
	echo "100000";
}