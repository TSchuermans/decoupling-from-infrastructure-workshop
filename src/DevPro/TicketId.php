<?php
declare(strict_types=1);

namespace DevPro;

use Common\DomainModel\AggregateId;

final class TicketId
{
    use AggregateId;

    public function asString(): string
    {
        return $this->__toString();
    }
}
