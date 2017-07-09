<?php

namespace Mdb\PayPal\Ipn\ListenerBuilder\Guzzle;

use Mdb\PayPal\Ipn\InputStream;
use Mdb\PayPal\Ipn\ListenerBuilder\GuzzleListenerBuilder;
use Mdb\PayPal\Ipn\MessageFactory\SandboxAwareInputStreamMessageFactory;

class SandboxAwareInputStreamListenerBuilder extends GuzzleListenerBuilder
{
    /**
     * {@inheritdoc}
     */
    protected function getMessageFactory()
    {
        return new SandboxAwareInputStreamMessageFactory(
            new InputStream(), $this->isUsingSandbox()
        );
    }
}
