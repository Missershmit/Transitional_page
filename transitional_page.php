<?php
    $title = 'transitional page';
    echo ucwords($title) . "<br />\n"; "<br />\n";
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $year = isset($_POST['year']) ? htmlspecialchars($_POST['year']) : '';

    echo "Имя: $name <br />\n";
    echo "Год: $year <br />\n";

    echo $_SERVER["DOCUMENT_ROOT"] . "<br />\n";
    echo $_SERVER["SERVER_ADDR"] . "<br />\n";
?>
