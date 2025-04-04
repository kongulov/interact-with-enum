<?php

namespace Kongulov\Traits;

/**
 * Trait for comfortable working with ENUMs
 */
trait InteractWithEnum {

    /**
     * Find ENUM by name or value
     *
     * @param mixed $needle
     *
     * @return InteractWithEnum|null
     */
    public static function find(mixed $needle): self|null
    {
        if(in_array($needle, self::names())) return constant("self::$needle");
        if(in_array($needle, self::values())) return self::tryFrom($needle);

        return null;
    }

    /**
     * Get all ENUM names
     *
     * @return array
     */
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Get all ENUM values
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get all ENUM name => value
     *
     * @return array
     */
    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    /**
     * Get the count of ENUM cases
     *
     * @return int
     */
    public static function count(): int
    {
        return count(self::cases());
    }

    /**
     * Check if a name or value exists in the ENUM
     *
     * @param mixed $needle
     *
     * @return bool
     */
    public static function exists(mixed $needle): bool
    {
        return self::find($needle) !== null;
    }

    /**
     * Get the ENUM case by index
     *
     * @param int $index
     *
     * @return InteractWithEnum|null
     */
    public static function getByIndex(int $index): self|null
    {
        $cases = self::cases();
        return $cases[$index] ?? null;
    }
}
