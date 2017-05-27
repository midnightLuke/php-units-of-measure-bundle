<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

class LengthType extends Type
{
    const LENGTH_TYPE = 'length'; // modify to match your type name
    const STANDARD_UNIT = 'cm';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // return the SQL used to create your column type. To create a portable column type, use the $platform.
        return $platform->getDecimalTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Length($value, $this::STANDARD_UNIT);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value instanceof Length) {
            throw new \Exception('Not an instance of Length');
        }

        // This is executed when the value is written to the database. Make your conversions here, optionally using the $platform.
        return $value->toUnit($this::STANDARD_UNIT);
    }

    public function getName()
    {
        return self::LENGTH_TYPE; // modify to match your constant name
    }
}
