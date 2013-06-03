<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h3>Administración de Tipos - Información de Referencia</h3>

<p>Seleccione la opción que desea administrar:</p>

<div id="listmenu">
<ul>
	<li>[<a href="<?php echo CHtml::encode($this->createUrl('documentType/admin')) ?>">Tipos de Documento</a>]</li>
	<li>[<a href="<?php echo CHtml::encode($this->createUrl('movementType/admin')) ?>">Tipos de Movimiento</a>]</li>
	<li>[<a href="<?php echo CHtml::encode($this->createUrl('movementCategory/admin')) ?>">Categorías de Movimiento</a>]</li>
	<li>[<a href="<?php echo CHtml::encode($this->createUrl('operationEntity/admin')) ?>">Entidades de Operación</a>]</li>
</ul>
</div>

<?php
if (Yii::app()->user->permission_level &&  Yii::app()->user->permission_level > 3)
{ ?>
	<p><br>Administraciones adicionales en el sistema:</p>

	<div id="listmenu">
	<ul>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('user/admin')) ?>">Usuarios</a>]</li>
		<li>[<a href="<?php echo CHtml::encode($this->createUrl('company/admin')) ?>">Empresas</a>]</li>
	</ul>
	</div>
<?php 
} ?>