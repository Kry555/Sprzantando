<link rel="stylesheet" href="../stop_z_wypalniem_gał.css">
<?php
echo "Maxowi smierdzą stopy<br>";

// Sprawdzenie, czy formularz został wysłany metodą POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dane = $_POST;
    print_r($_POST);
    echo "<br>";
    if ($dane['tapczan'] = 'tak') {
        echo "nie terminator<br>";
    } else {
        echo "terminator zabic<br>";
        exit;
    }

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "sprzantando";

    // Tworzymy połączenie
    $conn = new mysqli($host, $user, $pass, $db);

    // Sprawdzamy połączenie
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    } else {
        echo "połączono";
    }
    // !!!!!uwaga nie odporne na sql injection i jak ktoś wpisze ` to wyjebie błąd;
    // !!!!!uwaga te sql trzeba na transakcje zamienić;

    //$plec;
    // sprawdza jak plec;
    if (isset($_POST['men'])) {
        $plec = "Mężczyzna";
    } elseif (isset($_POST['women'])) {
        $plec = "Kobieta";
    } elseif (isset($_POST['slup'])) {
        $plec = "słup_elektryczny";
    }

    //pobiera ostatnie id profil i daje jaki wpisać;
    $sql_in = "SELECT id_profil FROM profil ORDER BY id_profil DESC LIMIT 1";
    $result = $conn->query($sql_in);
    $row = $result->fetch_assoc();
    $ostatni_profil = ($row) ? $row['id_profil'] + 1 : 1;

    $sql_out = "INSERT INTO user (nick, email, haslo, sex, id_profil) 
        VALUES (
            '{$dane['nick']}',
            '{$dane['email-login']}',
            '{$dane['haslo']}',
            '$plec',
            $ostatni_profil
        )";
    $conn->query($sql_out);

    //wpisuje do profil nick on jest specjalnie by nie było błędów w db;
    $sql_out2 = "INSERT INTO profil (nick) VALUES ('{$dane['nick']}')";
    $conn->query($sql_out2);
}
?>