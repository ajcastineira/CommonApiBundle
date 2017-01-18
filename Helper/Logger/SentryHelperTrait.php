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
 * SentryHelperTrait.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
trait SentryHelperTrait
{
    use BaseLoggerTrait;

    /**
     * @param \Exception $e
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
     * @param string $message
     * @param string $level
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
