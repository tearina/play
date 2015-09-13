<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
?>
<h1>Список приложений</h1>

<?php $form = ActiveForm::begin(['action' => '/application/index', 'options' => ['class' => 'form-inline pull-right']]); ?>
    <?= $form->field($searchModel, 'name', ['template' => "{input}{hint}"]) ?>
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-default']) ?>
<?php ActiveForm::end(); ?>

<div class=" application-list">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="list-group">
                <?php foreach($model -> groupList as $id => $group): ?>
                    <a href="<?= Url::to(['application/index', 'group_id' => $id]) ?>"
                        class="list-group-item<?php if($id === $group_id) echo ' disabled'; ?>">
                        <?= $group ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?= ListView::widget([
            'summary' => false,
            'emptyText' => 'Приложений не найдено',
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item thumbnail'],
            'itemView' => '_application',
            'layout' => '{items}<div class="clearfix"></div>{pager}',
            'options' => ['class' => 'col-sm-6 col-md-9']
        ]) ;?>
        <div class="clearfix"></div>
    </div>
</div>