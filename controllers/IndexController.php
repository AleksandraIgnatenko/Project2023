<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        Zend_Loader::loadClass('DB_Test');
        $model = new DB_Test();
        
        $data =  $model->getData();
        
        $this->view->data = $data;
        
    }
    
    public function newAction()
    {
        Zend_Loader::loadClass('DB_Test');
        $model = new DB_Test();
        $data =  $model->getData();    
        
        $param = $this->_getAllParams();
        
        Zend_Debug::dump($param);die;

       
        $this->view->data = $data;
        
    }

    public function testAction()
    {
        //die;
        
        //print_r($data);
        //die;
    }
    
     public function testingAction()
    {
        $param = $this->_getAllParams();
        Zend_Debug::dump($param);die;
    }
    
    public function insertUserDataAction() {
        Zend_Loader::loadClass('DB_Test');
        $param = $this->_getAllParams();
        $model = new DB_Test();
        $data =  $model->insertData($param);  
        die(json_encode($data));
    }
    
    public function deleteUserDataAction() {
        Zend_Loader::loadClass('DB_Test');
        $param = $this->_getAllParams();
        $model = new DB_Test();
        $data =  $model->deleteData($param);
        die(json_encode($data));
    }
  
    public function getDataAction() {
        Zend_Loader::loadClass('DB_Test');

        $model = new DB_Test();
        $data =  $model->getData();
        
  
        $string = Zend_Json::encode($data);
        echo '{"success": "true", "dataa":'.$string.'}';
        die;
    }
    
    public function getEmployeeDataAction() {
        Zend_Loader::loadClass('DB_Employee');
        $model = new DB_Employee(); 
        $data =  $model->getData();
        $string = Zend_Json::encode($data);
        echo '{"success": "true", "data":'.$string.'}';
        die;
    }
    
    public function distDataAction() {
        Zend_Loader::loadClass('DB_Test');
        $param = $this->_getAllParams();
        $model = new DB_Test(); 
        $data =  $model->distData($param);
        die;
    }
    
  
}
