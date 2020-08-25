<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
?>

<div class="user-master-form">

    <?php $form = ActiveForm::begin(['action' => '#', 'options' => ['id' => 'validate_form']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->radioList([1 => 'Male', 2 => 'Female']); ?>  

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_pwd')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_hobby')->checkboxList(['reading' => 'Reading', 'writing' => 'Writing', 'music' => 'Music', 'travelling' => 'Travelling', 'drawing' => 'Drawing']) ?>

    <div class="form-group">
	<?= Html::submitButton('Submit', ['class' => 'btn btn-success btn_check_vali']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$this->registerJsFile('https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', ['depends' => 'yii\web\JqueryAsset']);
$this->registerJsFile('@web/js/custom_validation.js', ['depends' => 'yii\web\JqueryAsset', 'position' => View::POS_END]);
?>
