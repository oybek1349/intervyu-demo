<?php

use app\modules\intervyu\models\Nomzodlar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\intervyu\models\SearchNomzodlar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nomzodlars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomzodlar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nomzodlar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div style="overflow-x: auto; width: 100%;">         
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'formatter' => [
                'class' => 'yii\i18n\Formatter',
                'datetimeFormat' => 'd.MM.Y H:mm',
            ],
            'options' => ['class' => 'table table-striped table-bordered table-hover'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Nomzodlar $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
