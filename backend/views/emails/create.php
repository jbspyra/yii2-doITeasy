<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Emails $model */

$this->title = 'Create Emails';
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
