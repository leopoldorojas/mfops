<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
<<<<<<< HEAD
	'name'=>'Microfinzas - Movimientos de Operaciones de IMF',
	// Actualización de master. Este es el master.
=======
	'name'=>'Microfinzas - Movimientos de Operaciones',
	// Este es la actualización del branch development. Este es development.
>>>>>>> development

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		/* 'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		), */
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mfops',
			'emulatePrepare' => true,
			'username' => 'leopoldo.rojas',
			'password' => 'facil1234',
			'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);