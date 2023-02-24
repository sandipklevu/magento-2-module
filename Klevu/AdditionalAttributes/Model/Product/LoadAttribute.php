<?php

namespace Klevu\AdditionalAttributes\Model\Product;

use Klevu\Search\Api\Provider\Sync\ReservedAttributeCodesProviderInterface;
use Klevu\Search\Api\Service\Catalog\Product\StockServiceInterface;
use Klevu\Search\Model\Context as KlevuContext;
use Klevu\Search\Model\Klevu\KlevuFactory;
use Klevu\Search\Model\Product\LoadAttribute as OriginalLoadAttribute;
use Klevu\Search\Model\Product\ProductInterface as KlevuProductData;
use Magento\Catalog\Api\Data\ProductInterface as MagentoProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\Attribute\Collection as ProductAttributeCollection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;


class LoadAttribute extends OriginalLoadAttribute
{
    /**
     * @param KlevuContext $context
     * @param KlevuProductData $productData
     * @param ProductAttributeCollection $productAttributeCollection
     * @param KlevuFactory $klevuFactory
     * @param StockServiceInterface $stockService
     * @param ProductCollectionFactory $productCollectionFactory
     * @param ReservedAttributeCodesProviderInterface $reservedAttributeCodesProvider
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        KlevuContext                            $context,
        KlevuProductData                        $productData,
        ProductAttributeCollection              $productAttributeCollection,
        KlevuFactory                            $klevuFactory,
        // depending on the version of the Klevu module classes from here may need to be removed
        StockServiceInterface                   $stockService = null,
        ProductCollectionFactory                $productCollectionFactory = null,
        ReservedAttributeCodesProviderInterface $reservedAttributeCodesProvider = null,
        ProductRepositoryInterface              $productRepository = null
    )
    {
        parent::__construct(
            $context,
            $productData,
            $productAttributeCollection,
            $klevuFactory,
            $stockService,
            $productCollectionFactory,
            $reservedAttributeCodesProvider,
            $productRepository
        );
    }

    /**
     * Process product data if want to add any extra information from third party module
     *
     * @param array $product
     * @param MagentoProductInterface|null $parent
     * @param MagentoProductInterface $item
     *
     * @return OriginalLoadAttribute
     */
    public function processProductAfter(&$product, &$parent, &$item)
    {
        //Refer XML generated in the Klevu_Search.<storecode>.log
        /**
         * Klevu module already indexes otherAttributeToIndex in array
         * <pair><key>otherAttributeToIndex</key>
         * <value>custom_brand:Custom Brand:Samsung;some_new_attribute:some_new_attribute:A Value </value> </pair>
         */
        $product['otherAttributeToIndex']['some_new_attribute'] = 'A Value';

        /**
         * Below attributes will be part of
         * <pair><key>imageHover</key><value>https://website.com/somehoverurl.png</value></pair>
         * <pair><key>stock_promotional_label</key><value>On Sale</value></pair>
         */
        $product['imageHover'] = "https://website.com/somehoverurl.png";

        $product['stock_promotional_label'] = "On Sale";

        return $this;
    }
}
