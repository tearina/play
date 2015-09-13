<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
?>
<h1>Список приложений</h1>
<div class=" application-list">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="list-group">
                <?php foreach($model -> groupList as $id => $group): ?>
                    <a href="/application/group/<?= $id ?>" class="list-group-item <!-- desabled -->"><?= $group ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <?= ListView::widget([
            'summary' => false,
            'emptyText' => 'Приложений не найдено',
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item thumbnail'],
            'itemView' => '_application',
            'options' => ['class' => 'col-sm-6 col-md-9']
        ]) ?>
        <div class="clearfix"></div>
    </div>
</div>