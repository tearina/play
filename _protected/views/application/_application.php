<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<a href="<?= Url::to(['application/view', 'id' => $model->id]) ?>">
    <img src="
        <?= ($model -> pic) ? '/uploads/application/' . $model -> id . '.jpg' : '/uploads/app_empty.png';?>"
        alt="<?= $model->name ?>">
</a>
<span><?= $model->name ?></span>
