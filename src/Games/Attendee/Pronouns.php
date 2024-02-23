<?php

declare(strict_types=1);

namespace RpHaven\Games\Attendee;

use RpHaven\Games\Interface\ToStringable;
use RpHaven\Games\Traits\ToString;

final readonly class Pronouns implements ToStringable
{
    use ToString;

    public array $pronouns;

    public static function create(string ...$pronouns): self
    {
        $extractedPronouns = [];
        foreach ($pronouns as $pronoun) {
             preg_match_all("/(?<pronoun>[\w\s]+)+/", $pronoun, $extracted);
             foreach ($extracted['pronoun'] as $pro) {
                 $extractedPronouns[] = ucfirst(strtolower($pro));
             }
        }

        return new self(
            ... $extractedPronouns
        );
    }

    private function __construct(string ... $pronouns)
    {
        $this->pronouns = $pronouns;
    }

    public function toString(): string
    {
        return implode('/', $this->pronouns);
    }
}
