<?php
/**
 * Copyright © Klevu Oy. All rights reserved. See LICENSE.txt for license details.
 */

declare(strict_types=1);

namespace Klevu\StopProductQueue\Setup;

use Magento\Framework\Mview\View;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UnSubscribe implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * @var \Magento\Framework\Indexer\IndexerRegistry
     */
    private $indexerRegistry;
    /**
     * @var \Magento\Framework\Mview\ViewInterfaceFactory
     */
    private $viewFactory;

    /**
     * @param \Magento\Framework\Indexer\IndexerRegistry $indexerRegistry
     * @param \Magento\Framework\Mview\ViewInterfaceFactory $viewFactory
     */
    public function __construct(
        \Magento\Framework\Indexer\IndexerRegistry $indexerRegistry,
        \Magento\Framework\Mview\ViewInterfaceFactory $viewFactory
    ) {
        $this->indexerRegistry = $indexerRegistry;
        $this->viewFactory = $viewFactory;
    }

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $indexerId = 'klevu_product_sync';
            try {
                $indexer = $this->indexerRegistry->get($indexerId);
                $indexer->setScheduled(false);
            } catch (\Exception $e) {
                //ignore if indexers were removed
            }
            try {
                /** @var View $view */
                $view = $this->viewFactory->create();
                $view->load($indexerId);
                $view->unsubscribe();
            } catch (\Exception $e) {
                //ignore if mview were removed
            }
        }
        foreach (['klevu_product_sync_cl'] as $table) {
            $setup->getConnection()->dropTable($setup->getTable($table));
        }
    }
}
