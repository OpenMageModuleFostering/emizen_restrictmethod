<?php

class Emizen_Restrictmethod_Model_Methods{
    
	//protected $_options;
    
    public function toOptionArray()
    {
       
			 $payments = Mage::getSingleton('payment/config')->getAllMethods();
 
	   		$methods = array(array('value'=>'', 'label'=>Mage::helper('adminhtml')->__('--Please Select--')));
			
			foreach ($payments as $paymentCode=>$paymentModel) {
            $paymentTitle = Mage::getStoreConfig('payment/'.$paymentCode.'/title');
			$methods[$paymentCode] = array(
					'label'   => $paymentTitle,
					'value' => $paymentCode,
				);
			}
			
	
        return $methods;
    }
}
