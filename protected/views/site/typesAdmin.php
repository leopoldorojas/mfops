<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>Bienvenida/o al</br><?php echo CHtml::encode(Yii::app()->name); ?> - Grupo FINCA</h2>

<p>El <b>Sistema de Operaciones para Instituciones Microfinancieras</b> tiene como propósito apoyar a las instituciones (IMF) con el control y gestión de sus operaciones financieras que sean distintas a las del control de su cartera. En otras palabras es un sistema para <b>gestionar los movimientos de dinero que ocurren en la institución</b> pero que no pertencen a los movimientos de desembolsos, cobros y pagos de créditos. No es un sistema financiero de cartera. Su principal objetivo es que los movimientos operativos tengan un efecto en la contabilidad de la institución y, de esta manera, mantener una gestión contable integral.</p>

<!--
				array('label'=>'Tipos de Documento', 'url'=>array('documentType/admin')),
				array('label'=>'Tipos de Movimiento', 'url'=>array('movementType/admin')),
				array('label'=>'Categorías de Movimiento', 'url'=>array('movementCategory/admin')),
				array('label'=>'Entidades', 'url'=>array('operationEntity/admin')), -->

<p>Actualmente el sistema está diseñado para integrarse con el <a href="http://www.mambu.com/es" target=_blank>Sistema de Microfinanzas Mambu</a> - <a href="http://www.mambu.com/es" target=_blank>www.mambu.com</a></p>

<p>Para más detalles del sistema de información, por favor contáctese a <a href="mailto:info@arckanto.com">info@arckanto.com</a> o visite el sitio Web de <a href="http://www.arckanto.com" target=_blank>Arckanto software</a>, empresa desarrolladora del sistema.</p>
