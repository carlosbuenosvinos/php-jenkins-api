<?php
namespace CarlosIO\Jenkins;

use CarlosIO\Jenkins\Object;

class Author extends Object
{
    protected static $domain = null;

    public static function setDomain($domain)
    {
        static::$domain = $domain;
    }

    public static function getDomain()
    {
        return static::$domain;
    }

    public function getName()
    {
        return $this->_json->fullName;
    }

    public function getAddress()
    {
        return basename($this->_json->absoluteUrl) . '@' . static::getDomain();
    }

    public function getGravatar()
    {
        return $this->_getGravatar($this->getAddress());
    }

    private function _getGravatar($email, $rating = 'G', $size = 48)
    {
        $url = 'http://www.gravatar.com/avatar.php';
        $params = array(
            'gravatar_id' => md5(strtolower($email)),
            'rating'      => $rating,
            'size'        => $size,
        );

        return $url . '?' . http_build_query($params, '', '&amp;');
    }
}
