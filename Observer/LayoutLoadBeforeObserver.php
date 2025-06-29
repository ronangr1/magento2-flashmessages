<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Ronangr1\FlashMessages\Service\Config;

class LayoutLoadBeforeObserver implements ObserverInterface
{
    public function __construct(
        private readonly Config $config
    )
    {
    }

    public function execute(Observer $observer): Observer
    {
        $config = $this->config->getConfig();

        if ($config['is_active']) {
            $layout = $observer->getEvent()->getLayout();
            $layout->unsetElement('page.messages');
        }

        return $observer;
    }
}
