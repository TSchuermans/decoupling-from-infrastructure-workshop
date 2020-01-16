<?php
declare(strict_types=1);

namespace DevPro;

interface TrainingRepository
{
    public function save(Training $training): void;

    /**
     * @throws CouldNotFindTraining
     */
    public function getById(UserId $trainingId): Training;
}
