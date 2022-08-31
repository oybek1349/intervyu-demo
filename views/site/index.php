<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Tanlov-demo';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Diqqat Tanlov!</h1>

        <p class="lead">Tanlovda ishtirok etish uchun o'z nomzodingizni qoldiring.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['/intervyu'])?>">Boshladik...</a></p>
    </div>

    <div class="body-content">

    </div>
</div>
