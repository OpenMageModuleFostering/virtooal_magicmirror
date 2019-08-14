<?php
class Virtooal_MagicMirror_Model_Language{
    protected $_options;
	
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options = array(
				array(
				   'value'=>'en',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('English'),
				),
				array(
				   'value'=>'de',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('Deutch'),
				),
				array(
				   'value'=>'fr',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('French'),
				),
				array(
				   'value'=>'pl',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('Polish'),
				),
				array(
				   'value'=>'hu',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('Hungarian'),
				),
				array(
				   'value'=>'cz',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('Czech'),
				),
				array(
				   'value'=>'sk',
				   'label'=>Mage::helper('virtooal_magicmirror')->__('Slovak'),
				),
				
				
			);
		}
		return $this->_options;
	}
}
