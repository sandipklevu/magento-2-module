<?php

declare(strict_types=1);

namespace Klevu\StopProductQueue\Cron;

use Klevu\Logger\Constants as LoggerConstants;
use Klevu\Search\Helper\Data as KlevuHelperData;
use Klevu\Search\Model\Product\MagentoProductActionsInterface;

class Records
{
    private $magentoProductActions;
    private $klevuHelperData;

    public function __construct(
        MagentoProductActionsInterface $magentoProductActions,
        KlevuHelperData $klevuHelperData,
    ) {
        $this->magentoProductActions = $magentoProductActions;
        $this->klevuHelperData = $klevuHelperData;
    }

    public function execute()
    {
        try {
            $this->magentoProductActions->markAllProductsForUpdate();
        } catch (\Exception $e) {
            $this->klevuHelperData->log(
                LoggerConstants::ZEND_LOG_DEBUG,
                sprintf('Error while marking all products for update : %s', $e->getMessage())
            );
        }
    }
}

