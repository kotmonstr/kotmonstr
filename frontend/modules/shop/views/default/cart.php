<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\GeoCountry;
use yii\helpers\Html;
use common\models\Order;
use common\models\GeoCity;
use yii\helpers\Url;

echo $this->render('/menu/_header', ['quantityInCart' => $quantityInCart,  'quantityWishlist'=> $quantityWishlist,'quantityCompareList'=> $quantityCompareList])

?>


<section id="cart_items">
    <div class="container">

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?= Url::to('/shop/index') ?>">Home</a></li>
                <li class="active">Корзина</li>
            </ol>
        </div>

        <div class="table-responsive cart_info">
            <?php if ($model): ?>
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Количество</td>
                    <td class="total">Итого</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                    <?php foreach ($model as $good): ?>

                        <tr id="row-<?= $good->goods->id ?>">
                            <td class="cart_product">
                                <a href="/shop/detail?item=<?= $good->goods->id ?>"><img src="<?= '/upload/goods/' . $good->goods->image ?>" alt=""
                                                width="200px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?= $good->goods->item ?></a></h4>

                                <p>Web ID: <?= $good->goods->id ?></p>
                            </td>
                            <td class="cart_price">
                                <p>$<?= $good->goods->price ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="javascript:void(0);"
                                       onclick="AddMoreQuantity(<?= $good->goods->id ?>)"><span
                                            class="glyphicon glyphicon-plus"></span></a>
                                    <input id="quantity-<?= $good->goods->id ?>" class="cart_quantity_input" type="text"
                                           name="quantity" value="<?= $good->quantity ?>" autocomplete="off" size="2">
                                    <a id="minus-<?= $good->goods->id ?>" class="cart_quantity_down"
                                       href="javascript:void(0);" onclick="RemoveMoreQuantity(<?= $good->goods->id ?>)"><span
                                            class="glyphicon glyphicon-minus"></span></a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p id="price-<?= $good->goods->id ?>" class="cart_total_price">$<?= $good->price ?></p>
                            </td>
                            <td class="cart_delete" style="margin-right: 10px">
                                <a class="cart_quantity_delete" href="javascript:void(0);"
                                   onclick="DeleteFromCart(<?= $good->goods->id ?>)"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>



                </tbody>
            </table>


            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Итого</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <?php
                $i = 1;
                $Total = 0;
                ?>
                <?php if ($model): ?>
                    <?php foreach ($model as $good): ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td>
                                <a href="/shop/detail?item=<?= $good->goods->id ?>"><img src="<?= '/upload/goods/' . $good->goods->image ?>" alt=""
                                                width="50px"></a>
                            </td>
                            <td>
                                <?= $good->goods->item ?>
                            </td>
                            <td>
                                <?= $good->quantity . ' ед.'; ?>
                            </td>
                            <td>
                                <?= '$' . $good->price ?>
                            </td>
                            <td>
                                <?= '$' . $good->quantity * $good->price ?>
                            </td>
                        </tr>
                        <?php $Total = $Total + ($good->quantity * $good->price); ?>

                    <?php endforeach ?>
                <?php endif ?>
                <tr>
                    <hr>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Итого:</td>
                    <td><?= '$' . $Total ?></td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section id="do_action">
    <?php $model = new Order(); ?>
    <?php
    $form = ActiveForm::begin([
        'id'=>'form-order',
        'method' => 'get',
        'action' => ['controller/action'],
    ]);

    ?>
    <input type="hidden" name="<?= \Yii::$app->request->csrfParam ?>"
           value="<?= \Yii::$app->request->getCsrfToken() ?>">
    <?= $form->field($model, 'ip')->hiddenInput(['value'=> yii::$app->session->id]); ?>

    <div class="container">
        <div class="heading">
            <h3>Оформить заявку</h3>
            <p>Заполните форму .</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Страна:</label>

                            <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map(GeoCountry::find()->where(['id' => ['20', '112', '113']])->all(), 'id', 'name_ru'),['prompt'=>'-- Выберите --','onchange'=>'getArrCities()','id'=>'country'])->label('') ?>
                        </li>
                        <li class="single_field">
                            <label>Город:</label>
                            <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map([],'id', 'name_ru'),['prompt'=>'-- Выберите --','id'=>'city'])->label('') ?>

                        </li>
                        <li class="single_field zip-field">
                            <label>Индекс:</label>
                            <?= $form->field($model, 'post_index')->textInput()->label(''); ?>
                        </li>
                        <li class="" >
                            <label>Фамилия:</label>
                            <?= $form->field($model, 'first_name')->textInput(['width'=> '472px!important'])->label(''); ?>

                        </li>
                        <li class="" >
                            <label>Имя:</label>
                            <?= $form->field($model, 'second_name')->textInput(['width'=> '472px!important'])->label(''); ?>
                        </li>
                        <li class="" >
                            <label>Отчество:</label>
                            <?= $form->field($model, 'ser_name')->textInput(['width'=> '472px'])->label(''); ?>
                        </li>
                        <li class="" >
                            <label>Телефон:</label>
                            <?= $form->field($model, 'telephone')->textInput(['width'=> '202px'])->label(''); ?>
                        </li>
                    </ul>

                    <table width="90%" class="table-payment">
                        <th colspan="3">
                            <h4> Оплата:</h4>
                        </th>
                        <tr>
                            <td>
                                <input id="payment-post" class="radio-payment" type="radio" value="1" name="payment">
                                <label class="to-right">На почте</label>
                            </td>
                            <td>
                                <input id="payment-bank" class="radio-payment" type="radio" value="2"  name="payment">
                                <label class="to-right">Банковский перевод</label>
                            </td>
                            <td>
                                <input id="payment-webmoney" class="radio-payment" type="radio" value="3" name="payment">
                                <label class="to-right">Webmoney</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                            <a onclick="MakeOrder()" class="btn btn-default check_out" href="javascript:void(0);">Создать заказ</a>
                            </td>
                        </tr>
                        </table>
                    <?php else: ?>
                        <div class="col-sm-6 col-md-offset-3">
                            <div class="total_area">
                                <ul>
                                    <li style="text-align: center">Корзина пуста</li>

                                </ul>
                            </div>
                        </div>


                    <?php endif; ?>
                </div>
            </div>

            <?php if ($model): ?>

            <div class="col-sm-6 ">
                <div class="total_area">
                    <ul>
                        <li>Сумма покупки <span><?= '$' . $Total ?></span></li>
                        <li>Почта <span>$100</span></li>
                        <li>Доставка до дома <span>$50</span></li>
                        <li>К оплате  <span>$ <?= $Total + 150 ?> </span></li>
                    </ul>
                </div>
            </div>

            <?php endif; ?>


        </div>
    </div>

    <?= Html::endForm(); ?>
</section>

<style>
    .glyphicon {
        margin-top: 5px;
    }

    .glyphicon:hover {
        color: #FE980F;
    }

    td, th{
        text-align: center;
    }
    .to-right{
        margin-left: 4px;
    }
    .table-payment{
        margin-left: 20px;
    }
    .radio-payment{
        margin-left: 42px!important;
    }
    .check_out{
        width: 100%;
    }
    .form-group {

        width: 477px;

</style>