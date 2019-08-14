<?php
/**
 * Virtooal Magic Mirror HTML5 Widget
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@sostanza.it so we can send you a copy immediately.
 *
 * @category    Virtooal
 * @package     Virtooal_MagicMirror
 * @copyright   Copyright 2015 Eureco s.r.o. (http://www.virtooal.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
?>
<?php
	class Virtooal_MagicMirror_Adminhtml_MagicmirrorController extends Mage_Adminhtml_Controller_Action
	{
		private $query;

		public function indexAction()
		{
			$this->loadLayout()->_setActiveMenu('virtooal_magicmirror_tab')->_title($this->__('Create Widget'));

			$url = Mage::helper("adminhtml")->getUrl("adminhtml/system_config/edit/section/magicmirror_options/");
			$this->getResponse()->setRedirect($url);
			$this->renderLayout();
		}

		public function dashboardAction()
		{
			$this->loadLayout()->_setActiveMenu('virtooal_magicmirror_tab')->_title($this->__('Magic Mirror Admin'));
			$langcode = Mage::getStoreConfig('magicmirror_options/magicmirror_settings/magicmirror_language');
			$html = '<iframe src="https://setup.virtooal.com/'.$langcode.'/auth/index?url='.
					rawurlencode(Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB)).
					'&platform=magento" frameborder="0" width="100%" style="min-height: 1000px"></iframe>';
			$block = $this->getLayout()
						   ->createBlock('core/text', 'magicmirror-admin-block')
						   ->setText($html);
			$this->_addContent($block);

			$this->renderLayout();
		}

		public function helpAction()
		{
			$this->loadLayout()->_setActiveMenu('virtooal_magicmirror_tab')->_title($this->__('Magic Mirror Help'));

			$html = '
			<div style="width: 900px; margin: 0 auto;">
				<h1>'.$this->__('What is Magic Mirror?').'</h1>
				<div style="clear: both;">
					<div style="float: left; width: 680px;">
						<p>'.$this->__('The Magic Mirror add-ons from Virtooal allow your 
						customers to try products using their own photo. Your 
						conversions will grow and the number of complaints and 
						returns will be effectively reduced.').'</p>
						<br />
						<h2>'.$this->__('How it works').'</h2>
						
						<p><strong>'.$this->__('Setup').':</strong></p>
						<ol style="list-style-type: decimal; margin-left: 30px;">
							<li>'.$this->__('Go to Magic Mirror > Dashboard').'</li>
							<li>'.$this->__('Click on "Register & Subscribe" button').'</li>
							<li>'.$this->__('Choose the modules you want to use, choose payment type and fill in the registration form.').'</li>
							<li>'.$this->__('After subscribing and registering log in to your Magic Mirror Admin.').'</li>
							<li>'.$this->__('Set your widget\'s colors, size and language.').'</li>
							<li>'.$this->__('Copy your API key and username into Magic Mirror > Configuration').'</li>
						</ol>
						<br />
						<p><strong>Products integration'.':</strong></p>
						<ol style="list-style-type: decimal; margin-left: 30px;">
							<li>'.$this->__('Go to Catalog > Manage Products and choose one of your products').'</li>
							<li>'.$this->__('On the left side navigation click on "Add Magic Mirror"').'</li>
							<li>'.$this->__('Login to your Magic Mirror Admin if you not logged in yet.').'</li>
							<li>'.$this->__('Choose from your active moduls and setup the product.').'</li>
							
						</ol>
						
					</div>
					<div style="float: right; width: 200px;">
						<img src="//setup.virtooal.com/assets/img/logo.png" alt="Virtooal" />
					</div>
				</div>
			</div>';
			$block = $this->getLayout()
						   ->createBlock('core/text', 'magicmirror-help-block')
						   ->setText($html);
			$this->_addContent($block);

			$this->renderLayout();
		}

	}
