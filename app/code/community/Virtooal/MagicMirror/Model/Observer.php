<?php
 
class Virtooal_MagicMirror_Model_Observer
{
    public function insertBlock($observer)
    {
        /** @var $_block Mage_Core_Block_Abstract */
        /*Get block instance*/
        $_block = $observer->getBlock();
        /*get Block type*/
        $_type = $_block->getType();
        /*get Block name*/
        $_name = $_block->getNameInLayout();
       /*Check block type*/
       $position = Mage::getStoreConfig('magicmirror_options/magicmirror_settings/magicmirror_position');
       $enable = Mage::getStoreConfig('magicmirror_options/magicmirror_settings/magicmirror_enable');
	   
	   $position = explode('-',$position);
        if ($enable==1 
         && $_type == 'catalog/'.$position[0] 
         && (!isset($position[1]) || (isset($position[1]) && $_name == $position[1]))) 
        {
    		/*Clone block instance*/
            $_child = clone $_block;
            /*set another type for block*/
            $_child->setType('magicmirror/block');
            /*set child for block*/
            $_block->setChild('child', $_child);
            /*set our template*/
            $_block->setTemplate('magicmirror/magicmirror.phtml');
    	}
    }
}