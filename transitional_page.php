       <html>
    <head>
        <meta charset="utf-8">
        <title> Test page </title>
        <H1>New test page bla bla bla</H1>
        <style>
            body {
                background:  url(images/bg.JPG); /*  путь к файлу */
                background-size: cover;
                color: #fff; /* Цвет текста */
            }
        </style>
     </head>

<?php
    $title = 'transitional page';
    echo ucwords($title) . "<br />\n"; "<br />\n";
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $year_born = isset($_POST['year_born']) ? htmlspecialchars($_POST['year_born']) : '';
    $year_1 = isset($_POST['year_1']) ? htmlspecialchars($_POST['year_1']) : '';
?>
<?php
        require ('calculation.php');
        echo $_SERVER["DOCUMENT_ROOT"] . "<br />\n";
        echo $_SERVER["SERVER_ADDR"] . "<br />\n";
?>

</html>

