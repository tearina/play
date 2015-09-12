<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $user app\models\User */
    /* @var $form yii\widgets\ActiveForm */
    /* @var $role app\rbac\models\Role; */
?>
<div class="application-add-form">

    <?php $form = ActiveForm::begin(['id' => 'application-add-form']) ?>

    <?= $form -> field($model, 'name');var_dump($model->name);die;?>

    <?= $form -> field($model, 'info') -> textarea() ?>

    <?= $form -> field($model, 'group_id') -> dropdownList($model -> groupList) ?>

    <?= $form -> field($model, 'pic')-> fileInput() ?>

    <div class="form-group">     
        <?= Html::submitButton(Yii::t('app', 'Create'), ['btn btn-success']) ?>

        <?= Html::a(Yii::t('app', 'Cancel'), ['/'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 
</div>
