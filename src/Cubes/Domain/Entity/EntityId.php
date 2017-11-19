<?php
namespace Cubes\Domain\Entity;

use Ramsey\Uuid\Uuid;

/**
 * Class EntityId
 * @package Cubes\Domain\Entity
 */
abstract class EntityId
{
    /** @var string */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @param self $id
     *
     * @return bool
     */
    public function equals(self $id): bool
    {
        return $this->id() === $id->id();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id();
    }
}