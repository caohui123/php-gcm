<?php

namespace GianArb\GCMTest;

use GianArb\GCM\Publisher;

class PublisherTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateNewPublisher()
    {
        $clientMock = $this->getMock("GuzzleHttp\Client");
        $publisher = new Publisher($clientMock, "testSendKeyID");
        $this->assertInstanceOf(Publisher::class, $publisher);
    }

    public function testCallPostIfYouPushMessage()
    {
        $clientMock = $this->getMock("GuzzleHttp\Client");
        $clientMock->expects($this->once())
             ->method('send');

        $publisher = new Publisher($clientMock, "testSendKeyID");
        $publisher->push(["352352352346g4v"], [
            'message'   => '',
            'title'     => '',
            'subtitle'  => '',
            'tickerText'    => '',
            'vibrate'   => 1,
            'sound'     => 1,
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon'
        ]);
    }

    public function testCheckAccessKeyOfYourPublisher()
    {
        $clientMock = $this->getMock("GuzzleHttp\Client");
        $publisher = new Publisher($clientMock, "testSendKeyID");
        $reflection = new \ReflectionClass(get_class($publisher));
        $reflectionProperty = $reflection->getProperty('accessKey');
        $reflectionProperty->setAccessible(true);

        $this->assertEquals("testSendKeyID", $reflectionProperty->getValue($publisher));
    }

    public function testCreateNewPublisherAndOverrideEndpoint()
    {
        $clientMock = $this->getMock("GuzzleHttp\Client");
        $publisher = new Publisher($clientMock, "testSendKeyID", [
            'endpoint' => "https://test.it",
        ]);
        $reflection = new \ReflectionClass(get_class($publisher));
        $reflectionProperty = $reflection->getProperty('options');
        $reflectionProperty->setAccessible(true);

        $this->assertEquals("https://test.it", $reflectionProperty->getValue($publisher)['endpoint']);
    }
}
