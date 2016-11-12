<?php
/*
 * This file is part of the FreshCommonApiBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\CommonApiBundle\Tests\EventListener;

use Fresh\CommonApiBundle\EventListener\JsonDecoderListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * JsonDecoderListenerTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class JsonDecoderListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EventDispatcherInterface $dispatcher Dispatcher
     */
    private $dispatcher;

    /**
     * @var HttpKernelInterface|\PHPUnit_Framework_MockObject_MockObject $kernel kernel
     */
    private $kernel;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->kernel = $this->getMockBuilder(HttpKernelInterface::class)
                             ->disableOriginalConstructor()
                             ->getMock();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        $this->dispatcher = null;
    }

    public function testIgnoreDecodingWithoutContentTypeHeader()
    {
        $this->addEventListener();

        /** @var Request|\PHPUnit_Framework_MockObject_MockObject $request */
        $request = $this->getMockBuilder(Request::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        $headerBag = $this->getMockBuilder(HeaderBag::class)
                          ->disableOriginalConstructor()
                          ->getMock();

        $headerBag->expects($this->once())
                  ->method('has')
                  ->withAnyParameters()
                  ->willReturn(false);

        $request->headers = $headerBag;

        $event = new GetResponseEvent($this->kernel, $request, HttpKernelInterface::MASTER_REQUEST);
        $this->dispatcher->dispatch(KernelEvents::REQUEST, $event);

        $this->assertNull($request->request);
    }

    public function testIgnoreDecodingWithNotJsonContentType()
    {
        $this->addEventListener();

        /** @var Request|\PHPUnit_Framework_MockObject_MockObject $request */
        $request = $this->getMockBuilder(Request::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        $headerBag = new HeaderBag();
        $headerBag->add(['Content-Type' => 'text/html']);
        $request->headers = $headerBag;

        $event = new GetResponseEvent($this->kernel, $request, HttpKernelInterface::MASTER_REQUEST);
        $this->dispatcher->dispatch(KernelEvents::REQUEST, $event);

        $this->assertNull($request->request);
    }

    public function testIgnoreDecodingIfDataCannotBeDecodedFromJson()
    {
        $this->addEventListener();

        /** @var Request|\PHPUnit_Framework_MockObject_MockObject $request */
        $request = $this->getMockBuilder(Request::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        $headerBag = new HeaderBag();
        $headerBag->add(['Content-Type' => 'application/json']);
        $request->headers = $headerBag;

        $request->expects($this->once())
                ->method('getContent')
                ->willReturn('hello world'); // simple test cannot be treated as json

        $event = new GetResponseEvent($this->kernel, $request, HttpKernelInterface::MASTER_REQUEST);
        $this->dispatcher->dispatch(KernelEvents::REQUEST, $event);

        $this->assertNull($request->request);
    }

    public function testSuccessfulDecodingJsonRequest()
    {
        $this->addEventListener();

        /** @var Request|\PHPUnit_Framework_MockObject_MockObject $request */
        $request = $this->getMockBuilder(Request::class)
                        ->disableOriginalConstructor()
                        ->getMock();

        $headerBag = new HeaderBag();
        $headerBag->add(['Content-Type' => 'application/json']);
        $request->headers = $headerBag;

        $request->expects($this->once())
                ->method('getContent')
                ->willReturn(<<<'JSON'
{
    "test": {
        "hello": "world"
    }
}
JSON
                );

        $event = new GetResponseEvent($this->kernel, $request, HttpKernelInterface::MASTER_REQUEST);
        $this->dispatcher->dispatch(KernelEvents::REQUEST, $event);

        $expectedDecodedData = [
            'test' => [
                'hello' => 'world',
            ]
        ];

        $this->assertEquals($expectedDecodedData, $request->request->all());
    }

    protected function addEventListener()
    {
        $this->dispatcher = new EventDispatcher();
        $listener = new JsonDecoderListener();
        $this->dispatcher->addListener(KernelEvents::REQUEST, [$listener, 'onKernelRequest']);
    }
}
