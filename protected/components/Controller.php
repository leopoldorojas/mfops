<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $company_id;

	public function filterGetCompany($filterChain)
	{
		$this->company_id = (empty(Yii::app()->user->company_id) ? '' : Yii::app()->user->company_id);

		if (empty($this->company_id) && ($identifier = $this->getCompanyFromURL()))
		{
			$company = Company::model()->findByAttributes(array('identifier' => $identifier));
			$this->company_id = (empty($company) ? '' : $company->id);
		}

		if (empty($this->company_id))
		{
			$company = Company::model()->findByAttributes(array('identifier' => Yii::app()->params['defaultCompany']));
			$this->company_id = (empty($company) ? '' : $company->id);
		}

	    $filterChain->run();
	}

	public function getCompanyFromURL()
	{
		$hostInfo = parse_url(Yii::app()->request->hostInfo);
		$host = explode('.',preg_replace('/www./', '', $hostInfo['host'], 1));
		return (empty($_GET['empresa']) ? $host[0] : $_GET['empresa']);
	}

}
