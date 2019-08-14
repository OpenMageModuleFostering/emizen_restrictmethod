<?php


class Emizen_Restrictmethod_Model_Observer {


    public function paymentMethod($event) {
    
		if(!Mage::getStoreConfig('restrictmethod/emizen/general')) // if not enable extension return false
      				 return;
        $method = $event->getMethodInstance();
        $result = $event->getResult();
      	$allowedMethods	=	Mage::getStoreConfig('restrictmethod/emizen/methods');
      
      	Mage::log($method->getCode(),null,'test.log');
      	
        if($method->getCode()==$allowedMethods){
            $userIpAddress = $_SERVER['REMOTE_ADDR'];
           	$ipAddress	=	Mage::getStoreConfig('restrictmethod/emizen/ipaddress');
           	Mage::log($ipAddress,null,'test.log');
           	Mage::log($userIpAddress,null,'test.log');
            if(empty($ipAddress)) {
                return;
            } else {
                $ipAddress = explode(',',$ipAddress);
                if(in_array($userIpAddress,$ipAddress)) {
                   // Mage::throwException('not allowed');
                    $result->isAvailable = true;
                }
            }
        }
	return $result;
    }

}