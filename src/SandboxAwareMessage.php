<?php

namespace Mdb\PayPal\Ipn;

class SandboxAwareMessage implements MessageInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var bool
     */
    private $usingSandbox;

    /**
     * @param array|string $data
     * @param bool $usingSandbox
     */
    public function __construct($data, $usingSandbox = false)
    {
        if (!is_array($data)) {
            $data = $this->extractDataFromRawPostDataString($data);
        }

        $this->data = $data;
        $this->usingSandbox = $usingSandbox;
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function get($key)
    {
        $value = '';

        if (isset($this->data[$key])) {
            $value = $this->data[$key];
        }

        return $value;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $method = ($this->usingSandbox) ? 'rawurlencode' : 'urlencode';

        $str = '';

        foreach ($this->data as $k => $v) {
            $str .= sprintf('%s=%s&', $k, $method($v));
        }

        return rtrim($str, '&');
    }

    /**
     * @param string $rawPostDataString
     *
     * @return array
     */
    private function extractDataFromRawPostDataString($rawPostDataString)
    {
        $method = ($this->usingSandbox) ? 'rawurldecode' : 'urldecode';

        $data = [];
        $keyValuePairs = preg_split('/&/', $rawPostDataString, null, PREG_SPLIT_NO_EMPTY);

        foreach ($keyValuePairs as $keyValuePair) {
            list($k, $v) = explode('=', $keyValuePair);

            $data[$k] = $method($v);
        }

        return $data;
    }
}
