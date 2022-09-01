<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

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
                    ]); 
                    ?> 
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?= $form->field($model, 'name')->textInput() ?>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?= $form->field($model, 'familyName')->textInput() ?>
                        </div> 
                    </div>   
                        <?= $form->field($model, 'address')->textInput() ?>
                        <?= $form->field($model, 'countryOfOrigin')->textInput() ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <?= $form->field($model, 'emailAddress')->input('email',['placeholder'=>'email@example.com']) ?>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <?= $form->field($model, 'phoneNumber',[
                                    'template'=>'{label}<div class="input-group">
                                                  <span class="input-group-text" id="basic-addon1">+</span>{input}{error}
                                                 </div>'
                                    ])->textInput(['placeholder' => '998XXxxxxxxx']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">                      
                                <?= $form->field($model, 'age')->dropDownList(array_combine(range(18,55),range(18,55))) ?>
                            </div>                                                       
                        </div>                       
                        <div class="form-group">
                            <?= Html::submitButton('Yuborish', ['class' => 'w-100 btn btn-primary']) ?>
                        </div>                          
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>