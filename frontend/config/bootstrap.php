<?php

function vd($var, $exit = true)
{
    \yii\helpers\BaseVarDumper::dump($var, 10, true);
    if ($exit) {
        exit;
    }
}

