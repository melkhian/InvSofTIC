<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Appinformacion */

$this->title = 'Create Appinformacion';
$this->params['breadcrumbs'][] = ['label' => 'Appinformacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appinformacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
