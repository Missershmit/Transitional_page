<?php

define('PDO_DSN', 'mysql:dbname=new_db;host=127.0.0.1');
define('PDO_USERNAME', 'root');
define('PDO_PASSWORD', '');
/**
 * Get pdo connection
 * @return PDO
 */
function getConnection()
{
    return new PDO(PDO_DSN, PDO_USERNAME, PDO_PASSWORD);
}

function getAuthor()
{
    $db = getConnection();
    $select = $db->query('SELECT * FROM `books` ORDER BY id DESC', PDO::FETCH_OBJ);
    $select->execute();
    $obj = $select->fetchAll();
    return $obj;
}

function setAuthor($author, $price, $quantity, $image_file)
{
    try {
        $db = getConnection();
        $insert = $db->prepare('INSERT INTO `books` (`author`, `price`,`quantity`,`image`) VALUES(:author,:price,:quantity,:image)');
        $insert->bindParam(':author', $author, PDO::PARAM_STR);
        $insert->bindParam(':price', $price, PDO::PARAM_INT);
        $insert->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $insert->bindParam(':image', $image_file, PDO::PARAM_STR);
        $insert->execute();
    } catch (PDOException $e) {
        print_r($e->getTrace());
    }
}

function validate()
{
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    $image_dir = 'uploads/';
    $image_file = $_SERVER['DOCUMENT_ROOT'].'/'.$image_dir . basename($_FILES['image']['name']);

    $author = isset($_POST['author']) ? htmlspecialchars($_POST['author']) : '';
    $price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '';
    $quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

    if (!$author || !$price || !$quantity) {
        die ("Не все данные введены.<br>
            Пожалуйста, вернитесь назад и закончите ввод<br>");
    }
    return array($author, $price, $quantity, $image_file);
}

function upload_file()
{
    $image_dir = 'uploads/';                                    // херня в тому, що 2 рази озвучую змінну
    $image_file =  $image_dir . basename($_FILES['image']['name']); // (можливо порібно зробити ці змінні глобальними
    $upl_result = 1;
    $image_file_type = pathinfo($image_file, PATHINFO_EXTENSION);

    // перевірка чи файл насправді картинка
    if (isset ($_POST['submit'])) {
        $check = getimagesize($_FILES['image']['tmp_name']);
        if (!$check == false) {
            echo 'File is an image' . $check['mime'];
            $upl_result = 1;
        } else {
            echo 'Upload file is not image ';
            $upl_result = 0;
        }
    }

    // перевірка чи ми маємо вже такий самий файл
    if (file_exists($image_file)) {
        echo 'Вибачте, даний файл вже існує';
        $upl_result = 0;
    }
    //перевіряємо розмір файлу

    if ($_FILES['image']['size'] > 50000000) {
        echo 'Вибачте, файл занадто великий';
        $upl_result = 0;
    }
    // Перевірка чи дозволений даний формат файлу
    if ($image_file_type != 'jpg' && $image_file_type != 'gif' && $image_file_type != 'jpeg' && $image_file_type != 'JPG') {
        echo 'Ви вибрали невірний тип файлу';
        $upl_result = 0;
    }

    if ($upl_result == 0) {
        echo '<p>Вибачте, ваш файл не завантажено десь якісь трабли<br></p>';
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_file)) {
            echo '<p>Ваш файл    ' . basename($_FILES['image']['name']) . '   був вдало завантажений <br></p>';
            var_dump($image_file);

           } else {
            echo 'Вибачте, але ваш файл не завантажився<br>';

        }
    }
}

?>

