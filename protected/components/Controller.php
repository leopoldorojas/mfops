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
		// Obtener el identificador de la compañía:
		// Busco en el dominio (ya sea como subdirectorio o como TLD)
		// Cuando ya lo tengo, voy a la tabla de compañías y saco el ID
		// Si no tengo el dominio vía subdirectorio o ID (porque aún no estoy en esa estrategia sino solo en el Login, por ahora), entonces:
		// Entonces uso Yii.app.user para buscar su compañía asociada y la obtengo de ahí.
		// Si no existe el Yii.app.user enotnces pongo el default desde Yii-params

		if (!($company = getCompanyFromURL())
			$this->company_id = Company::model()->findByAttributes(array('identifier' => $company));

		if (empty($this->company_id) && !empty(Yii::app()->user->id))
			$this->company_id = Company::model()->findByAttributes(array('id' => Yii::app()->user->id));

		if (empty($this->company_id))
			$this->company_id = Yii::app()->params['companyInfo']['id'];

	    $filterChain->run();
	}

	public function getCompanyFromURL()
	{
		return = 2;
	}

}
