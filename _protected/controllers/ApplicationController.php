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
    {//var_dump(Yii::$app->request->post());die;
        $model = new Application();
        if ($model -> load(Yii::$app->request->post())){
            $image = UploadedFile::getInstance($model, 'pic_file');
            if ($model->save())
                $model -> pic_file -> saveAs("uploads/application/" . $model -> id . '.jpg');
            $this -> redirect(array('index'));
        }
        else
            return $this->render('create', ['model' => $model]);
    }
}
