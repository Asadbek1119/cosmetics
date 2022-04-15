<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Error 404 Not Found';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="error-page">
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Kechirasiz, Bunday sahifa mavjud emas!</h2>
            <p>AGAR SIZ QIDIRAYOTGAN SAHIFA NOMI O'ZGARTIRILGAN BO'LSA YOKI VAQTINCHA MAVJUD BO'LMASA, O'CHIRILGAN BO'LISHI MUMKIN!</p>
            <a href="<?=Yii::$app->homeUrl?>">Bosh Sahifaga Qaytish</a>
        </div>
    </div>
</div>

