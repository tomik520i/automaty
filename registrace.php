<?php

if (array_key_exists("zaregistrovat", $_POST))
{
    $jmeno = $_POST["jmeno"];
	$heslo = $_POST["heslo"];
    $castka = 100000;

    $hash = password_hash($heslo, PASSWORD_DEFAULT);

    $dotaz = $db->prepare("SELECT jmeno FROM uzivatel WHERE jmeno = ?");
    $dotaz->execute([$jmeno]);
    $kontrolajmena = $dotaz->fetch();

    if ($kontrolajmena == false)
    {
        if ($jmeno == "")
	    {
	    	$chyby["jmeno"] = "Jméno musí být vyplněno";
	    }
        else if (mb_strlen($jmeno) < 3)
        {
            $chyby["jmeno"] = "Příliš krátké jméno";
        }
    }
    else if ($kontrolajmena != false)
    {
        $chyby["jmeno"] = "Jméno již existuje";
    }

    // kontrola hesla

	if ($heslo == "")
    {
        $chyby["heslo"] = "Heslo musí být vyplněno";
    }
    else if (mb_strlen($heslo) < 5)
    {
        $chyby["heslo"] = "Příliš krátké heslo";
    }

    // kontrola zdali je vse v poradku
    if (count($chyby) == 0)
    {
        $registrace["vseok"] = "Registrace proběhla úspěšně";

		$dotaz = $db->prepare("INSERT INTO uzivatel SET
		jmeno = ?, heslo = ?, castka = ?, nejvyssi = ? ");

		$dotaz->execute([$jmeno, $hash, $castka, $castka]);

        header('Location: ?');
    }
}