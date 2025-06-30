<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Model;

use Magento\Framework\App\Area;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\State;
use Psr\Log\LoggerInterface;

class FlashMessagesConfig
{
    private const XML_PATH_IS_ACTIVE_FRONTEND = 'flash_messages/general/is_active_frontend';
    private const XML_PATH_IS_ACTIVE_ADMIN = 'flash_messages/general/is_active_admin';

    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
        private readonly State $state,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function isActive(): bool
    {
        try {
            $areaCode = $this->state->getAreaCode();
            return match ($areaCode) {
                Area::AREA_FRONTEND => $this->scopeConfig->isSetFlag(self::XML_PATH_IS_ACTIVE_FRONTEND),
                Area::AREA_ADMINHTML => $this->scopeConfig->isSetFlag(self::XML_PATH_IS_ACTIVE_ADMIN),
            };
        } catch (\Exception $e) {
            $this->logger->debug($e->getMessage());
        }

        return false;
    }

    public function getDelay(): int|string
    {
        return $this->scopeConfig->getValue('flash_messages/settings/delay') ?: 5000;
    }

    public function getAutoHide(): bool
    {
        return $this->scopeConfig->isSetFlag('flash_messages/settings/auto_hide');
    }

    public function getPosition(): string
    {
        return $this->scopeConfig->getValue('flash_messages/settings/position') ?: 'top-right';
    }
}
