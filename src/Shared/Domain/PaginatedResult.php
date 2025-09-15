<?php

namespace Fitpal\Shared\Domain;

class PaginatedResult
{
    public function __construct(
        public array $items,
        public int $currentPage,
        public int $lastPage,
        public int $total
    ) {}
}
