<?php
/* @var $this DocumentController */
/* @var $model Document */

Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
	Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css'
);
Yii::app()->clientScript->registerScriptFile('https://ajax.googleapis.com/ajax/libs/angularjs/1.0.5/angular.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/vendors/date.js');

$this->breadcrumbs=array(
	'Documentos'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'Listar Documentos', 'url'=>array('index')),
	array('label'=>'Consultar Documentos', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('angularController', "
var app = angular.module('arckantoApp', ['ui.date']);

function adminTotal(\$scope, \$http) {
	\$scope.documentReadOnly = false;	
	\$scope.amount = 0;
	\$scope.varTotal = 0;
	\$scope.document = {}
	\$scope.operations = [
		{}
	];

	\$scope.dateOptions = {
	    dateFormat: 'yy-mm-dd',     
	    yearRange: '2007:2025',     
		changeYear: true,           
		changeMonth: true,          
		maxDate: '0',
	};

	\$http.get('http://localhost:8888/mfops/index.php/documentType/list').success(function(data) {
    	\$scope.document_types = data;
  	});

	\$scope.setDocumentNumber = function() {
		var index = 0;
		index = findIndexByKeyValue(\$scope.document_types, 'id', \$scope.document.documentType_id);

		if (index > 0) {
			\$scope.document.number = \$scope.document_types[index].next_number;
			\$scope.documentReadOnly = true;	
		} else {
			\$scope.document.number = '';
			\$scope.documentReadOnly = false;	
		}
	}	

	function findIndexByKeyValue(obj, key, value)
	{
	    for (var i = 0; i < obj.length; i++) {
	        if (obj[i][key] == value) {
	            return i;
	        }
	    }
	    return null;
	}

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

	    for (var i=0, numOperations=\$scope.operations.length; i < numOperations; i++) {
	    	\$scope.operations[i].entity_id = \$scope.operations[i].entity_id || \$scope.document.entity_id;
	    	\$scope.operations[i].entity_name = \$scope.operations[i].entity_name || \$scope.document.entity_name;
	    	\$scope.operations[i].operation_date = \$scope.operations[i].operation_date || \$scope.document.document_date;
	    }

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