<?php
class SkupController extends Controller
{
    public $layout = '//layouts/column2';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('view', 'create', 'update', 'admin', 'delete'),
                'roles' => array('Admin'),
            ),
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('view', 'create', 'update', 'admin', 'delete'),
                'roles' => array('Admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Skup;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Skup'])) {
            $model->attributes = $_POST['Skup'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Skup'])) {
            $model->attributes = $_POST['Skup'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionAdmin()
    {
        $now = new Skup('search');
        $now->unsetAttributes();
        $now->attributes = array('Skupforever' => 0);
        if (isset($_GET['Skup']))
            $now->attributes = $_GET['Skup'];

        $forever = new Skup('search');
        $forever->unsetAttributes();
        $forever->attributes = array('Skupforever' => 1);
        if (isset($_GET['Skup']))
            $forever->attributes = $_GET['Skup'];

        $this->render('admin', array(
            'now' => $now,
            'forever' => $forever,
        ));
    }

    public function loadModel($id)
    {
        $model = Skup::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'skup-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}