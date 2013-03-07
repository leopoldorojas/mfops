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
function adminTotal(\$scope) {
	\$scope.amount0 = 0;
	\$scope.amount1 = 0;
	\$scope.amount2 = 0;
	\$scope.amount3 = 0;
	\$scope.amount4 = 0;
	\$scope.varTotal = 0;

	\$scope.calculatedTotalAmount = function() {
		\$scope.varTotal = (parseInt(\$scope.amount0) + parseInt(\$scope.amount1) + parseInt(\$scope.amount2) + parseInt(\$scope.amount3) + parseInt(\$scope.amount4));
		return \$scope.varTotal;
  	}

	\$scope.validateAmounts = function() {
		if (\$scope.varTotal != parseInt(\$scope.totalAmount)) {
			alert ('Error: Los totales no coinciden ' +  \$scope.varTotal + ' '  + parseInt(\$scope.totalAmount));
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
	'operations'=>$operations,
	));
?>