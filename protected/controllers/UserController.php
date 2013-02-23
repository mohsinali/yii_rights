<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'createsalon'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
      $model = new User;
        $model->user_role = "Authenticated";

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->city_id = $_POST['city_id'];

            $rnd = rand(0, 9999);
            $uploadedFile = CUploadedFile::getInstance($model, 'profile_image');
            $fileName = "{$rnd}-{$uploadedFile}";
            $model->profile_image = $fileName;

            if ($model->save()) {
                $model->assignUserToRole();
                $uploadedFile->saveAs(Yii::app()->basePath . '/files/user_profile_pictures/' . $fileName);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
	}
  
  public function actionCreateSalon(){
//  http ://www.yiiframework.com/wiki/19/how-to-use-a-single-form-to-collect-data-for-two-or-more-models/
    $model_user = new User;
    $model_profile_salon = new ProfileSalon;
    $model_user->user_role = "Salon";            

    if(isset($_POST['User']) and isset($_POST['ProfileSalon'])){
//        $model_user->validate;

        $model_user->city_id = $_POST['city_id'];
        $model_user->attributes = $_POST['User'];
        $model_profile_salon->attributes = $_POST['ProfileSalon'];

        $rnd = rand(0, 9999);
        $uploadedFile = CUploadedFile::getInstance($model_user, 'profile_image');
        $fileName = "{$rnd}-{$uploadedFile}";
        $model_user->profile_image = $fileName;

        $model_user->validate();
        $model_profile_salon->validate();

        if($model_user->save()){
            $model_user->assignUserToRole();
            $uploadedFile->saveAs(Yii::app()->basePath.'/files/user_profile_pictures/'.$fileName);

            $model_profile_salon->user_id = $model_user->id;
            if($model_profile_salon->save()){
                Yii::app()->user->setFlash("success", "You have been signed up as a 'Salon'.");
                $this->redirect(array('view','id'=>$model_user->id));
            }
        }
    }

    $this->render('createsalon', array(
    'model' => $model_user,
    'model_profile_salon' => $model_profile_salon,
));
}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
  
  public function getCityList() {
        $cities = City::model()->findall();
        $citiesArray = CHtml::listData($cities, 'id', 'name');

        return $citiesArray;
    }

    public function getCountryList() {
        $options = Country::model()->findall();
        $countryArray = CHtml::listData($options, 'id', 'name');
        return $countryArray;
    }

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
