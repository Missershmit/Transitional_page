<html>
<body>
<?
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$year_born = isset($_POST['year_born']) ? htmlspecialchars($_POST['year_born']) : '';
$year_1 = isset($_POST['year_1']) ? htmlspecialchars($_POST['year_1']) : '';
?>
<form method="post" action="transitional_page.php">

    Введите Ваше имя: <input type="text" name="name" value="<?=$name?>">
    <br>
    Введите Ваш год рождения: <input type="text" name="year_born" value="<?=$year_born?>">
    Введите желаемый год : <input type="text" name="year_1" value="<?=$year_1?>">
    <input type="submit" value="">
</form>
</body>
</html>
