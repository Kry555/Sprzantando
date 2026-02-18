<link rel="stylesheet" href="../stop_z_wypalniem_gał.css">
<?php
    echo "Maxowi smierdzą stopy<br>"; 

    // Sprawdzenie, czy formularz został wysłany metodą POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dane = $_POST; 
        print_r($_POST);
        echo "<br>";
        if ($dane['tapczan'] = 'tak'){
            echo "nie terminator<br>";
        }else{
            echo "terminator zabic<br>";
            $bad_tapczan = "tak";
            header("Location: sign_up.php?bad_tapczan=$bad_tapczan");
            exit;
        }


    }
?>