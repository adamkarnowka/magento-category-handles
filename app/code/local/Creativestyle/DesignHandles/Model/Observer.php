<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 03.04.15
 * Time: 14:14
 */

class Creativestyle_DesignHandles_Model_Observer {

    public function addCategoryLayerLayoutHandle(Varien_Event_Observer $observer)
    {
        $category = Mage::registry('current_category');
        $product = Mage::registry('current_product');

        if ($category && !$product) {
            /* @var $update Mage_Core_Model_Layout_Update */
            $update = $observer->getEvent()->getLayout()->getUpdate();
            $customLayout = $category->getPageLayout();
            if(!empty($customLayout)){
                $update->addHandle(Mage::getStoreConfig('designhandles/settings/prefix').$customLayout);
            } else {
                $update->addHandle(Mage::getStoreConfig('designhandles/settings/prefix').'_default_layout');
            }

        }
    }
}