<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Kabinetga kirish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row d-flex flex-column align-items-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-5"><?= strtoupper( $this->title )?></h5>
                    </div>
                </div>
                <div class="card-body"> 

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => [
                            'class' => 'form-horizontal g-3',                            
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
                    <div class="row">
                    <div class="col-lg-12">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-lg-12">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class=\"col-lg-12 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
                            ]) ?>
                    </div>       
                    <div class="form-group text-end">
                        <div class="col-lg-4">
                            <?= Html::submitButton('Kirish', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>    
</div>
