<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\Tests\DBAL\Mocks\MockPlatform;

abstract class AbstractTypeTest extends \Doctrine\Tests\DbalTestCase
{
    protected $platform;
    protected $type;

    abstract public function getTypeName();
    abstract public function getUnitClass();
    abstract public function getTypeClass();

    protected function setUp()
    {
        $this->platform = new MockPlatform();
        $this->type = Type::getType($this->getTypeName());
    }

    public function testConvertsToPHPValue()
    {
        $type_class = $this->getTypeClass();
        $unit_class = $this->getUnitClass();
        $expected = new $unit_class(5.5, $type_class::STANDARD_UNIT);
        $actual = $this->type->convertToPHPValue(5.5, $this->platform);

        $this->assertEquals($expected, $actual);
    }

    public function testNullConvertsToPHPValue()
    {
        $this->assertNull($this->type->convertToPHPValue(null, $this->platform));
    }

    public function testConvertToDatabaseValue()
    {
        $type_class = $this->getTypeClass();
        $unit_class = $this->getUnitClass();
        $length = new $unit_class(5.5, $type_class::STANDARD_UNIT);
        $expected = 5.5;
        $actual = $this->type->convertToDatabaseValue($length, $this->platform);
        $this->assertEquals($expected, $actual);
    }

    public function testNullConvertToDatabaseValue()
    {
        $this->assertNull($this->type->convertToDatabaseValue(null, $this->platform));
    }
}
