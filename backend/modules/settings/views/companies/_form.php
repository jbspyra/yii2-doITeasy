<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\settings\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>

    <!--<?= $form->field($model, 'company_start_date')->textInput() ?>-->
    
    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'company_created_date')->textInput() ?> -->

    <?= $form->field($model, 'company_start_date')->widget(
        DateTimePicker::className(), [
            // inline too, not bad
             'inline' => false,
             // modify template for custom rendering
            
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>
    
    
    <?= $form->field($model, 'company_created_date')->widget(
            DateTimePicker::className(), [
                // inline too, not bad
                 'inline' => false,
                 // modify template for custom rendering
                
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>