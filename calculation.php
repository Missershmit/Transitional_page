<?php
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $year_born = isset($_POST['year_born']) ? htmlspecialchars($_POST['year_born']) : '';
        $year_1 = isset($_POST['year_1']) ? htmlspecialchars($_POST['year_1']) : '';
        $year = date("o");

if (!empty($_POST)) {
    if (isset($_POST['name'], $_POST['year_born'])) { //,
        if ($_POST['name'] == '') {
            echo 'Укажите имя!<br>';
        } else if ($_POST['year_born'] < 1900 || $_POST['year_born'] >=$year ) {
            echo 'Укажите год рождения! Допустимый диапазон значений: 1900..' . $year . '<br>';
        }   else if ($_POST['year_1']<=$year){
            echo 'Введите желаемый год корректно! ' . '<br>';
        }   else{
            $age = $year - $year_born . '!<br>';
            $age_1 = ($year_1 - $year_born).'<br>';
            echo 'Здравствуйте, ' . $name . '!<br>';
            echo 'Сейчас Ваш возраст = ' . $age . '<br>';
            echo 'текущий год = ' .  $year . '<br>';
            echo 'желательный год = ' .  $year_1 . '<br>';
            echo 'В интересующем Вас году, Вам будет '. $age_1;
        }

      }
}

?>