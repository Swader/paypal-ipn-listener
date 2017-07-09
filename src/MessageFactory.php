<?php

namespace Mdb\PayPal\Ipn;

interface MessageFactory
{
    /**
     * @return MessageInterface
     */
    public function createMessage();
}
