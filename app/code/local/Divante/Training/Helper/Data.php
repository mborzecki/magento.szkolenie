<?php
/**
 * Created by PhpStorm.
 * User: divante
 * Date: 3/24/14
 * Time: 9:01 PM
 */ 
class Divante_Training_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @param array $productIds
     * @return bool
     */
    public function sqlQueriesInsideLoop($productIds)
    {
        foreach ($productIds AS $productId) {
            /** @var Mage_Catalog_Model_Product $product */
            $product = Mage::getModel('catalog/product')->load($productId);
            $this->_showProductName($product);
        }
        return true;
    }

    public function productCollection($productIds)
    {
        /** @var Mage_Catalog_Model_Resource_Product_Collection $productCollection */
        $productCollection = Mage::getModel('catalog/product')->getCollection()
                ->addFieldToFilter('entity_id', array($productIds))
                ->addAttributeToSelect('name');

        foreach ($productCollection AS $product) {
            /** @var Mage_Catalog_Model_Product $product */
            $this->_showProductName($product);
        }
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     */
    protected function _showProductName(Mage_Catalog_Model_Product $product)
    {
        if ($product->getId()) {
            echo $product->getName() . '<br>';
        }
    }
}