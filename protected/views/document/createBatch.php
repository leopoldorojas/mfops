<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Administrar Documentos', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('angularController', "
function adminTotal(\$scope, \$http) {
	\$scope.amount = 0;
	\$scope.varTotal = 0;
	\$scope.document = {}
	\$scope.operations = [
	    {input: 0},
	    {input: 1},
	    {input: 2},
	    {input: 3},
	    {input: 4},
	    {input: 5}
	];

	\$scope.calculatedTotalAmount = function() {
		\$scope.varTotal = parseInt(\$scope.amount);
		return \$scope.varTotal;
  	}

	\$scope.submit = function() {
		\$scope.method = 'POST';
		\$scope.url = 'http://localhost:8888/mfops/index.php/document/createRestfulBatch';
	    \$scope.code = null;
	    \$scope.response = null;
	    \$scope.dataToSend = {
	    	'Document': {
	    		'number':'a200',
	    		'entitity':'entidad perfecta'
	    	},
	    	'Operation' : [
	    		{
	    			'monto':'1000',
	    			'fecha':'hoy',
	    			'detalle':'excelente'
	    		},
	    		{
	    			'monto':'2000',
	    			'fecha':'magnana',
	    			'detalle':'excelente plus'	    			
	    		}
	    	]
	    }

	    \$http({method: \$scope.method, url: \$scope.url, data: \$scope.dataToSend, headers: {'Content-Type': 'application/x-www-form-urlencoded'}}).
	      success(function(data, status) {
	      	alert (data);
	        \$scope.status = status;
	        \$scope.data = data;
	      }).
	      error(function(data, status) {
	      	alert ('Failed!!!');
	        \$scope.data = data || 'Request failed';
	        \$scope.status = status;
	    });
    }

	\$scope.amountNotValid = function() {
		if (\$scope.varTotal != parseInt(\$scope.totalAmount)) {
			return true;
		} else {
			return false;
		}
	}
}
", CClientScript::POS_HEAD);
?>

<h1>Registrar Documento</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php echo $this->renderPartial('_formBatch', array(
	'model'=>$model,
	'operation'=>$operation,
	));
?>