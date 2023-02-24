<?php

namespace Klevu\ThemeV2PowerUp\Service;

use Klevu\FrontendJs\Api\InteractiveOptionsProviderInterface;
use Klevu\FrontendJs\Api\IsEnabledConditionInterface;

class InteractiveOptionsProvider implements InteractiveOptionsProviderInterface
{
    /**
     * @var IsEnabledConditionInterface
     */
    private $isEnabledCondition;

    /**
     * @param IsEnabledConditionInterface $isEnabledCondition
     */
    public function __construct(
        IsEnabledConditionInterface $isEnabledCondition
    ) {
        $this->isEnabledCondition = $isEnabledCondition;
    }

    /**
     * @param int|null $storeId
     * @return array[]
     */
    public function execute($storeId = null)
    {
        // Ensure the configuration overrides should be sent, based on the IsEnabledCondition
        //  defined in di.xml
        if (!$this->isEnabledCondition->execute($storeId)) {
            return [];
        }

        return [
            'powerUp' => [
                // Defer quick search power up, Postpone Quick Search Power Up
                'quick' => false,
                // Defer the search results landing page power up, Postpone Landing Page Power Up
                'landing' => false,
            ]
        ];
    }
}
