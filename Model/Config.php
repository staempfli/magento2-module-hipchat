<?php
/**
 * @category  Staempfli
 * @package   Staempfli_HipChat
 * @copyright Copyright © Stämpfli AG. All rights reserved.
 * @author    marcel.hauri@staempfli.com
 */
namespace Staempfli\HipChat\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const MESSAGE_FORMAT = 'html';
    const XML_PATH_HIPCHAT_URL = 'chatconnector/hipchat/url';
    const XML_PATH_HIPCHAT_ROOM_ID = 'chatconnector/hipchat/room_id';
    const XML_PATH_HIPCHAT_TOKEN = 'chatconnector/hipchat/token';
    const XML_PATH_HIPCHAT_NOTIFY = 'chatconnector/hipchat/notify';
    const XML_PATH_HIPCHAT_COLOR = 'chatconnector/hipchat/color';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_HIPCHAT_COLOR, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function doNotify()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_HIPCHAT_NOTIFY, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_HIPCHAT_ROOM_ID, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_HIPCHAT_TOKEN, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        $url = $this->scopeConfig->getValue(self::XML_PATH_HIPCHAT_URL, ScopeInterface::SCOPE_STORE);
        $url = rtrim($url, '/');
        return $url;
    }

    /**
     * @return string
     */
    public function getMessageFormat()
    {
        return self::MESSAGE_FORMAT;
    }
}
