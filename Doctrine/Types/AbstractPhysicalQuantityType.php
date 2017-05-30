<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Abstract class representing a physical quantity database type.
 */
abstract class AbstractPhysicalQuantityType extends Type
{
    /**
     * Returns the unit class, usually a member of the
     * PhpUnitsOfMeasure\PhysicalQuantity namespace, but can be any class that
     * extends the PhpUnitsOfMeasure\AbstractPhysicalQuantity class.
     */
    abstract public function getUnitClass();

    /**
     * Gets the "standard" unit for this unit type, this will be the unit stored
     * in the database.
     */
    abstract public function getStandardUnit();

    /**
     * Gets the doctrine type name.
     */
    abstract public function getTypeName();

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getDecimalTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $class = $this->getUnitClass();
        return new $class($value, $this->getStandardUnit());
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value instanceof $this->getUnitClass()) {
            throw new \Exception('Not an instance of ' . $this->getUnitClass());
        }

        return $value->toUnit($this->getStandardUnit());
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getTypeName();
    }
}
