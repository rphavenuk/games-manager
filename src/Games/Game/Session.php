<?php

declare(strict_types=1);

namespace RpHaven\Games\Game;

use DateTimeImmutable;
use RpHaven\Games\Meet;
use RpHaven\Games\Session\Status;

final readonly class Session
{
    public function __construct(
        public Meet $meet,
        public Meet\Duration $duration,
        public Status $status = Status::PENDING_CONFIRMATION,
    ) {
    }

    public function cancel(): self
    {
        return $this->status(Status::CANCELLED);
    }

    public function confirm(): self
    {
        return $this->status(Status::CONFIRMED);
    }

    public function start(): DateTimeImmutable
    {
        return $this->meet->start();
    }

    public function end(): DateTimeImmutable
    {
        return $this->meet->end();
    }

    private function status(Status $status): self
    {
        return new self(
            $this->meet,
            $status,
        );
    }
}
