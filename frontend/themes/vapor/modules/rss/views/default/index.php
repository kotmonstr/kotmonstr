<?php

//цикл для обхода всей RSS ленты
foreach ($rss as $item) {
echo '<h5>'.$item->title.'</h5>';       //выводим на печать заголовок статьи
//echo $item->description;        //выводим на печать текст статьи
//echo $item->link;        //выводим на печать текст статьи
    ?>

    <iframe src="<?= $item->link ?>" width="668" height="660" align="left">
        Ваш браузер не поддерживает плавающие фреймы!
    </iframe>


    <?php
}


//$cont = file_get_contents($url);
//echo $cont;


?>