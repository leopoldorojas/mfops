<?php

class DocumentController extends Controller
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
			array('allow', // allow authenticated user
				'actions'=>array('createRestfulBatch', 'admin', 'view', 'print'),
				'users'=>array('@'),
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
		$operation=new Operation('search');

		if(isset($_GET['Operation']))
			$operation->attributes=$_GET['Operation'];

		$operation->document_id = $id;

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'operation'=>$operation,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Document;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model with several instances of the child model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateBatch()
	{
		$model=new Document;
		$operations=$this->getOperationsOfADocument();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->validate())
			{	
				if(isset($_POST['Operation']))
				{
					$valid=true;
					$validAccountingRule = true;

	        		foreach($operations as $i=>$operation)
	            		if(isset($_POST['Operation'][$i])) {
	                		$operation->attributes=$_POST['Operation'][$i];
	                		$operation->document_id=1; // Temporal Document ID in order pass validate()
	            			if ($operation->validateDetail()) {
		                		$valid=$operation->validate() && $valid;
		                		$validAccountingRule=$operation->accountingRule() && $validAccountingRule;
		                	}
	                	}

	        		// if($valid && $validAccountingRule)  { 	// all items are valid 
	        		if($valid && $validAccountingRule && Yii::app()->mambu->connect())  { 	// all items are valid and there is a valid Mambu connection
	        			if($model->save())
	        			{
		        			$journalEntryHasErrors=false;

			        		foreach($operations as $i=>$operation)
			            		if(isset($_POST['Operation'][$i])) {
			                		$operation->attributes=$_POST['Operation'][$i];
			                		$operation->document_id=$model->id;
		
			            			if ($operation->validateDetail()) {
										$journalEntry=new JournalEntry;
										$status = $journalEntry->saveOperation($operation);
										if ($status['status']=='success') {
											$operation->save();
										} else {
											if (!$journalEntryHasErrors) {
												$journalEntryHasErrors=true;
												Yii::app()->user->setFlash('error', 'El documento sí se grabó pero uno o más de los detalles de movimientos de la transacción anterior no se pudieron grabar, posiblemente por fallas de conexión con sistema externo o datos inválidos para el sistema externo');
											}
										}
									}
				                }
               				$this->redirect(array('view','id'=>$model->id));
				        }
		        	} elseif (!$validAccountingRule)
		        		Yii::app()->user->setFlash('error', 'Uno o más de las detalles de movimientos no tiene la Regla Contable definida en el sistema');
		        		elseif ($valid)
		        			Yii::app()->user->setFlash('error', 'No hay conexión con el sistema externo. La transacción no puede ser grabada en este momento. Intente más tarde.');
	        	}
				
			}
		}

		$this->render('createBatch',array(
			'model'=>$model,
			'operations' => $operations,
		));
	}

	public function actionCreateRestfulBatch()
	{
		$model=new Document;
		$operation=new Operation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/* $posteo = json_decode(file_get_contents('php://input'), true);
			echo '$posteo[Document][number] es ' . $posteo['Document']['number'];
			echo '$posteo[Operation][0][amount] es ' . $posteo['Operation'][0]['amount'];
			echo '$posteo[Operation][1][operation_date] es ' . $posteo['Operation'][1]['operation_date'];
			Yii::app()->end(); */


		$_POST = json_decode(file_get_contents('php://input'), true);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			if($model->validate())
			{	
				if(isset($_POST['Operation']))
				{
					$valid=true;
					$validAccountingRule = true;
					$operations=$this->getOperationsOfADocument(0,count($_POST['Operation']));

	        		foreach($operations as $i=>$operation)
	            		if(isset($_POST['Operation'][$i])) {
	                		$operation->attributes=$_POST['Operation'][$i];
	                		$operation->document_id=1; // Temporal Document ID in order pass validate()
	            			if ($operation->validateDetail()) {
		                		$valid=$operation->validate() && $valid;
		                		$validAccountingRule=$operation->accountingRule() && $validAccountingRule;
		                	}
	                	}

	        		// if($valid && $validAccountingRule)  { 	// all items are valid 
	        		if($valid && $validAccountingRule && Yii::app()->mambu->connect())  { 	// all items are valid and there is a valid Mambu connection
	        			if($model->save())
	        			{
		        			$journalEntryHasErrors=false;

			        		foreach($operations as $i=>$operation)
			            		if(isset($_POST['Operation'][$i])) {
			                		$operation->attributes=$_POST['Operation'][$i];
			                		$operation->document_id=$model->id;
		
			            			if ($operation->validateDetail()) {
										$journalEntry=new JournalEntry;
										$status = $journalEntry->saveOperation($operation);
										if ($status['status']=='success') {
											$operation->journal_entry_id = $status['journal_entry_id'];
											$operation->save();
										} else {
											if (!$journalEntryHasErrors) {
												$journalEntryHasErrors=true;
												Yii::app()->user->setFlash('error', "El documento sí se grabó pero uno o más de los detalles de movimientos de la transacción anterior no se pudieron grabar, posiblemente por fallas de conexión con sistema externo o datos inválidos para el sistema externo. " . $status['status']);
											}
										}
									}
				                }
               				//$this->redirect(array('view','id'=>$model->id));
				            $response = array(
				            	'status' => 'success',
				            	'model' => $model->id,
				            	'message' => 'Transacción exitosa',
				            );
				            echo json_encode($response);
				            Yii::app()->end();
				        }
		        	} elseif (!$validAccountingRule)
		        		Yii::app()->user->setFlash('error', 'Uno o más de las detalles de movimientos no tiene la Regla Contable definida en el sistema');
		        		elseif ($valid)
		        			Yii::app()->user->setFlash('error', 'No hay conexión con el sistema externo. La transacción no puede ser grabada en este momento. Intente más tarde.');
		        		else
		        			Yii::app()->user->setFlash('error', 'Error en un detalle. Verifique montos del detalle y sus fechas de movimiento');
	        	}
				
			} else {
				Yii::app()->user->setFlash('error', 'El documento no es válido. Verifique el Tipo de Documento, Número de Documento, Fecha de Operación y Monto. Verifique también que el documento no esté duplicado.');
			}
		}

		if (Yii::app()->user->hasFlash('error')) {
            $response = array(
            	'status' => 'error',
            	'model' => 0,
            	'message' => Yii::app()->user->getFlash('error'),
            );
            echo json_encode($response);
            Yii::app()->end();
		}

		$this->render('createBatch',array(
			'model'=>$model,
			'operation' => $operation,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateBatch($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
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
		$dataProvider=new CActiveDataProvider('Document');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Document('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionPrint($id)
	{
		$operation=new Operation('search');
		$operation->document_id = $id;

		$this->render('print',array(
			'model'=>$this->loadModel($id),
			'operation'=>$operation,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Document the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getOperationsOfADocument($document_id=0, $number_of_rows=5)
	{
		$operations = array();
		if ($document_id == 0)
			for ($i = 1; $i <= $number_of_rows; $i++)
				$operations[] = new Operation;
		return $operations;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Document $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
