<?php
declare(strict_types=1);
/**
 * Test Suite
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Test\Unit;

use ReflectionClass;
use Ticaje\Contract\Test\Unit\BaseTest as ParentClass;

/**
 * Class BaseTest
 * @package Ticaje\FileManager\Test\Unit
 */
abstract class BaseTest extends ParentClass
{
    /** @var mixed $instance */
    protected $instance;

    /** @var string $class */
    protected $class;

    /** @var array $attributes */
    protected $attributes;

    /** @var string $interface */
    protected $interface;

    /** @var ReflectionClass $reflection */
    protected $reflection;

    public function setUp()
    {
        $this->reflection = new ReflectionClass($this->instance);
    }

    public function testProperInterface()
    {
        $this->assertInstanceOf($this->interface, $this->instance);
    }

    public function testAttributes()
    {
        ($formalAttributes = function () {
            foreach ($this->attributes as $attribute) {
                $this->assertObjectHasAttribute($attribute, $this->instance);
            }
        })();
        ($actualParameters = function () {
            $properties = $this->reflection->getProperties();
            $properties = array_filter($properties, function ($property) {
                return in_array($property->name, $this->attributes);
            });
            $this->assertEquals(count($this->attributes), count($properties), 'Assert exact amount of properties');
        })();
    }
}
