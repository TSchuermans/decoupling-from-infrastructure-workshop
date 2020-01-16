<?php
declare(strict_types=1);

namespace Test\Acceptance;

use Common\EventDispatcher\EventDispatcher;

final class TestServiceContainer
{
    /**
     * @var ClockForTesting | null
     */
    private $clock;

    /**
     * @var EventDispatcher | null
     */
    private $eventDispatcher;

    /**
     * @var EventSubscriberSpy | null
     */
    private $eventSubscriberSpy;

    private function clock(): ClockForTesting
    {
        return $this->clock ?? $this->clock = new ClockForTesting();
    }

    public function eventDispatcher(): EventDispatcher
    {
        if ($this->eventDispatcher === null) {
            $this->eventDispatcher = new EventDispatcher();

            $this->eventDispatcher->subscribeToAllEvents($this->eventSubscriberSpy());

            // Register your own subscribers here:
            // $this->>eventDispatcher->registerSubscriber(EventClass::class, $this->subscriberCallable);
        }

        return $this->eventDispatcher;
    }

    public function setCurrentDate(string $date): void
    {
        $this->clock()->setCurrentDate($date);
    }

    public function eventSubscriberSpy(): EventSubscriberSpy
    {
        return $this->eventSubscriberSpy ?? $this->eventSubscriberSpy = new EventSubscriberSpy();
    }

    /**
     * @return array<object>
     */
    public function dispatchedEvents(): array
    {
        return $this->eventSubscriberSpy()->dispatchedEvents();
    }
}
