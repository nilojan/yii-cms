<?php
//http://stackoverflow.com/questions/11137462/yii-manage-configuration-from-database
class Config extends CApplicationComponent
{
	
    public $cache = 0;
    public $dependency = null;

    protected $data = array();

    public function init()
    {

        $items=Settings::model()->findAll();

		//$items = Settings::find()->all();
		
        foreach ($items as $key=>$item)
        {
            if ($item['param'])
                $this->data[$item['param']] = $item['val'];
        }
        parent::init();
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->data))
            return $this->data[$key];
        else
            //throw new CException('Undefined parameter ' . $key);
            return '';
    }
/*
    public function set($key, $value)
    {
        $model = Settings::model()->findByAttributes(array('param'=>$key));
        if (!$model)
            throw new CException('Undefined parameter ' . $key);

        $model->value = $value;

        if ($model->save())
            $this->data[$key] = $value;

    }

    public function add($params)
    {
        if (isset($params[0]) && is_array($params[0]))
        {
            foreach ($params as $item)
                $this->createParameter($item);
        }
        elseif ($params)
            $this->createParameter($params);
    }

    public function delete($key)
    {
        if (is_array($key))
        {
            foreach ($key as $item)
                $this->removeParameter($item);
        }
        elseif ($key)
            $this->removeParameter($key);
    }

    protected function getDbConnection()
    {
        if ($this->cache)
            $db = Yii::app()->db->cache($this->cache, $this->dependency);
        else
            $db = Yii::app()->db;

        return $db;
    }

    protected function createParameter($param)
    {
        if (!empty($param['param']))
        {
            $model = Settings::model()->findByAttributes(array('param' => $param['param']));
            if ($model === null)
                $model = new Settings();

            $model->param = $param['param'];
            //$model->label = isset($param['label']) ? $param['label'] : $param['param'];
            $model->value = isset($param['val']) ? $param['val'] : '';
           // $model->default = isset($param['default']) ? $param['default'] : '';
          //  $model->type = isset($param['type']) ? $param['type'] : 'string';

            $model->save();
        }
    }

    protected function removeParameter($key)
    {
        if (!empty($key))
        {
            $model = Settings::model()->findByAttributes(array('param'=>$key));
            if ($model)
                $model->delete();
        }
    }
	
	*/
}