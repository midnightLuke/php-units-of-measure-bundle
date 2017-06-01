<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Doctrine\DBAL\Types\Type;
use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

// Doctrine test bootstrap nonsense.
if (file_exists(__DIR__.'/../vendor/autoload.php')) {
    $classLoader = require __DIR__.'/../vendor/autoload.php';
    $classLoader->add('Doctrine\\Tests\\', __DIR__.'/../vendor/doctrine/dbal/tests/');
} elseif (file_exists(__DIR__.'/../../../autoload.php')) {
    $classLoader = require __DIR__.'/../../../autoload.php';
    $classLoader->add('Doctrine\\Tests\\', __DIR__.'/../../doctrine/dbal/tests/');
} else {
    throw new Exception('Can\'t find autoload.php. Did you install dependencies via Composer?');
}

unset($classLoader);

// Add custom types.
Type::addType(Types\AccelerationType::TYPE_NAME, Types\AccelerationType::class);
Type::addType(Types\AngleType::TYPE_NAME, Types\AngleType::class);
Type::addType(Types\AreaType::TYPE_NAME, Types\AreaType::class);
Type::addType(Types\ElectricCurrentType::TYPE_NAME, Types\ElectricCurrentType::class);
Type::addType(Types\EnergyType::TYPE_NAME, Types\EnergyType::class);
Type::addType(Types\LengthType::TYPE_NAME, Types\LengthType::class);
Type::addType(Types\LuminousIntensityType::TYPE_NAME, Types\LuminousIntensityType::class);
Type::addType(Types\MassType::TYPE_NAME, Types\MassType::class);
Type::addType(Types\PressureType::TYPE_NAME, Types\PressureType::class);
Type::addType(Types\QuantityType::TYPE_NAME, Types\QuantityType::class);
Type::addType(Types\SolidAngleType::TYPE_NAME, Types\SolidAngleType::class);
Type::addType(Types\TemperatureType::TYPE_NAME, Types\TemperatureType::class);
Type::addType(Types\TimeType::TYPE_NAME, Types\TimeType::class);
Type::addType(Types\VelocityType::TYPE_NAME, Types\VelocityType::class);
Type::addType(Types\VolumeType::TYPE_NAME, Types\VolumeType::class);
