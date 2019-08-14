<?php
class Virtooal_MagicMirror_Block_Adminhtml_Catalog_Product_Tab 
    extends Mage_Adminhtml_Block_Template
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    /**
     * Set the template for the block
     */
    public function _construct()
    {
        parent::_construct();
       	$this->setTemplate('catalog/product/tab/magicmirror.phtml');
    }

    /**
     * Retrieve currently edited product object
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        return Mage::registry('current_product');
    }
	
	public function getWidgetParameters()
	{
		$resource = Mage::getSingleton('core/resource');

		/**
		 * Retrieve the read connection
		 */
		$readConnection = $resource->getConnection('core_read');

		/**
		 * Retrieve our table name
		 */
		$prefix = Mage::getConfig()->getTablePrefix();

		$query = $readConnection->query("SELECT * FROM ".$prefix."widget_instance WHERE instance_type='magicmirror/magicmirror' ORDER BY instance_id desc");
		
		$row = $query->fetch();
		if(!$row){
			return null;
		}
		return unserialize($row['widget_parameters']);
	}
	
    /**
     * Retrieve the label used for the tab relating to this block
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('Add Magic Mirror');
    }

    /**
     * Retrieve the title used by this tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('Add Magic Mirror');
    }

    /**
     * Determines whether to display the tab
     * Add logic here to decide whether you want the tab to display
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Stops the tab being hidden
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }
}