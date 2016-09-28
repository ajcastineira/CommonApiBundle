<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Helper\Logger;

/**
 * RollbarHelperTrait.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
trait RollbarHelperTrait
{
    use BaseLoggerTrait;

    /**
     * Send exception to Rollbar.
     *
     * @param \Exception $e Exception
     */
    protected function sendExceptionToRollbar(\Exception $e)
    {
        if ($this->has('ftrrtf_rollbar.notifier')) {
            /** @var \Ftrrtf\Rollbar\Notifier $rollbarNotifier */
            $rollbarNotifier = $this->get('ftrrtf_rollbar.notifier');
            $rollbarNotifier->reportException($e);
        }
    }

    /**
     * Send message to Rollbar.
     *
     * @param string $message Message
     * @param string $level   Level
     */
    protected function sendMessageToRollbar($message, $level)
    {
        if ($this->has('ftrrtf_rollbar.notifier')) {
            /** @var \Ftrrtf\Rollbar\Notifier $rollbarNotifier */
            $rollbarNotifier = $this->get('ftrrtf_rollbar.notifier');
            $rollbarNotifier->reportMessage($message, $level);
        }
    }
}
