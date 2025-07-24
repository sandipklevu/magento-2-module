<?php

namespace Vendor\KlevuProductOverride\Plugin\Product;

use Klevu\Search\Model\Product\Product as KlevuProductModel;
use Laminas\Log\Logger;
use Laminas\Log\Writer\Stream;

class ProductPlugin
{
    /**
     * @param KlevuProductModel $subject
     * @param $parent
     * @param $item
     *
     * @return array
     */
    public function beforeGetListCategory(
        KlevuProductModel $subject,
        $parent,
        $item
    ) {
        // Log the parent and item for debugging purposes
        $this->log("Parent: " . print_r($parent, true));
        $this->log("Item: " . print_r($item, true));

        return [$parent, $item];
    }

    /**
     * @param KlevuProductModel $subject
     * @param callable $proceed
     * @param $parent
     * @param $item
     *
     * @return mixed
     */
    public function aroundGetListCategory(
        KlevuProductModel $subject,
        callable $proceed,
        $parent,
        $item
    ) {
        // Call the original method
        $result = $proceed($parent, $item);

        // Log the result for debugging purposes
        $this->log("Result: " . print_r($result, true));

        return $result;
    }

    /**
     * Override : \Klevu\Search\Model\Product\Product::getListCategory
     *
     * @param KlevuProductModel $subject
     * @param $result
     * @param $parent
     * @param $item
     *
     * @return mixed
     */
    public function afterGetListCategory(
        KlevuProductModel $subject,
        $result,
        $parent,
        $item
    ) {
        //Rewrite listCategory to include any other values i.e. customer Groups
        $this->log("Parent: " . print_r($parent, true));
        $this->log("Item: " . print_r($item, true));

        return $result;
    }

    /**
     * @param $message
     *
     * @return void
     */
    private function log($message)
    {
        $writer = new Stream(
            BP . '/var/log/VendorKlevuProductOverRide.log'
        );
        $logger = new Logger();
        $logger->addWriter($writer);
        $logger->info($message);
    }
}
