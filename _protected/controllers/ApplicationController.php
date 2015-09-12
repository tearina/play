<?php

namespace app\controllers;

use app\models\Application;

class ApplicationController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd_form()
    {
        $model = new Application();
        return $this->render('add_form', ['model' => $model]);
    }
    
    public function actionAdd()
    {
        if(isset($_POST['Application']))
        {
            $model = new Application;
            $data = $_POST['Application'];
            $model -> attributes = $data;
            if($model->save()){
                
                $this->redirect(array('index'));
            }
        }
        $this->render('create',array(
            'model'=>$model,
        ));
        return $this->render('index');
    }
}
