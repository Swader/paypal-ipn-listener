<?php

namespace Mdb\PayPal\Ipn\Event;

use Mdb\PayPal\Ipn\MessageInterface;
use Symfony\Component\EventDispatcher\Event;

abstract class MessageVerificationEvent extends Event
{
    /**
     * @var MessageInterface
     */
    private $message;

    /**
     * @param MessageInterface $message
     */
    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * @return MessageInterface
     */
    public function getMessage()
    {
        return $this->message;
    }
}
