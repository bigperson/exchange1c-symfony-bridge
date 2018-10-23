<?php
/**
 * This file is part of bigperson/exchange1c-symfony-bridge package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Bigperson\Exchange1CSymfonyBridge;

use Bigperson\Exchange1C\Interfaces\EventDispatcherInterface as EventDispatcher;
use Bigperson\Exchange1C\Interfaces\EventInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SymfonyEventDispatcher.
 */
class SymfonyEventDispatcher implements EventDispatcher
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param EventInterface $event
     */
    public function dispatch(EventInterface $event): void
    {
        $listeners = $this->eventDispatcher->getListeners($event->getName());

        foreach ($listeners as $listener) {
            call_user_func($listener, $event);
        }
    }
}
