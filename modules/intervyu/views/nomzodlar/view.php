<?php

use app\modules\intervyu\models\Nomzodlar;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\intervyu\models\Nomzodlar */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nomzodlars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nomzodlar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?= DetailView::widget([
        'model' => $model,
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'datetimeFormat' => 'd.MM.Y H:mm',
        ],
        'attributes' => [
            'id',
            'name',
            'familyName',
            'address',
            'countryOfOrigin',
            'emailAddress:email',
            'phoneNumber',
            'age',
            'hired' => [
                'attribute' => "Ishga qabul",
                'value' => function ($model){
                       if( $model->hired == 1){
                           return "Qabul qilindi";
                       } 
                       return "Ko'rib chiqilmoqda"; 
                }
            ],
            'status' => [ 
                'attribute' => "Status",
                'value' => function ($model) {
                            $sts = null;
                            switch ($model->status){
                                case Nomzodlar::STS_YANGI: $sts = "Yangi"; break; 
                                case Nomzodlar::STS_INTERVYU_BELGILANGAN: $sts = "Intervyu belgilangan"; break;
                                case Nomzodlar::STS_QABUL_QILINGAN: $sts = "Qabul qilingan"; break;
                                case Nomzodlar::STS_QABUL_QILINMAGAN: $sts = "Qabul qilinmagan"; break;
                                default: $sts= "-"; 
                            }                                 
                                return $sts;
                        }
            ],
            'note',
            'dateTimeInterview:datetime',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
