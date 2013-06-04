<?php 

class CreateAuthHierarchyCommand extends CConsoleCommand
{
    public function run($args)
    {
		$auth=Yii::app()->authManager;

		$bizRule='return (empty(Yii::app()->user->permission_level) ? false : Yii::app()->user->permission_level >= 5);';
		$auth->createRole('super-admin', 'Super Admin user', $bizRule);

		$bizRule='return (empty(Yii::app()->user->permission_level) ? false : Yii::app()->user->permission_level >= 4);';
		$auth->createRole('arckanto-admin', 'Arckanto Admin user', $bizRule);

		$bizRule='return (empty(Yii::app()->user->permission_level) ? false : Yii::app()->user->permission_level >= 3);';
		$auth->createRole('master-admin', 'Master Admin user', $bizRule);

		$bizRule='return (empty(Yii::app()->user->permission_level) ? false : Yii::app()->user->permission_level >= 2);';
		$auth->createRole('company-admin', 'Company Admin user', $bizRule);

		$bizRule='return (empty(Yii::app()->user->permission_level) ? false : Yii::app()->user->permission_level >= 1);';
		$auth->createRole('app-user', 'Application user', $bizRule);
		 
		$bizRule='return Yii::app()->user->id != $params["user"]->id;';
		$auth->createOperation('deleteUser','delete a user',$bizRule);
    }
}

?>