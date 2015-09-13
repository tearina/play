<?php
    use yii\helpers\Html;
?>
<img src="
    <?= ($model -> pic) ? '/uploads/application/' . $model -> id . '.jpg' : '/uploads/app_empty.png';?>"
alt="...">
<div class="caption">
    <p><?= $model->name;?> </p>
</div>
