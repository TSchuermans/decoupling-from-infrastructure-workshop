<?php
declare(strict_types=1);

namespace DevPro;

use RuntimeException;

final class CouldNotFindTraining extends RuntimeException
{
    public static function withId(UserId $trainingId): self
    {
        return new self(
            'Could not find training with ID ' . $trainingId->asString()
        );
    }
}
