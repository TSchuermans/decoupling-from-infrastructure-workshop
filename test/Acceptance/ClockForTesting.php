<?php
declare(strict_types=1);

namespace Test\Acceptance;

use Assert\Assert;
use DateTimeImmutable;
use DevPro\Clock;
use LogicException;

final class ClockForTesting implements Clock
{
    private const DATE_FORMAT = 'd-m-Y';

    /**
     * @var DateTimeImmutable | null
     */
    private $dateTime;

    public function setCurrentDate(string $date): void
    {
        $dateTime = DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $date);;
        Assert::that($dateTime)->isInstanceOf(DateTimeImmutable::class);

        $this->dateTime = $dateTime;
    }

    public function currentTime(): DateTimeImmutable
    {
        if (!$this->dateTime instanceof DateTimeImmutable) {
            throw new LogicException('First set the current date using setCurrentDate()');
        }

        return $this->dateTime;
    }
}
