<?php

namespace Klevu\PreserveLayoutFix\Plugin\ViewModel\Navigation;

use Magento\Catalog\Block\Product\ProductList\Toolbar as ToolbarBlock;
use Magento\Framework\View\LayoutInterface;
use \Amasty\Shopby\ViewModel\Navigation\Toolbar as SubjectToolbar;

class Toolbar
{
    public function afterResolveSearchLayoutToolbar(
        SubjectToolbar $subject,
        $result,
        LayoutInterface $layout)
    {
        try {
            if (!$layout->getBlock('search.result')) {
                return;
            }
            $toolbarBlock = $layout->getBlock('product_list_toolbar');
            if ($toolbarBlock && $toolbarBlock instanceof ToolbarBlock) {

                $orders = $toolbarBlock->getAvailableOrders();
                unset($orders['position']);
                //$orders['relevance'] = __('Relevance');
                $orders['personalized'] = __('personalized');
                $toolbarBlock->setAvailableOrders(
                    $orders
                )->setDefaultDirection(
                    'desc'
                )->setDefaultOrder(
                    'personalized'
                );

            }
        } catch (\Exception $e) {
            return $result;
        }
        return $result;
    }
}
