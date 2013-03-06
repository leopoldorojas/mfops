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

?>

<script>
function calculateTotal($scope) {
	$scope.amount0=0;
	$scope.amount1=0;
	$scope.amount2=0;
	$scope.amount3=0;
	$scope.amount4=0;

	$scope.calculatedTotalAmount = function() {
		return ($scope.amount0 + $scope.amount1 + $scope.amount2 + $scope.amount3 + $scope.amount4)
  	};
}
</script>

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