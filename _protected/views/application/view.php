<div class="application-view">
    <div class="row">
        <div class="col-sm-6 col-md-3">
           <img class="img-rounded"
               src="<?= ($model -> pic) ? '/uploads/application/' . $model -> id . '.jpg' : '/uploads/app_empty.png';?>"
               alt="...">
        </div>
        <div class="col-sm-6 col-md-9">
            <h3><?= $model->name ?></h3>
            <p>
                <?= ($model->info) ? $model->info : 'Описание отсутствует' ?>
            </p>
        </div>
    </div>
    <br>
    <a class="btn btn-default btn-lg" href="/application/index">К полному списку приложений</a>
</div>