<?php

class CmsCommentController extends Controller
{

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
                'actions'=>array('delete','index','update','view'),
                'roles'=>array('3'),
            ),

            array('allow',  // deny all users
                'actions'=>array('delete','index','update','view'),
                'roles'=>array('2'),
            ),

            array('deny',  // deny all users
                'actions'=>array('delete','index','update','view'),
                'roles'=>array('1'),),

                array('deny',  // deny all users
                    'actions'=>array('delete','index','update','view'),
                    'roles'=>array('?'),
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

		if(isset($_POST['CmsComment']))
		{
			$model->attributes=$_POST['CmsComment'];
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */


	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{

        if(isset($_POST['opyblic']))
        {
            CmsComment::model()->updateByPk($_POST['page_id'],array('status'=>1));
        }

		$model=new CmsComment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CmsComment']))
			$model->attributes=$_GET['CmsComment'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CmsComment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CmsComment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CmsComment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cms-comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
