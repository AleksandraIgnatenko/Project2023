<?php
class DB_Employee extends Zend_Db_Table {
    
    protected $_name = 'employees';
    protected $_primary = 'id';
    
    public function getData() {
        
        $select = $this->select()->from(array('e' => $this->_name), array(
            'e_id' => 'e.id',
            'name' => "CONCAT(e.first_name, ' ', e.second_name, ' ', e.surname)"
        ));
        
        $select->setIntegrityCheck(false);
        //print_r($select->assemble());die;
        $result = $this->fetchAll($select)->toArray();       
        
        return $result;
        
    }   
    
     
}

