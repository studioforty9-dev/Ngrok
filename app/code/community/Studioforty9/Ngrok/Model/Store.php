<?php
/**
 * Studioforty9_Ngrok
 *
 * @category  Studioforty9
 * @package   Studioforty9_Ngrok
 * @author    StudioForty9 <info@studioforty9.com>
 * @copyright 2015 StudioForty9 (http://www.studioforty9.com)
 * @license   https://github.com/studioforty9/ngrok/blob/master/LICENCE BSD
 * @version   1.0.0
 * @link      https://github.com/studioforty9/ngrok
 */

/**
 * Studioforty9_Ngrok_Model_Store
 *
 * @category   Studioforty9
 * @package    Studioforty9_Ngrok
 * @subpackage Block
 */
class Studioforty9_Ngrok_Model_Store extends Mage_Core_Model_Store
{
    /**
     * Retrieve base URL
     *
     * @param string $type
     * @param boolean|null $secure
     * @return string
     * @throws \Mage_Core_Exception
     */
    public function getBaseUrl($type = self::URL_TYPE_LINK, $secure = null)
    {
        $url = parent::getBaseUrl($type, $secure);

        if (false !== strpos($_SERVER['HTTP_HOST'], 'ngrok.io')) {
            $host = parse_url($url, PHP_URL_HOST);
            $url = str_replace($host, $_SERVER['HTTP_HOST'], $url);
        }

        return $url;
    }
}
