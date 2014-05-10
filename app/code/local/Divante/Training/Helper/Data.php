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

    /**
     * @return array
     */
    public function getProductSkusArray()
    {
        $products = array();

        $products['HTC Touch Diamond'] = 'HTC Touch Diamond';
        $products['micronmouse5000'] = 'Microsoft Wireless Optical Mouse 5000';
        $products['mycomputer'] = 1;
        $products['computer_fixed'] = 1;
        $products['computer'] = 1;
        $products['micronmouse5000'] = 1;
        $products['logidinovo'] = 1;
        $products['logitechcord'] = 1;
        $products['microsoftnatural'] = 1;
        $products['VGN-TXN27N/BW'] = 1;
        $products['M9179LL'] = 1;
        $products['W1952TQ-TF'] = 1;
        $products['250gb5400'] = 1;
        $products['500gb5400'] = 1;
        $products['intelcore2extreme'] = 1;
        $products['W2452T-TF'] = 1;
        $products['intelc2d'] = 1;
        $products['500gb7200'] = 1;
        $products['1tb7200'] = 1;
        $products['amda64'] = 1;
        $products['226bw'] = 1;
        $products['3yr_p_l'] = 1;
        $products['amdphenom'] = 1;
        $products['2yr_p_l'] = 1;
        $products['512dimm'] = 1;
        $products['1yr_p_l'] = 1;
        $products['1gbdimm'] = 1;
        $products['2gbdimm'] = 1;
        $products['nzxtlexa'] = 1;
        $products['apevia-black'] = 1;
        $products['zol_b_med'] = 1;
        $products['ana'] = 1;
        $products['ac-66332'] = 1;
        $products['ac9003'] = 1;
        $products['ac674'] = 1;
        $products['zol_g_lrg'] = 1;
        $products['zol_r_lrg'] = 1;
        $products['zol_g_med'] = 1;
        $products['zol_r_med'] = 1;
        $products['zol_g_sm'] = 1;
        $products['zol'] = 1;
        $products['oc_lrg'] = 1;
        $products['oc_med'] = 1;
        $products['oc'] = 1;
        $products['ink_lrg'] = 1;
        $products['ink_med'] = 1;
        $products['ink'] = 1;
        $products['coal_1'] = 1;
        $products['coal_lrg'] = 1;
        $products['coal_md'] = 1;
        $products['ecco_6'] = 1;
        $products['ecco_5'] = 1;
        $products['ecco_4'] = 1;
        $products['ecco'] = 1;
        $products['nine_6'] = 1;
        $products['nine_5'] = 1;
        $products['nine_4'] = 1;
        $products['nine'] = 1;
        $products['steve_8'] = 1;
        $products['steve_7'] = 1;
        $products['steve_6'] = 1;
        $products['steve_5'] = 1;
        $products['steve'] = 1;
        $products['ken_12'] = 1;
        $products['ken_11'] = 1;
        $products['ken_10'] = 1;
        $products['ken_9'] = 1;
        $products['ken'] = 1;
        $products['asc_12'] = 1;
        $products['asc_11'] = 1;
        $products['asc_10'] = 1;
        $products['asc_9'] = 1;
        $products['asc'] = 1;
        $products['cn_m12'] = 1;
        $products['cn_m11'] = 1;
        $products['cn_m10'] = 1;
        $products['cn_m9'] = 1;
        $products['cn_m8'] = 1;
        $products['cn_7'] = 1;
        $products['cn_6'] = 1;
        $products['cn_5'] = 1;
        $products['cn_4'] = 1;
        $products['cn'] = 1;
        $products['ana_8'] = 1;
        $products['ana_7'] = 1;
        $products['ana_6'] = 1;
        $products['ana_5'] = 1;
        $products['ana_4'] = 1;
        $products['ana_3'] = 1;
        $products['1114'] = 1;
        $products['1113'] = 1;
        $products['1112'] = 1;
        $products['1111'] = 1;
        $products['ana_9'] = 1;
        $products['C530'] = 1;
        $products['A630'] = 1;
        $products['750'] = 1;
        $products['QC-2185'] = 1;
        $products['Rebel XT'] = 1;
        $products['bar1234'] = 1;
        $products['384822'] = 1;
        $products['4fasd5f5'] = 1;
        $products['zol_r_sm'] = 1;
        $products['oc_sm'] = 1;
        $products['ink_sm'] = 1;
        $products['coal_sm'] = 1;
        $products['ken_8'] = 1;
        $products['ecco_3'] = 1;
        $products['nine_3'] = 1;
        $products['steve_4'] = 1;
        $products['asc_8'] = 1;
        $products['cn_3'] = 1;
        $products['M285-E'] = 1;
        $products['VGN-TXN27N/B'] = 1;
        $products['LX.FR206.001'] = 1;
        $products['MA464LL/A'] = 1;
        $products['MM-A900M'] = 1;
        $products['8525PDA'] = 1;
        $products['sw810i'] = 1;
        $products['bb8100'] = 1;
        $products['n2610'] = 1;

        return $products;
    }
}