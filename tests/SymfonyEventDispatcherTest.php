<?php
/**
 * This file is part of bigperson/exchange1c-symfony-bridge package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);


namespace Tests;
use Bigperson\Exchange1C\Interfaces\EventInterface;
use Bigperson\Exchange1CSymfonyBridge\SymfonyEventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class SymfonyEventDispatcherTest
 */
class SymfonyEventDispatcherTest extends TestCase
{
    public function testDispatch()
    {
        $symfonyDispatcher = new EventDispatcher();
        $symfonyDispatcher->addListener('test event', function () {

        });
        $bridgeDispatcher = new SymfonyEventDispatcher($symfonyDispatcher);
        $event = $this->createMock(EventInterface::class);
        $event->method('getName')
            ->willReturn('test event');

        $this->assertNull($bridgeDispatcher->dispatch($event));
    }
}
