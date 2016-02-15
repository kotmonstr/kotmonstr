<?php

namespace app\modules\shop\controllers;

use common\models\Banner;
use common\models\Brend;
use common\models\Cart;
use common\models\Video;
use yii\widgets\ActiveForm;
use yii\web\Response;
use common\models\Contacts;
use common\models\GeoCity;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\ImageSlider;
use common\models\Order;
use common\models\Reqvizit;
use common\models\Review;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use common\models\Wishlist;
use common\models\OrderItems;
use yii\web\Session;
use common\models\Compare;
use frontend\models\SignupForm;
use app\modules\core\controllers\CoreController;

class DefaultController extends CoreController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index',
                            'products',
                            'cart',
                            'blog',
                            'contact',
                            'detail',
                            'chekout',
                            'wishlist',
                            'comparelist',
                            'add-to-cart',
                            'get-goods-by-category',
                            'add-more-quantity',
                            'remove-more-quantity',
                            'delete-from-cart',
                            'add-to-many-cart',
                            'get-cities',
                            'get-goods-by-brend',
                            'make-order',
                            'order',
                            'add-contact',
                            'add-to-wishlist',
                            'remove-from-wishlist',
                            'add-to-comparelist',
                            'signup',
                            'signup-submit',
                            'login'
                        ],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
        ];
    }

    public $layout = '/shop';

    public function actionLogin(){
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        return $this->render('login',[ 'quantityInCart' => $quantityInCart]);
    }

    public function actionSignupSubmit() {
        if (isset(Yii::$app->request->post('SignupForm')['checkbox'])){
            $IsLogin = true;
        }else{
            $IsLogin = false;
        }

        $model = new SignupForm;
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->load(Yii::$app->request->post());
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($user = $model->signup() && $IsLogin) {

                // если есть чекбокс залогинить
                $model->login($user);
                    return $this->redirect('/shop/index');

            }else{
                // если не просили залогинить
                //vd(yii::$app->request->isAjax);

                Yii::$app->response->format = Response::FORMAT_JSON;

                Yii::$app->getSession()->setFlash('success', 'Вы успешно зарегистрировались');
                return $this->redirect('/shop/index');

            }
        }

        return $this->redirect('/shop/signup');
    }

    public function actionSignup(){
       // $this->layout = '/blog';
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        return $this->render('signup',['quantityInCart' => $quantityInCart]);
}
    public function actionIndex()
    {
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $modelSlider = Goods::find()->all();
        $modelBest = Goods::getBest(3);
        $modelNewGoods = Goods::getNewest(6);
        $modelGoodsCategories = GoodsCategory::find()->all();
        $modelBrends = Brend::find()->all();
        $modelBanner = Banner::find()->where(['status'=>0])->all();
        $modelWishList = WishList::getListByIp($iP);
        $quantityWishlist= count($modelWishList);
        $modelCompareList = Compare::getListByIp($iP);
        $quantityCompareList =count($modelCompareList);
        return $this->render('index', ['modelNewGoods' => $modelNewGoods,
            'modelGoodsCategories' => $modelGoodsCategories,
            'modelSlider' => $modelSlider,
            'modelBest' => $modelBest,
            'quantityInCart' => $quantityInCart,
            'modelBanner'=> $modelBanner,
            'quantityWishlist'=> $quantityWishlist,
            'quantityCompareList'=> $quantityCompareList,
            'modelBrends' => $modelBrends]);
    }

    public function actionWishlist()
    {
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $modelSlider = Goods::find()->all();
        $modelBest = Goods::getBest(3);
        $modelNewGoods = Goods::getNewest(6);
        $modelGoodsCategories = GoodsCategory::find()->all();
        $modelBrends = Brend::find()->all();
        $modelWishList = WishList::getListByIp($iP);
        $quantityWishlist= count($modelWishList);
        $modelCompareList = Compare::getListByIp($iP);
        $quantityCompareList =count($modelCompareList);

        return $this->render('wishlist',
            [
                'modelNewGoods' => $modelNewGoods,
                'modelGoodsCategories' => $modelGoodsCategories,
                'modelSlider' => $modelSlider,
                'modelBest' => $modelBest,
                'quantityInCart' => $quantityInCart,
                'modelBrends' => $modelBrends,
                'quantityWishlist'=> $quantityWishlist,
                'quantityCompareList'=> $quantityCompareList,
                'modelWishList' => $modelWishList]);
    }

    public function actionComparelist()
    {
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $modelSlider = Goods::find()->all();
        $modelBest = Goods::getBest(3);
        $modelNewGoods = Goods::getNewest(6);
        $modelGoodsCategories = GoodsCategory::find()->all();
        $modelBrends = Brend::find()->all();
        $modelCompareList = Compare::getListByIp($iP);
        $modelWishList = WishList::getListByIp($iP);
        $quantityWishlist= count($modelWishList);
        $modelCompareList = Compare::getListByIp($iP);
        $quantityCompareList =count($modelCompareList);

        return $this->render('comparelist',
            [
                'modelNewGoods' => $modelNewGoods,
                'modelGoodsCategories' => $modelGoodsCategories,
                'modelSlider' => $modelSlider,
                'modelBest' => $modelBest,
                'quantityInCart' => $quantityInCart,
                'quantityWishlist'=> $quantityWishlist,
                'quantityCompareList'=> $quantityCompareList,
                'modelBrends' => $modelBrends,
                'modelCompareList' => $modelCompareList]);
    }


    function actionProducts()
    {
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $model = Cart::getAllByIp($iP);
        $modelNewGoods = Goods::getNewest(15);
        $modelGoodsCategories = GoodsCategory::find()->all();
        return $this->render('products', ['modelNewGoods' => $modelNewGoods,
            'modelGoodsCategories' => $modelGoodsCategories, 'model' => $model, 'quantityInCart' => $quantityInCart]);
    }

    public function actionCart()
    {
        $iP = Yii::$app->session->id;
        $model = Cart::getAllByIp($iP);
        $quantityInCart = Cart::getQountAllByIp($iP);
        $modelWishList = WishList::getListByIp($iP);
        $quantityWishlist= count($modelWishList);
        $modelCompareList = Compare::getListByIp($iP);
        $quantityCompareList =count($modelCompareList);
        //vd($quantityInCart);
        return $this->render('cart', ['quantityInCart' => $quantityInCart, 'model' => $model,  'quantityWishlist'=> $quantityWishlist,'quantityCompareList'=> $quantityCompareList]);
    }

    public
    function actionBlog()
    {
        return $this->render('blog');
    }

    public
    function actionContact()
    {
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $modelReqvizit = Reqvizit::findOne(1);
        return $this->render('contact', ['quantityInCart' => $quantityInCart, 'modelReqvizit' => $modelReqvizit]);
    }


    public
    function actionDetail()
    {
        $modelBest = Goods::getBest(3);
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $id = Yii::$app->request->get('item');
        $modelReview = Review::getReviewsByGoodId($id);
        $modelGoodsCategories = GoodsCategory::find()->all();
        $modelBrends = Brend::find()->all();
        if (!$id) {
            $this->redirect('/shop/index');
        }
        $model = Goods::getItemById($id);
        $modelWishList = WishList::getListByIp($iP);
        $quantityWishlist= count($modelWishList);
        $modelCompareList = Compare::getListByIp($iP);
        $quantityCompareList =count($modelCompareList);

        return $this->render('detail', ['model' => $model,
            'modelGoodsCategories' => $modelGoodsCategories,
            'modelReview' => $modelReview,
            'modelBest' => $modelBest,
            'quantityInCart' => $quantityInCart,
            'quantityWishlist'=> $quantityWishlist,
            'quantityCompareList'=> $quantityCompareList,
            'modelBrends' => $modelBrends]);
    }

    // Мой заказ
    public function actionOrder()
    {
        $iP = Yii::$app->session->id;
        $model = Order::getAllByIp($iP);
        $quantityInCart = Cart::getQountAllByIp($iP);
        return $this->render('order', ['model' => $model,
            'quantityInCart' => $quantityInCart,]);
    }

    //***************************************** functions **************************************************************
    //Добавляет товар в корзину
    public function actionAddToCart()
    {
        $arrResult = [];
        $iP = Yii::$app->session->id;
        $good_id = Yii::$app->request->post('good_id');
        // если есть этот товар в корзине то просто увеличить его количество на 1
        $isItemInCart = Cart::_isItemAlreadyInCart($good_id);
        if ($isItemInCart) {
            Cart::updateItemQuantityUp($good_id);
        } else {

            $model = new Cart();
            $model->ip = Yii::$app->session->id;
            $model->goods_id = $good_id;
            $model->quantity = 1;
            $model->price = Goods::getPriceById($good_id);
            $model->category_id = Goods::getCategoryById($good_id);
            $model->brend_id = Goods::getBrendById($good_id);
            //$model->validate();
            //vd($model->getErrors());
            $model->save();
        }
        $quantityInCart = Cart::getQountAllByIp($iP);
        $arrResult['quantity'] = $quantityInCart;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $arrResult;

    }

    //Добавляет много товаров  в корзину
    public function actionAddToManyCart()
    {
        $arrResult = [];
        $iP = Yii::$app->session->id;
        $good_id = Yii::$app->request->post('good_id');
        $total = Yii::$app->request->post('total');
        // если есть этот товар в корзине то просто увеличить его количество на 1
        $isItemInCart = Cart::_isItemAlreadyInCart($good_id);
        if ($isItemInCart) {
            Cart::updateItemQuantityUpMany($good_id, $total);
        } else {

            $model = new Cart();
            $model->ip = Yii::$app->session->id;
            $model->goods_id = $good_id;
            $model->quantity = $total;
            $model->price = Goods::getPriceById($good_id);
            $model->category_id = Goods::getCategoryById($good_id);
            $model->brend_id = Goods::getBrendById($good_id);
            //$model->validate();
            //vd($model->getErrors());
            $model->save();
        }
        $quantityInCart = Cart::getQountAllByIp($iP);
        $arrResult['quantity'] = $quantityInCart;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $arrResult;

    }

    //Выведет аяксом все товары этой категории
    public function actionGetGoodsByCategory()
    {
        $category_id = Yii::$app->request->post('category_id');
        $model = Goods::getGoodsByCategoriId($category_id);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($model) {
            return $this->renderAjax('/ajax/_get-goods-by-category', ['model' => $model]);
        } else {
            return $this->renderAjax('/ajax/_empty');
        }
    }

    //Увеличивает количество товаров на 1 еденицу
    public function actionAddMoreQuantity()
    {
        $arrResult = [];
        $iP = Yii::$app->session->id;
        $good_id = Yii::$app->request->post('good_id');
        $goodPrice = Goods::getPriceById($good_id);
        // vd($good_id);
        $model = Cart::getItemById($good_id);
        $model->quantity = $model->quantity + 1;
        $model->price = $model->price + $goodPrice;
        $model->updateAttributes(['quantity', 'price']);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $arrResult['new_quantity'] = $model->quantity;
        $arrResult['new_price'] = $model->price;
        $arrResult['total'] = $quantityInCart;
        return $arrResult;


    }

    //Уменьшает количество товаров на 1 еденицу
    public function actionRemoveMoreQuantity()
    {
        $arrResult = [];
        $iP = Yii::$app->session->id;
        $good_id = Yii::$app->request->post('good_id');
        $goodPrice = Goods::getPriceById($good_id);
        // vd($good_id);
        $model = Cart::getItemById($good_id);
        $model->quantity = $model->quantity - 1;
        $model->price = $model->price - $goodPrice;
        $model->updateAttributes(['quantity', 'price']);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $arrResult['new_quantity'] = $model->quantity;
        $arrResult['new_price'] = $model->price;
        $arrResult['total'] = $quantityInCart;
        return $arrResult;


    }

    //Удаляет товар из корзины
    public function actionDeleteFromCart()
    {
        $arrResult = [];
        $good_id = Yii::$app->request->post('good_id');
        $arrResult['result'] = Cart::deleteItemById($good_id);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $iP = Yii::$app->session->id;
        $quantityInCart = Cart::getQountAllByIp($iP);
        $arrResult['total'] = $quantityInCart;
        return $arrResult;

    }

    //Верент массив городов
    public function actionGetCities()
    {
        $arrResult = [];
        $country_id = Yii::$app->request->post('country_id');
        $arrCities = GeoCity::find()->where(['country_id' => $country_id])->orderBy('name_ru ASC')->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $html = $this->renderAjax('/ajax/_cities', ['arrCities' => $arrCities]);
        $arrResult['html'] = $html;
        return $arrResult;

    }

    // Веренет товары этого бренда
    public function actionGetGoodsByBrend()
    {
        $brend_id = Yii::$app->request->post('brend_id');
        $model = Goods::getGoodsByBrendId($brend_id);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($model) {
            return $this->renderAjax('/ajax/_get-goods-by-category', ['model' => $model]);
        } else {
            return $this->renderAjax('/ajax/_empty');
        }
    }

    // Создать Заказ
    public function actionMakeOrder()
    {
        //vd(Yii::$app->request->post());
        $model = new Order();
        $model->load(Yii::$app->request->post());
        $model->payment_type = Yii::$app->request->post()['payment'];
        $model->status = 1;
        $model->created_at = time();
        //$model->validate();
        //vd($model->getErrors());
        $model->save();
        $orderId = $model->id;
        $allGoodsFroMCart = Cart::getAllbyIp(Yii::$app->session->id);
        //Todo создать список товаров связв=анных с заказом и сох в отдель таб  по ip
        foreach ($allGoodsFroMCart as $good) {
            $_model = new OrderItems();
            $_model->order_id = $orderId;
            $_model->ip = $good->ip;
            $_model->goods_id = $good->goods_id;
            $_model->quantity = $good->quantity;
            $_model->price = $good->price;
            $_model->category_id = $good->category_id;
            $_model->brend_id = $good->brend_id;
            $_model->save();
            $good->delete();
        }
        //Todo удалить из корзины  товары по ip
    }

    public function actionAddContact()
    {
        $arrResult = [];
        $model = new Contacts();

        $model->ip = Yii::$app->session->id;
        $model->user_id = yii::$app->user->id ? yii::$app->user->id : null;
        $model->created_at = time();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($model->save()) {
            $arrResult['success'] = 'Сообщение успешно отправленно!';
            return $arrResult;
        } else {
            // ошибки
            if (Yii::$app->request->post('Contacts')['content'] == null) {
                $arrResult['error'] = 'Сообщение пусто!';
                return $arrResult;
            }
            if (Yii::$app->request->post('Contacts')['name'] == null) {
                $arrResult['error'] = 'Имя пусто!';
                return $arrResult;
            }
            if (Yii::$app->request->post('Contacts')['email'] == null) {
                $arrResult['error'] = 'email пусто!';
                return $arrResult;
            }
            if (Yii::$app->request->post('Contacts')['subject'] == null) {
                $arrResult['error'] = 'Тема  пуста!';
                return $arrResult;
            }
            $arrResult['error'] = 'Не коректный Email!';
            return $arrResult;
        }
    }

    // Добавляет товар в список желаний
    public function actionAddToWishlist()
    {
        $arrResult = [];
        $good_id = Yii::$app->request->post('good_id');

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $isItemInWishList = Wishlist::_isItemAlreadyIn($good_id, Yii::$app->session->id);
        if ($isItemInWishList) {
            $arrResult['error'] = 'Товар уже в списке желаний';
            return $arrResult;
        }
        $model = new Wishlist();
        $model->ip = Yii::$app->session->id;
        $model->goods_id = $good_id;
        $model->created_at = time();
        $model->price = Goods::getPriceById($good_id);
        $model->category_id = Goods::getCategoryById($good_id);
        $model->brend_id = Goods::getBrendById($good_id) ? Goods::getBrendById($good_id) : null;
        //$model->validate();
        //vd($model->getErrors());


        if ($model->save()) {
            $arrResult['success'] = 'Товар добавлен в список желаний!';
            $quantityInWishList=count( Wishlist::getListByIp(Yii::$app->session->id));
            $arrResult['quantity'] = $quantityInWishList;

        } else {
            //$model->validate();
            //vd($model->getErrors());
            $arrResult['error'] = 'Ошибка добавления товара!';
        }
        return $arrResult;
    }

       // Добавляет товар в список желаний
    public function actionAddToComparelist()
    {
        $arrResult = [];
        $good_id = Yii::$app->request->post('good_id');

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $isItemInCompareList = Compare::_isItemAlreadyIn($good_id, Yii::$app->session->id);
        if ($isItemInCompareList) {
            $arrResult['error'] = 'Товар уже в списке сравнений';
            return $arrResult;
        }
        $model = new Compare();
        $model->ip = Yii::$app->session->id;
        $model->goods_id = $good_id;
        $model->created_at = time();
        $model->price = Goods::getPriceById($good_id);
        $model->category_id = Goods::getCategoryById($good_id);
        $model->brend_id = Goods::getBrendById($good_id) ? Goods::getBrendById($good_id) : null;
        //$model->validate();
        //vd($model->getErrors());



        if ($model->save()) {
            $arrResult['success'] = 'Товар добавлен в список сравнения!';
            $quantityInCompareList=count( Compare::getListByIp(Yii::$app->session->id));
            $arrResult['quantity'] = $quantityInCompareList;

        } else {
            //$model->validate();
            //vd($model->getErrors());
            $arrResult['error'] = 'Ошибка добавления товара!';
        }
        return $arrResult;
    }


    // Удаляет товар в список желаний
    public function actionRemoveFromWishlist()
    {
        $arrResult = [];
        $good_id = Yii::$app->request->post('good_id');
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $isItemInWishList = Wishlist::_isItemAlreadyIn($good_id, Yii::$app->session->id);
        if ($isItemInWishList) {
            $model = Wishlist::getItemByGoodId($good_id, Yii::$app->session->id);
            $model->delete();
            $arrResult['success'] = 'Товар удален из списка желаний!';
        } else {
            $arrResult['error'] = 'Ошибка удаления товара!';
        }

        return $arrResult;
    }

}
