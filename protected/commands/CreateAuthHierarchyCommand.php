<?php 

class CreateAuthHierarchyCommand extends CConsoleCommand
{
    public function run($args)
    {
		$auth=Yii::app()->authManager;

		$appUser=$auth->createRole('app-user', 'Application user');

		$companyAdmin=$auth->createRole('company-admin', 'Company Admin user');
		$companyAdmin->addChild('app-user');

		$masterAdmin=$auth->createRole('master-admin', 'Master Admin user');
		$masterAdmin->addChild('company-admin');

		$arckantoAdmin=$auth->createRole('arckanto-admin', 'Arckanto Admin user');
		$arckantoAdmin->addChild('master-admin');

		$superAdmin=$auth->createRole('super-admin', 'Super Admin user');
		$superAdmin->addChild('arckanto-admin');
		 
		$bizRule='return Yii::app()->user->id != $params["user"]->id;';
		$auth->createOperation('notDeleteOwnUser','Not allow to delete own user',$bizRule);

		/*
		$auth->assign('super-admin',1);
		$auth->assign('arckanto-admin',5);
		$auth->assign('master-admin',2);
		$auth->assign('company-admin',3);
		$auth->assign('app-user',4);
		*/
    }
}

?>