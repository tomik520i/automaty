<?php
$chybaPrihlaseni = null;
$heslo2 = null;

	if (array_key_exists("prihlasit", $_POST))
	{
		$jmeno = $_POST["jmeno"];
		$heslo = $_POST["heslo"];

		$dotaz = $db->prepare("SELECT jmeno, heslo FROM uzivatel WHERE jmeno = ?");
		$dotaz->execute([$jmeno]);
		$uzivatele = $dotaz->fetch();

		if ($uzivatele != false)
		{
			$heslo2 = password_verify($heslo, $uzivatele["heslo"]);
		}

		if ($uzivatele != false && $heslo2 == true)
		{
			$uzivatel = [$uzivatele["jmeno"] => $uzivatele["heslo"]];

			$uzivatelExistuje = array_key_exists($jmeno, $uzivatel);

			if ($uzivatelExistuje && $heslo2 == true)
			{
				$_SESSION["prihlasenyUzivatel"] = $jmeno;

				header('Location: ?');
			}

			else
			{
				$chybaPrihlaseni = "Nesprávné přihlašovací údaje";
			}
		}

		if ($heslo2 == false)
		{
			$chybaPrihlaseni = "Nesprávné heslo";
		}

		if ($uzivatele == false)
		{
			$chybaPrihlaseni = "Přihlašovací jméno neexistuje";
		}
	}


if (array_key_exists("odhlasit", $_POST))
{
	unset($_SESSION["prihlasenyUzivatel"]);
	header('Location: ?');
}