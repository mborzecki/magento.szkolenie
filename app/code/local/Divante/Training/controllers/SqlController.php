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

class Divante_Training_SqlController extends Mage_Core_Controller_Front_Action
{
    public function oneAction()
    {
        /** @var array $productIds */
        $productIds = range(16, 166);

        Mage::helper('divante_training')->sqlQueriesInsideLoop($productIds);
//        Mage::helper('divante_training')->productCollection($productIds);
    }

    public function twoAction()
    {
        /** @var array $products */
        $products = Mage::helper('divante_training')->getProductSkusArray();

        $productSkus = array_keys($products);

        /** @var Mage_Catalog_Model_Resource_Product_Collection $collection */
        $collection = Mage::getResourceModel('catalog/product_collection')
            ->addFieldToFilter('sku', array('in' => $productSkus))
            ->addAttributeToSelect(array('name'));

        foreach ($products as $prodSku => $prodName) {

            /** @var Mage_Catalog_Model_Product $product */
            $product = $collection->getItemByColumnValue('sku', $prodSku);

            // ....
        }

//        $productId = 166;
//
//        /** @var Mage_Catalog_Model_Product $product */
//        $product = $collection->getItemById($productId);
    }

    public function threeAction()
    {
        /** @var array $products */
        $products = Mage::helper('divante_training')->getProductSkusArray();

        $productSkus = array_keys($products);

        /** @var array $productIds */
        $productIds = Mage::helper('divante_training')->getProductIdsBySkus($productSkus);

        foreach ($products as $prodSku => $prodName) {

            /** @var int $productId */
            $productId = $productIds[$prodSku];
            // ....
        }
    }
}
