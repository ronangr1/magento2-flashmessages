<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Handler;

use Magento\Framework\Message\Error;
use Magento\Framework\Message\Notice;
use Magento\Framework\Message\Success;
use Magento\Framework\Message\Warning;
use Magento\Framework\Phrase;

class Message
{
    public function getText(Phrase|Success|Error|Warning|Notice|string $phrase): string|Phrase
    {
        return $this->getValue($phrase, 'text') ?? '';
    }

    public function getIdentifier($message): string
    {
        return $this->getValue($message, 'identifier') ?? '';
    }

    public function getData($object): array
    {
        return $this->getValue($object, 'data') ?? [];
    }

    private function getValue($class, string $property)
    {
        if(is_string($class) && !method_exists($class, $property)) {
            return null;
        }

        $reflection = new \ReflectionClass($class);
        $property = $reflection->getProperty($property);
        return $property->getValue($class);
    }
}
