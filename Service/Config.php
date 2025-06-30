<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Service;

use Magento\Framework\App\Area;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\State;
use Psr\Log\LoggerInterface;

class Config
{
    private const CONFIG_PATH_FRONTEND = 'flash_messages/general/is_active_frontend';
    private const CONFIG_PATH_ADMIN = 'flash_messages/general/is_active_admin';

    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
        private readonly State $state,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function getConfig(): array
    {
        $isActive = false;
        try {
            $areaCode = $this->state->getAreaCode();
            $isActive = match ($areaCode) {
                Area::AREA_FRONTEND => $this->scopeConfig->isSetFlag(self::CONFIG_PATH_FRONTEND),
                Area::AREA_ADMINHTML => $this->scopeConfig->isSetFlag(self::CONFIG_PATH_ADMIN),
            };
        } catch (\Exception $e) {
            $this->logger->debug($e->getMessage());
        }

        return [
            'is_active' => $isActive,
            'autoHide' => $this->scopeConfig->isSetFlag('flash_messages/settings/auto_hide'),
            'delay' => $this->scopeConfig->getValue('flash_messages/settings/delay') ?: 5000,
            'position' => $this->scopeConfig->getValue('flash_messages/settings/position') ?: 'top-right',
        ];
    }
}
