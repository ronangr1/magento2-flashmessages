<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Handler;

use Magento\Framework\Phrase;

class Message
{
    public function getText(Phrase $phrase): string
    {
        $reflection = new \ReflectionClass($phrase);
        $property = $reflection->getProperty('text');
        return $property->getValue($phrase);
    }
}
