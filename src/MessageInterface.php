<?php

namespace Mdb\PayPal\Ipn;

interface MessageInterface
{
    /**
     * @param $key
     *
     * @return string
     */
    public function get($key);

    /**
     * @return array
     */
    public function getAll();
}
