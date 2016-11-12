<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\EventListener;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * JsonDecoderListener.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class JsonDecoderListener
{
    /**
     * @var array
     */
    private $jsonContentTypes = [
        'application/json',
    ];

    /**
     * On kernel request.
     *
     * @param GetResponseEvent $event Event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        if ($request->headers->has('Content-Type')) {
            $contentType = $request->headers->get('Content-Type');

            if (in_array($contentType, $this->jsonContentTypes)) {
                $data = json_decode($request->getContent(), true);

                if (is_array($data)) {
                    $request->request = new ParameterBag($data);
                }
            }
        }
    }
}
