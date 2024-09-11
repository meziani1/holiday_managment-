<?php
class User extends AppModel{
 public $name="User"  ;

 public $validate = array(
    'role' => array(
        'rule' => array('inList', array(1, 2, 3)),
        'message' => 'Please select a valid role'
    )
);


 public function beforeSave($options = array())
 {
     // Check if the password field is being set
     if (isset($this->data[$this->alias]['password'])) {
         // Hash the password before saving
         $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
     }

     return true;
 }
 
}
?>