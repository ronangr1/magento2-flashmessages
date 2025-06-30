<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Service;

use Ronangr1\FlashMessages\Model\FlashMessagesConfig;

class Config
{
    public function __construct(
        private readonly FlashMessagesConfig $flashMessages,
    )
    {
    }

    public function getConfig(): array
    {
        return [
            'is_active' => $this->flashMessages->isActive(),
            'autoHide' => $this->flashMessages->getAutoHide(),
            'delay' => $this->flashMessages->getDelay(),
            'position' => $this->flashMessages->getPosition(),
        ];
    }
}
