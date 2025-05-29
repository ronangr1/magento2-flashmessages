<?php
/**
 * Copyright © Ronangr1, All rights reserved.
 * See LICENSE bundled with this library for license details.
 */
declare(strict_types=1);

namespace Ronangr1\FlashMessages\Plugin;

use Magento\Framework\Message\Manager as CoreMessageManager;
use Ronangr1\FlashMessages\Handler\Message as MessageHandler;
use Ronangr1\FlashMessages\Model\FlashInterface;

class MessageManager
{
    public function __construct(
        private readonly MessageHandler $handler,
        private readonly FlashInterface $flash,
    )
    {
    }

    public function afterAddSuccess(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_SUCCESS]);

        return $result;
    }

    public function afterAddSuccessMessage(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_SUCCESS]);

        return $result;
    }

    public function afterAddError(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_ERROR]);

        return $result;
    }

    public function afterAddErrorMessage(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_ERROR]);

        return $result;
    }

    public function afterAddNotice(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => 'info']);

        return $result;
    }

    public function afterAddNoticeMessage(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_INFO]);

        return $result;
    }

    public function afterAddWarning(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_WARNING]);

        return $result;
    }

    public function afterAddWarningMessage(CoreMessageManager $subject, $result, $message)
    {
        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => FlashInterface::TYPE_WARNING]);

        return $result;
    }

    public function afterAddMessage(CoreMessageManager $subject, $result, $message, $group = null)
    {

        $identifier = $this->handler->getIdentifier($message);
        $type = 'success';

        if($identifier === 'confirmAccountSuccessMessage') {
            $message = __(
                'You must confirm your account. Please check your email for the confirmation link or <a href="%1">click here</a> for a new link.',
                $this->handler->getData($message)['url']
            );
        }

        if($identifier === 'customerAlreadyExistsErrorMessage') {
            $message = __(
                'There is already an account with this email address. If you are sure that it is your email address, <a href="%1">click here</a> to get your password and access your account.',
                $this->handler->getData($message)['url']
            );
            $type = 'error';
        }

        $text = $this->handler->getText($message);
        $this->flash->set(['message' => $text, 'type' => $type]);

        return $result;
    }
}
