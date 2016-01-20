<?php
namespace common\models;
use Yii;
use yii\base\Model;
/**
 * @author Kotmonstr
 * @since 1.0
 * 
 */



/*
 * $arr - array of $items
 * $id - selected
 */

class Fun extends Model
{
public static function DropDown($arr, $id, $cssClass,$attribute) { ?>
    <select name="<?= $attribute ?>" class="<?php if($cssClass){echo $cssClass;}?>">
        <?php foreach ($arr as $key => $value) { ?>
            <option value="<?= $key ?>" <?php if($key==$id){echo "selected='selected'";} ?>><?= $value ?></option>
        <?php } ?>
    </select>
<?php }} ?>
