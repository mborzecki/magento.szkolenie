<?php

/**
 * Divante Frontend Magento Observer
 *
 * {%LICENCE%}
 *
 * @category   Divante
 * @package    Divante_Frontend_Model_Observer_Pdf
 * @copyright  Copyright (c) by Divante
 */
class Divante_Training_Model_Observer extends Varien_Object
{
    const PROFILE_CONTROLLER_NAME = 'check_controller';

    /**
     * @param $observer
     */
    public function beforeController($observer)
    {
        Varien_Profiler::enable();
        Varien_Profiler::start(self::PROFILE_CONTROLLER_NAME);
    }

    /**
     * @param $observer
     */
    public function afterController($observer)
    {
        Varien_Profiler::stop(self::PROFILE_CONTROLLER_NAME);

        /** @var array $timers */
        $timers = Varien_Profiler::getTimers();

        if (isset($timers[self::PROFILE_CONTROLLER_NAME])) {
            echo '<br><b>Total Execution Time: ' . round($timers[self::PROFILE_CONTROLLER_NAME]['sum'], 2) .' secs.</b>';
        }

    }


}