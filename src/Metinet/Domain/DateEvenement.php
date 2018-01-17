<?php
namespace Core\Domains;
class DateEvenement {

    private $date;
    private $duree;

    public static function fromString(string $date): self
    {
        return new self($date);
    }

    private function __construct(string $date, int $duree)
    {
        $dateAsDateTime = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', sprintf('%s 23:59:59', $date));
        if ($dateAsDateTime > new \DateTimeImmutable('now')) {
            throw InvalidDate::mustNotBeInTheFuture();
        }
        $this->date = $dateAsDateTime;
        $this->duree = $duree;
    }
}