<?php

namespace Mdb\PayPal\Ipn\Event;

use Mdb\PayPal\Ipn\MessageInterface;

class MessageVerificationFailureEvent extends MessageVerificationEvent
{
    /**
     * @var string
     */
    private $error;

    /**
     * @param MessageInterface $message
     * @param $error
     */
    public function __construct(MessageInterface $message, $error)
    {
        $this->error = $error;

        parent::__construct($message);
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
}
