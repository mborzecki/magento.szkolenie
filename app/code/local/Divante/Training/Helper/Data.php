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

    /**
     * @param array $skus
     * @return mixed
     */
    public function getProductIdsBySkus(array $skus)
    {
        /** @var Varien_Db_Adapter_Pdo_Mysql $adapter */
        $adapter = Mage::getSingleton('core/resource')->getConnection('core_read');

        /** @var Mage_Catalog_Model_Resource_Product_Collection $collection */
        $collection = Mage::getModel('catalog/product')->getCollection();

        /** @var string $select */
        $select = $collection->addFieldToFilter('sku', array('in' => $skus))
            ->getSelect()->reset(Zend_Db_Select::COLUMNS)->columns(array('sku','entity_id'))->assemble();

        return $adapter->fetchPairs($select);
    }
}