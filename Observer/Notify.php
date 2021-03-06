<?php
/**
 * @category  Staempfli
 * @package   Staempfli_HipChat
 * @copyright Copyright © Stämpfli AG. All rights reserved.
 * @author    marcel.hauri@staempfli.com
 */

namespace Staempfli\HipChat\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Staempfli\ChatConnector\Api\Data\MessageInterface;
use Staempfli\ChatConnector\Api\MessageManagementInterface;
use Staempfli\HipChat\Model\Config;

class Notify implements ObserverInterface
{
    const MESSAGE_LIMIT = 10000;

    /**
     * @var MessageInterface
     */
    private $message;
    /**
     * @var MessageManagementInterface
     */
    private $messageManagement;
    /**
     * @var Config
     */
    private $config;

    /**
     * Notify constructor.
     * @param MessageInterface $message
     * @param MessageManagementInterface $messageManagement
     * @param Config $config
     */
    public function __construct(
        MessageInterface $message,
        MessageManagementInterface $messageManagement,
        Config $config
    ) {
        $this->message = $message;
        $this->messageManagement = $messageManagement;
        $this->config = $config;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $notification = strip_tags($observer->getMessage());

        if ($this->config->getMessageFormat() === 'html') {
            $notification = nl2br($observer->getMessage());
        }

            $message = $this->message
            ->setUrl(sprintf('%s/%d/notification?auth_token=%s',
                $this->config->getUrl(),
                $this->config->getRoomId(),
                $this->config->getToken()
            ))
            ->setEvent($observer->getEvent())
            ->setMessageData([
                'message' => substr($notification, 0, self::MESSAGE_LIMIT),
                'color' => $this->config->getColor(),
                'notify' => $this->config->doNotify(),
                'message_format' => 'html'
            ]);
        $this->messageManagement->send($message);
    }
}
