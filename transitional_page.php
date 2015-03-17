<?php
$connection = mysql_connect();
if (!$connection){
    die ('Сщединение отсутствует');
}
if (! mysql_select_db($db,$connection)){
    die ('отсутствует БД');
}



