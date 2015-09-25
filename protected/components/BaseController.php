<?php
/**
 * BaseController.php
 *
 * Date: 11/15/12
 * Time: 22:46 PM
 *
 * This controllers makes possible for controllers that extend from it to inherit
 * actions from behaviors
 *
 * Idea by Yii user Mimin and  Kevin Higgins
 * @link http://www.yiiframework.com/forum/index.php/user/9488-mimin/
 * @link http://www.yiiframework.com/forum/index.php/user/24587-kevin-higgins/
 * Relevant discussion in Yii Forum
 * @link http://www.yiiframework.com/forum/index.php/topic/10652-actions-by-behavioring/
 *
 */
class BaseController extends CController
{

    private $_behaviorIDs = array();


    public function  init()
    {
        parent::init();
		
		/*
		$Settings = Settings::model()->findAll('param=:param', array('param' => 'home_page')); 
		$SettingsA = Settings::model()->find('param=:param', array('param' => 'article_page'));
		$SettingsB = Settings::model()->find('param=:param', array('param' => 'slider_on_off'));
		Yii::app()->session['home_page_id'] = $Settings->val;
		Yii::app()->session['article_page_id'] = $SettingsA->val
		Yii::app()->session['slider_on_off'] = $SettingsB->val;
		*/
		
     // Get settings from database
	 //http://stackoverflow.com/questions/27778477/how-to-make-custom-settings-data-available-globally-in-yii-2 idea from
     /*   $sql = $this->db->createCommand("SELECT param,val FROM tbl_settings");
        $settings = $sql->queryAll();

        // Now let's load the settings into the global params array

        foreach ($settings as $key => $val) {
            Yii::$app->params['settings'][$val['setting_name']] = $val['setting_value'];
        }
		*/
	}

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/col2';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function createAction($actionID)
    {
        $action = parent::createAction($actionID);
        if ($action !== null)
            return $action;
        foreach ($this->_behaviorIDs as $behaviorID) {
            $object = $this->asa($behaviorID);
            if ($object->getEnabled() && method_exists($object, 'action' . $actionID))
                return new CInlineAction($object, $actionID);
        }
    }

    public function attachBehavior($name, $behavior)
    {
        $this->_behaviorIDs[] = $name;
        parent::attachBehavior($name, $behavior);
    }


}