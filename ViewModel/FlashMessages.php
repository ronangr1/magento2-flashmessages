<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Ronangr1\FlashMessages\Api\FlashMessagesInterface;
use Ronangr1\FlashMessages\Service\Config;

class FlashMessages implements ArgumentInterface
{
    private array $messages = [];

    public function __construct(
        private readonly FlashMessagesInterface $flash,
        private readonly Config                 $config
    )
    {
    }

    public function getMessagesData(): ?array
    {
        if(!$this->messages) {
            $this->messages[] = $this->flash->getFlash();
        }

        return $this->messages;
    }

    public function getConfigData(): array
    {
        $config = $this->config->getConfig();

        return [
            'autoHide' => $config['autoHide'],
            'delay' => $config['delay'],
            'position' => $config['position'],
        ];
    }
}
