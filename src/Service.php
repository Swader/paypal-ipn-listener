<?php

namespace Mdb\PayPal\Ipn;

use Mdb\PayPal\Ipn\Exception\ServiceException;

interface Service
{
    /**
     * @param MessageInterface $message
     *
     * @return ServiceResponse
     *
     * @throws ServiceException
     */
    public function verifyIpnMessage(MessageInterface $message);
}
