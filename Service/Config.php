<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Service;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    )
    {
    }

    public function getConfig(): array
    {
        return [
            'is_active' => $this->scopeConfig->isSetFlag('flash_messages/general/is_active'),
            'autoHide' => $this->scopeConfig->isSetFlag('flash_messages/settings/auto_hide'),
            'delay' => $this->scopeConfig->getValue('flash_messages/settings/delay') ?: 5000,
        ];
    }
}
