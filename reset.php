<?php

if (array_key_exists("reset", $_GET))
{
	$dotaz = $db->prepare("UPDATE uzivatel SET castka = 100000 WHERE jmeno = ?");
	$dotaz->execute([$_SESSION["prihlasenyUzivatel"]]);

	header('Location: ?');
}