<?php

/* @var $this yii\web\View */
/* @var $model app\modules\intervyu\models\NomzodlarForm */

$this->title = "Nomzodlik uchun ma'lumotlaringiz";
$this->params['breadcrums'][] = $this->title;
?>
<section class="dashboard section"> 
  <div class="container">
    <?= $this->render('resume_form', [ 
                'model' => $model 
            ]) 
    ?> 
  </div><!-- default-index -->
</section>