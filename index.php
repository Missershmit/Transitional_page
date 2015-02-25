<html>
<body>
<?
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$year = isset($_POST['year']) ? htmlspecialchars($_POST['year']) : '';
/*if (isset($_POST['name'], $_POST['year'])) {
    if ($_POST['name'] == '') {
        echo 'Укажите имя!<br>';
    } else if ($_POST['year'] < 1900 || $_POST['year'] >= 2015) {
        echo 'Укажите год рождения! Допустимый диапазон значений: 1900..2015 <br>';
    } else {
        echo 'Здравствуйте, ' . $name . '!<br>';
           }

    echo '<hr>';
}*/
?>
<form method="post" action=" transitional_page.php">

    Введите Ваше имя: <input type="text" name="name" value="<?=$name?>">
    <br>
    Введите Ваш год рождения: <input type="text" name="year" value="<?=$year?>">
    <input type="submit" value="">
</form>
</body>
</html>
