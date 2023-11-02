<?php

class DB_Test extends Zend_Db_Table {
    
    protected $_name = 'test';
    protected $_primary = 'id';


    public function init() {
//       Zend_Debug::dump('123');
    }
    
//    public function getData() {
//        $select = $this->select()->from(array('t' => $this->_name), array(
//            'id',
//            'first_name',
//            'second_name',
//            'surname',
//            'email',
//            'phone',
//            'employee_id'
//        ));
//        
//        $select->joinLeft(['e' => 'employees'],'e.id = t.employee_id', ['fio' => 'CONCAT(e.first_name," ", e.second_name," ", e.surname)']);
//        $select->setIntegrityCheck(false);
//        //print_r($select->assemble());die;
//        $result = $this->fetchAll($select)->toArray();       
//        
//        return $result;
//        
//    }
    public function getData() {
        $select = $this->select()->from(array('t' => $this->_name), array(
            'id',
            'first_name',
            'second_name',
            'surname',
            'email',
            'phone',
            'employee_id',
            'birthday',
            'education',
            'level',
            'gender',
            'nationality',
            'place',
            'passport_type',
            'document_series',
            'passport_number',
            'when_issued',
            'who_issued',
            'place_issued',
            'snils',
            'lack_snils',
            'home_phone_number',
            'phone_number'
        ));
        
        $select->joinLeft(['e' => 'employees'],'e.id = t.employee_id', ['fio' => 'CONCAT(e.first_name," ", e.second_name," ", e.surname)']);
        $select->setIntegrityCheck(false);
        //print_r($select->assemble());die;
        $result = $this->fetchAll($select)->toArray();       
        
        return $result;
        
    }
    
    public function insertData($param) {
        $data = array( 'first_name' => $param['first_name'],
                    'second_name' => $param['second_name'],
                    'surname' => $param['surname'],
		    'phone' => $param['phone'],
		    'email' => $param['email'],
                    'birthday' => $param['birthday'],
            'education' => $param['education'],
            'level'  => $param['level'],
            'gender'  => $param['gender'],
            'nationality' => $param['nationality'],
            'place'  => $param['place'],
            'passport_type'  => $param['passport_type'],
            'document_series' => $param['document_series'],
            'passport_number' => $param['passport_number'],
            'when_issued' => $param['when_issued'],
            'who_issued' => $param['second_name'],
            'place_issued' => $param['who_issued'],
            'snils' => $param['snils'],
            'lack_snils' => $param['lack_snils'],
            'home_phone_number' => $param['home_phone_number'],
            'phone_number'  => $param['phone_number']);
        
        $this->insert($data);
    }
    
    public function deleteData($param){
        $where = array('id = ?' => $param['id']);
        $this->delete($where);
    }
    
    public function distData($param) {
        $data = array('employee_id' => $param['emp_id']);
        $count = $param['count'];
        
        
       $adapter = Zend_Db_Table_Abstract::getDefaultAdapter();
       $adapter->query('UPDATE test SET employee_id = '.$param['emp_id'].
               ' WHERE employee_id IS NULL LIMIT '.$count);
      
                      
    }
        
}

