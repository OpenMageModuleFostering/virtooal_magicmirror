<?php
class Virtooal_MagicMirror_Model_Position{
    protected $_options;
	const POSITION_UNDERIMAGE = 'product_view_media';
    const POSITION_UNDERCART  = 'product_view-product.info.addtocart';
    const POSITION_UNDERADDTO  = 'product_view-product.info.addto';
    
    public function toOptionArray(){
        if (!$this->_options) {
			$this->_options[] = array(
			   'value'=>self::POSITION_UNDERIMAGE,
			   'label'=>Mage::helper('virtooal_magicmirror')->__('Under product pictures')
			);
			$this->_options[] = array(
			   'value'=>self::POSITION_UNDERCART,
			   'label'=>Mage::helper('virtooal_magicmirror')->__('Under product "add to cart" button')
			);
			$this->_options[] = array(
			   'value'=>self::POSITION_UNDERADDTO,
			   'label'=>Mage::helper('virtooal_magicmirror')->__('Under "add to" links')
			);
		}
		return $this->_options;
	}
}
