<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Consultar Documentos', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('angularController', "
function adminTotal(\$scope, \$http) {
	\$scope.amount = 0;
	\$scope.varTotal = 0;
	\$scope.document = {}
	\$scope.operations = [
		{}
	];

	\$scope.calculatedTotalAmount = function() {
		sumatory = 0;
		angular.forEach(\$scope.operations, function(operation){
  			sumatory += (operation.amount == null) ? 0 : parseInt(operation.amount);
		});
		\$scope.varTotal = sumatory;
		return \$scope.varTotal;
  	};

	\$scope.addOperation = function() {
		\$scope.operations.push({});
	};

	\$scope.removeOperation = function() {
		\$scope.operations.pop();
	};

	\$scope.submit = function() {
		\$scope.method = 'POST';
		\$scope.url = 'http://localhost:8888/mfops/index.php/document/createRestfulBatch';
	    \$scope.code = null;
	    \$scope.response = null;
	    \$scope.dataToSend = {
	    	'Document': \$scope.document,
	    	'Operation': \$scope.operations 
	    }

	    \$http({method: \$scope.method, url: \$scope.url, data: \$scope.dataToSend, headers: {'Content-Type': 'application/x-www-form-urlencoded'}}).
	      success(function(data, status) {
	        \$scope.status = status;
	        \$scope.data = data;

	        if (data.status == 'success') {
	        	window.location = 'http://localhost:8888/mfops/index.php/document/' + data.model.toString();
	        } else {
	        	alert(data.message);
	        }
	      }).
	      error(function(data, status) {
	        \$scope.data = data; 
	        \$scope.status = status;
	        alert('Error. La transacción ha fallado. Posiblemente por fallas de comunicación con el sistema externo. Consulte con su administrador del sistema');
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