<?php

function openDB()
{
    global $dbLink;

    $dbLink = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_BASE)
        or die("Impossible de se connecter : " . mysqli_connect_error());
}

function closeDB()
{
    global $dbLink;

    mysqli_close($dbLink);
}

function insertContact($sNom, $sEmail)
{
    global $dbLink;

    $query = "INSERT INTO contact (contact_nom, contact_email, contact_date) VALUES (?,?,?)";
    $stmt = mysqli_prepare($dbLink, $query);
    mysqli_stmt_bind_param($stmt, "sss", $nom, $email, $datecontact );

    $nom = $sNom;
    $email = $sEmail;
    $datecontact = date( "Ymd", time() );
    mysqli_stmt_execute($stmt);
}

// Liste des contacts des 7 derniers jours
function listContact()
{
    global $dbLink;

    $sDateDeb = date( "Ymd", time() - 7 * 86400 );

    $sQuery = " SELECT contact_nom, contact_email, contact_date
                FROM contact
                WHERE contact_date >= '%s'
                ORDER BY contact_date, contact_email";
    $result = mysqli_query($dbLink, sprintf($sQuery,$sDateDeb)) or
        die("Erreur requete:".mysqli_error($dbLink));

    while ($aRow = mysqli_fetch_assoc($result)) {
      $aContact[] = $aRow;
    }
    
    return($aContact);
}
