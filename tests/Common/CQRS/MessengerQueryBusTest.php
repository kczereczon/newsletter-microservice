<?php

namespace App\Tests\Common\CQRS;

use App\Common\CQRS\MessengerQueryBus;
use App\Common\CQRS\Query;
use App\Tests\TestDouble\DummyQuery;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class MessengerQueryBusTest extends TestCase
{
    private MessageBusInterface $messageBus;
    private MessengerQueryBus $messengerQueryBus;

    public function setUp(): void
    {
        $this->messageBus = $this->assembleSymfonyMessageBus();
        $this->messengerQueryBus = new MessengerQueryBus($this->messageBus);
    }

    private function assembleSymfonyMessageBus()
    {
        return new class () implements MessageBusInterface {

            private Query $dispatchedQuery;

            public function dispatch($message, array $stamps = []): Envelope
            {
                $this->dispatchedQuery = $message;

                return new Envelope($message, [new HandledStamp($message, 'result' . spl_object_hash($message))]);
            }

            public function lastDispatchedQuery(): Query
            {
                return $this->dispatchedQuery;
            }
        };
    }

    public function testMessageForwardedToMessageBusWhileDispatching(): void
    {
        $query = new DummyQuery();
        $this->messengerQueryBus->handle($query);

        self::assertSame($query, $this->messageBus->lastDispatchedQuery());
    }
}
