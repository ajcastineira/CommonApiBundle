<?php
/**
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Helper\Logger;

/**
 * SentryHelperTrait.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
trait SentryHelperTrait
{
    use BaseLoggerTrait;

    /**
     * Send exception to Sentry.
     *
     * @param \Exception $e Exception
     */
    protected function sendExceptionToSentry(\Exception $e)
    {
        if ($this->has('sentry.client')) {
            /** @var \Sentry\SentryBundle\SentrySymfonyClient $sentryClient */
            $sentryClient = $this->get('sentry.client');
            $sentryClient->captureException($e);
        }
    }

    /**
     * Send message to Sentry.
     *
     * @param string $message Message
     * @param string $level   Level
     */
    protected function sendMessageToSentry($message, $level)
    {
        if ($this->has('sentry.client')) {
            /** @var \Sentry\SentryBundle\SentrySymfonyClient $sentryClient */
            $sentryClient = $this->get('sentry.client');
            $sentryClient->captureMessage($message, [], $level);
        }
    }
}
