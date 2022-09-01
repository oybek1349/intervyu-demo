<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\intervyu\models\Nomzodlar */

$this->title = 'Update Nomzodlar: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nomzodlars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nomzodlar-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
