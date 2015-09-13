<?php

namespace app\controllers;

use app\models\Application;
use app\models\ApplicationSearch;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Yii;
 
class ApplicationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Application();
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Application model.
     *
     * @param  integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (!$model = Application::findOne($id))
            throw new NotFoundHttpException('The requested page does not exist.');
        return $this->render('view', [
                'model' => $model,
                ]);
    }
    
    
    
    
    public function actionCreate()
    {
        $model = new Application();
        if ($model -> load(Yii::$app->request->post())){
            $puth = Yii::getAlias('@webroot') . '/uploads/application/';
            if($file = UploadedFile::getInstance($model, 'pic_file'))
                $model-> pic_file = $file;
            if ($model->save() && $file)
                $file -> saveAs($puth . $model -> id . '.jpg');
            $this -> redirect(array('index'));
        }
        else
            return $this->render('create', ['model' => $model]);
    }
}
