<?php

namespace app\controllers;

use app\models\Application;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Yii;
 
class ApplicationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionCreate()
    {
        $model = new Application();
        $dir = Yii::getAlias('@webroot') . '/uploads/';
        if ($model -> load(Yii::$app->request->post())){
            if($file = UploadedFile::getInstance($model, 'pic_file'))
                $model-> pic_file = $file;
            if ($model->save() && $file)
                $file -> saveAs($dir . $model -> id . '.jpg');
            $this -> redirect(array('index'));
        }
        else
            return $this->render('create', ['model' => $model]);
    }
}
