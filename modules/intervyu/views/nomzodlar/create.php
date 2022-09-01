<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\intervyu\models\Nomzodlar */

$this->title = 'Create Nomzodlar';
$this->params['breadcrumbs'][] = ['label' => 'Nomzodlars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomzodlar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
