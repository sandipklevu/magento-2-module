<?php

namespace Klevu\SyncCustomProductType\Plugin\Product;

use Klevu\Search\Model\Product\ProductIndividual;

class ProductIndividualPlugin
{
    /**
     * Adding custom product type
     *
     * @param ProductIndividual $config
     * @param [] \Klevu\Search\Model\Product\ProductIndividual $config
     * @return array
     */
    public function afterGetProductIndividualTypeArray(ProductIndividual $config, $types)
    {
        /**
         * Replace `rental` with your own product type
         */
        $types[] = "rental";
        return $types;
    }
}
