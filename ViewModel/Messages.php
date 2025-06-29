<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Ronangr1\FlashMessages\Api\FlashInterface;

class Messages implements ArgumentInterface
{

    public function __construct(
        private readonly FlashInterface $flash,
    )
    {
    }

    public function getFlash(): ?array
    {
        $message = $this->flash->get();
        return $message ?? [];
    }

    public function getConfigData(): array
    {
        return [
            'autoHide' => true,
            'delay' => 2500,
        ];
    }
}
