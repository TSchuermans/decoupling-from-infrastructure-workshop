<?php
declare(strict_types=1);

namespace DevPro;

use Common\DomainModel\AggregateId;

final class TrainingId
{
    use AggregateId;

    public function asString(): string
    {
        return $this->__toString();
    }
}
