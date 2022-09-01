<?php

use app\modules\intervyu\models\Nomzodlar;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\modules\intervyu\models\Nomzodlar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomzodlar-form">
<div class="container">
    <div class="row d-flex flex-column align-items-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-5"><?= strtoupper( $this->title )?></h5>
                    </div>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin([
                        'id' => 'nomzod-form',                
                        'options' => [
                            'class' => 'form-horizontal g-3 m-3',                            
                            'novalidate' => true
                        ],                
                        'fieldConfig' => [
                            'labelOptions' => [
                                'class' => 'form-label'
                            ],
                            'inputOptions' => [
                                    'class' => 'form-control',
                                    'required' => true
                            ],                            
                        ],
                    ]); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'familyName')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'countryOfOrigin')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'emailAddress')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phoneNumber')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'age')->textInput() ?>

                    <?= $form->field($model, 'hired')->dropDownList([
                                    0 => "Ko'rib chiqilmoqda", 
                                    1 => "Qabul qilindi"
                        ]) ?>

                    <?= $form->field($model, 'status')->dropDownList([
                        Nomzodlar::STS_YANGI => "Yangi",
                        Nomzodlar::STS_INTERVYU_BELGILANGAN => "Intervyu belgilangan",
                        Nomzodlar::STS_QABUL_QILINGAN => "Qabul qilingan",
                        Nomzodlar::STS_QABUL_QILINMAGAN => "Qabul qilinmadi"     
                    ]) ?>

                    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'dateTimeInterview')->widget(MaskedInput::class,[
                        'id' => 'dateTimeInterview',
                        'mask' => "9999-99-99 99:99:99",
                        'clientOptions' => [
                            'alias' => 'datetime',
                            "placeholder" => "yyyy-mm-dd hh:mm:ss",
                            "separator" => "-"
                        ]
                    ]) ?>
                    <div class="form-group mt-3 text-end">
                        <?= Html::submitButton('Saqlash', [
                                'id' => 'send-btn',
                                'class' => 'btn btn-success w-25'
                            ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- default-index -->
</div>

<?php 

$js = <<<JS

    const intervyuTime = $('#dateTimeInterview');

JS;

$this->registerJs($js, View::POS_END);
?>