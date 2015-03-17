<link href="Styles/style.css" rel="stylesheet" type="text/css">
<?php
require_once('functions.php');
if ($_POST) {
    list($author, $price, $quantity, $image_file) = validate();
    setAuthor($author, $price, $quantity, $image_file);
    upload_file();
}
?>

<html>
<head>
    <title>HTML-форма добавления новых книг</title>
</head>
<body>
<form action="" method='POST' enctype="multipart/form-data">
    <table>
        <tr>
            <td>Автор
            <td><input name='author' value="<?= $author ?>" maxlength='30' size='30'>
        </tr>
        <tr>
            <td>Цена
            <td><input name='price' value="<?= $price ?>" maxlength='7' size='7'>
        </tr>
        <tr>
            <td>Количество
            <td><input name='quantity' value="<?= $quantity ?>" maxlength='3' size='3'>
        </tr>
        <tr>
            <td>Картинка
            <td><input name='image' type='file'>
        </tr>
        <tr>
            <td><input type='submit' value="Ввод"/>
        </tr>
    </table>
</form>

<table class = "tabstyle1">

    <?php
    foreach (getAuthor() as $author) {
        echo '<tr>';
        echo '<td>' . $author->id . '</td>' . '<td>' . $author->author . '</td>' . '<td>' . $author->price . '</td>' . '<td>' . $author->quantity . '</td>' . '<td>' . $author->image . '</td>';
        echo '</tr>';
    }
    ?>
</table>


</body>
</html>


