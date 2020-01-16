<?php
declare(strict_types=1);

namespace DevPro;

use Common\DomainModel\AggregateRoot;

final class Ticket
{
    use AggregateRoot;

    /**
     * @var TicketId
     */
    private $ticketId;

    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var TrainingId
     */
    private $trainingId;

    private function __construct(
        TicketId $ticketId,
        UserId $userId,
        TrainingId $trainingId
    ) {
        $this->ticketId = $ticketId;
        $this->userId = $userId;
        $this->trainingId = $trainingId;
    }

    public static function buyForTraining(
        TicketId $ticketId,
        UserId $userId,
        TrainingId $trainingId
    ): self {
        return new self(
            $ticketId,
            $userId,
            $trainingId
        );
    }
}
