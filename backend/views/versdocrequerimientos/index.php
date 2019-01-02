<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VersdocrequerimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Versdocrequerimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="versdocrequerimientos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Versdocrequerimientos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'VDReqId',
            'ReqId_fk',
            'VDReqDocu',
            'VDReqFechSist',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>