    <!-- STRONA REJESTRACYJNA -->
<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign_up</title>
    <link rel="stylesheet" href="../stop_z_wypalniem_gał.css">
</head>
<body>
    <h1> Zarejsetruj sie </h1>

    <form method="POST" action="sign_up.php">
        <input type="text" name="nick" placeholder="Wpisz Nick">
        <input type="text" name="email-login" placeholder="Wpisz email do logowania">
        <input type="text" name="haslo" placeholder="Wpisz haslo">
        <h2>wybierz plec</h2>
        <input type="checkbox" id="men" name="men" value="tak">
        <label for="men">Matcho</label>
        <input type="checkbox" id="women" name="women" value="tak">
        <label for="women">Seniorita</label>
        <input type="checkbox" id="slup" name="slup" value="tak">
        <label for="slup">Słup elektryczny</label>
        <br>
        <h2>Tapczan</h2>
        Potwierdz że nie jesteś robotem <br>
        <input type="checkbox" id="tapczan" name="tapczan" value="tak">
        <label for="tapczan">Jestem człowiekiem</label>
        <h4><p>Nowy polski system anty botowy jak captha</p></h4>
        
        <button type="submit">Wyślij</button>
    </form>

    <button onclick="window.location.href='../login/sign_in.php'">Masz konto chuju? Login In</button>
    <?php 
        //czy folmularz poprawny;
        //ważne kiedy nie klkikniesz checkboxa to sie wątek w post wogule nie pojawia więc trza sprawdzić czy wogule jest a nie jak watosc;
        if(!isset($_POST['tapczan'])){
            echo "wypierdalaj bocie nie przeszedłeś tapczana<br>";
        }
        if(empty($_POST['nick'])){
            echo "Nick pusty<br>";
        }
        if(empty($_POST['email-login'])){
            echo "email pusty<br>";
        }
        if(empty($_POST['haslo'])){
            echo "haslo puste<br>";
        } else {
            $plec_count = 0;
            if(isset($_POST['men'])) $plec_count++;
            if(isset($_POST['women'])) $plec_count++;
            if(isset($_POST['slup'])) $plec_count++;

            if($plec_count > 1){
                echo "można mieć tylko jedną płeć dzbanie";
            } else {
                include 'sign_up_logika.php';
            }
        }
    ?>
</body>
</html>