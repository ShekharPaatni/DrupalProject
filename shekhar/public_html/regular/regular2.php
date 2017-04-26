<?php
  class demoSleepWakeup {
    public $resourceM;
    public $arrayM;
    public function __construct() {
        $this->resourceM = fopen("demo.txt","w");
        $this->arrayM = array(1,2,3,4);`enter code here`
    }
    public function __sleep(){
        return array('arrayM');
    }
    public function __wakeup(){
    }
}
  var_dump($obj = new demoSleepWakeup());
   $serializedStr = serialize($obj);
   var_dump($obj);
   var_dump($serializedStr);
   var_dump(unserialize($serializedStr));
   ?>
