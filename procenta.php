<?php

require "databaze.php";
//var_dump($_GET);
if (array_key_exists("cislovyhra", $_GET))
{
	$cislovyhra = $_GET["cislovyhra"];

	$dotaz = $db->prepare("SELECT vyhra FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["vyhra"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET vyhra = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT vyhra FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["vyhra"] = $cislodatabaze2["vyhra"];

	if (array_key_exists("deset", $_GET))
	{
	$cislovyhra = $_GET["deset"];

	$dotaz = $db->prepare("SELECT deset FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["deset"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET deset = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT deset FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["deset"] = $cislodatabaze2["deset"];

	echo json_encode($vyhry);
	}

	if (array_key_exists("jednaapul", $_GET))
	{
	$cislovyhra = $_GET["jednaapul"];

	$dotaz = $db->prepare("SELECT jednaapul FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["jednaapul"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET jednaapul = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT jednaapul FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["jednaapul"] = $cislodatabaze2["jednaapul"];

	echo json_encode($vyhry);
	}

	if (array_key_exists("sto", $_GET))
	{
	$cislovyhra = $_GET["sto"];

	$dotaz = $db->prepare("SELECT jackpot FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["jackpot"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET jackpot = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT jackpot FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["sto"] = $cislodatabaze2["jackpot"];
	
	echo json_encode($vyhry);
	}
	if (array_key_exists("padesat", $_GET))
	{
	$cislovyhra = $_GET["padesat"];

	$dotaz = $db->prepare("SELECT padesat FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["padesat"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET padesat = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT padesat FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["padesat"] = $cislodatabaze2["padesat"];
	
	echo json_encode($vyhry);
	}
	if (array_key_exists("dvacet", $_GET))
	{
	$cislovyhra = $_GET["dvacet"];

	$dotaz = $db->prepare("SELECT dvacet FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["dvacet"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET dvacet = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT dvacet FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["dvacet"] = $cislodatabaze2["dvacet"];
	
	echo json_encode($vyhry);
	}
	if (array_key_exists("pet", $_GET))
	{
	$cislovyhra = $_GET["pet"];

	$dotaz = $db->prepare("SELECT pet FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["pet"] + $cislovyhra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET pet = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT pet FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	$vyhry["pet"] = $cislodatabaze2["pet"];
	
	echo json_encode($vyhry);
	}
}

else if (array_key_exists("cisloprohra", $_GET))
{
	$cisloprohra = $_GET["cisloprohra"];

	$dotaz = $db->prepare("SELECT prohra FROM procenta ");
	$dotaz->execute();
	$cislodatabaze = $dotaz->fetch();

	//var_dump($cislodatabaze);

	$soucet = $cislodatabaze["prohra"] + $cisloprohra;

	//var_dump($soucet);

	$dotaz = $db->prepare("UPDATE procenta SET prohra = ? ");
	$dotaz->execute([$soucet]);

	$dotaz = $db->prepare("SELECT prohra, vyhra FROM procenta ");
	$dotaz->execute();
	$cislodatabaze2 = $dotaz->fetch();

	//var_dump($cislodatabaze2);

	echo json_encode($cislodatabaze2);
}

else
{
	$dotaz = $db->prepare("SELECT * FROM procenta ");
	$dotaz->execute();
	$cislodatabaze3 = $dotaz->fetch();

	//var_dump($cislodatabaze3);

	echo json_encode($cislodatabaze3);
}