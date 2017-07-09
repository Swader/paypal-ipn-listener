<?php

namespace Mdb\PayPal\Ipn\MessageFactory;

use Mdb\PayPal\Ipn\InputStream;
use Mdb\PayPal\Ipn\Message;
use Mdb\PayPal\Ipn\MessageFactory;
use Mdb\PayPal\Ipn\MessageInterface;
use Mdb\PayPal\Ipn\SandboxAwareMessage;

class SandboxAwareInputStreamMessageFactory implements MessageFactory
{
    /**
     * @var InputStream
     */
    private $inputStream;

    /**
     * @var bool
     */
    private $usingSandbox;

    /**
     * @param InputStream $inputStream
     * @param bool $usingSanbox
     */
    public function __construct(InputStream $inputStream, $usingSanbox = false)
    {
        $this->inputStream = $inputStream;
        $this->usingSandbox = $usingSanbox;
    }

    /**
     * @return MessageInterface
     */
    public function createMessage()
    {
        $streamContents = $this->inputStream->getContents();

        return new SandboxAwareMessage($streamContents, $this->usingSandbox);
    }
}
