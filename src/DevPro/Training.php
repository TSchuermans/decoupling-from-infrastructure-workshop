<?php
declare(strict_types=1);

namespace DevPro;

use Common\DomainModel\AggregateRoot;
use DateTimeImmutable;

final class Training
{
    use AggregateRoot;

    /**
     * @var UserId
     */
    private $trainingId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var DateTimeImmutable
     */
    private $scheduledDate;

    private function __construct(
        UserId $trainingId,
        string $title,
        DateTimeImmutable $scheduledDate
    ) {
        $this->trainingId = $trainingId;
        $this->title = $title;
        $this->scheduledDate = $scheduledDate;
    }

    public static function schedule(
        UserId $trainingId,
        string $title,
        DateTimeImmutable $scheduledDate
    ): self {
        return new self(
            $trainingId,
            $title,
            $scheduledDate
        );
    }
}
