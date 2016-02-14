
    <h3>Привет всем!</h3>
    <?= date("d-m-Y H:i", time()); ?>
    <img src="<?= $message->embed($imageFileName); ?>" alt="" width="200px" height="200px">
    <?= 'Ваш ' . $name ?>
