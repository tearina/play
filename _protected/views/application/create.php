<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $user app\models\User */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $role app\rbac\models\Role; */
?>
<div class="application-add-form">

    <?php $form = ActiveForm::begin(['id' => 'application-add-form', 'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal col-sm-8']]) ?>

    <?= $form -> field($model, 'name');?>

    <?= $form -> field($model, 'info') -> textarea() ?>

    <?= $form -> field($model, 'group_id') -> dropdownList($model -> groupList) ?>

    <?= $form -> field($model, 'pic_file') -> fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Создать'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
