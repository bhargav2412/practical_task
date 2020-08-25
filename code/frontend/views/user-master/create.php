<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserMaster */

$this->title = 'Create User Master';
$this->params['breadcrumbs'][] = ['label' => 'User Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6">
    <?=
    $this->render('_form', [
	'model' => $model,
    ])
    ?>
</div>
