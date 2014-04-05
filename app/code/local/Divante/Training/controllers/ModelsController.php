<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Divante_Training_ModelsController extends Mage_Core_Controller_Front_Action
{
    public function oneAction()
    {
        $sku = 'HTC Touch Diamond';

        /** @var Mage_Catalog_Model_Product $product */
//        $product = Mage::getModel('catalog/product')->load(166);
//        var_dump($product->getData());


        /** @var Mage_Catalog_Model_Product $product */
//        $product = Mage::getModel('catalog/product')->loadByAttribute('sku', $sku, array('name', 'description'));
//        var_dump($product->getData());


        $productId = Mage::getModel('catalog/product')->getIdBySku($sku);
    }

    public function twoAction()
    {
        $collection->count();   // todo - dokonczyc

        count($collection);




        $collection->getSize();
    }

}
