<?php
declare(strict_types=1);
/**
 * Test Suite Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Test\Unit\Driver\Reader\File;

use ArgumentCountError;
use Iterator;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\FileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\FileGatewayInterface;
use Ticaje\FileManager\Test\Unit\BaseTest as ParentClass;

/**
 * Class BaseTest
 * @package Ticaje\FileManager\Test\Unit\Driver\Reader\File
 */
abstract class BaseTest extends ParentClass
{
    protected $class;

    protected $interface = FileInterface::class;

    protected $attributes = [
        'implementor',
        'hasHeader',
    ];

    protected $propertiesNumber = 2;

    protected $implementor;

    protected $implementorInterface;

    public function setUp()
    {
        $this->implementor = $this->createMock($this->implementorInterface);
        $this->instance = $this->getMockBuilder($this->class)
            ->setConstructorArgs(['implementor' => $this->implementor])
            ->setMethods([
                'setSource',
                'getData',
                'getImplementor',
            ])
            ->getMock();
        parent::setUp();
    }

    public function testGetData()
    {
        $expectedValue = (function () {
            $arr = [
                1,
                2,
                3,
            ];
            foreach ($arr as $el) {
                yield $el;
            }
        })();
        $unExpectedValue = false;
        $this->instance->method('getData')
            ->willReturn($expectedValue);
        $data = $this->instance->getData();
        $this->assertEquals($expectedValue, $data);
        $this->assertNotEquals($unExpectedValue, $data);
        $this->assertInstanceOf(Iterator::class, $data);
    }

    public function testGetImplementor()
    {
        $unExpectedValue = false;
        $this->instance->method('getImplementor')
            ->willReturn($this->implementor);
        $implementor = $this->instance->getImplementor();
        $this->assertEquals($this->implementor, $implementor);
        $this->assertNotEquals($unExpectedValue, $implementor);
        $this->assertInstanceOf(FileGatewayInterface::class, $implementor);
    }

    public function testSetSource()
    {
        $validArgument = 'validArgument';
        $unExpectedValue = false;
        $this->instance->method('setSource')
            ->willReturn($this->instance);
        $result = $this->instance->setSource($validArgument);

        $this->assertEquals($this->instance, $result);
        $this->assertNotEquals($unExpectedValue, $result);
        $this->assertInstanceOf(FileInterface::class, $result);
    }

    public function testSetSourceWithWrongParameter()
    {
        $invalidArgument = [];
        $pattern = '/must be of the type string/';
        $this->instance->method('setSource')
            ->willReturn($this->instance);
        $this->expectExceptionMessageRegExp($pattern, 'Expect proper error when wrong parameter passed along');
        $this->instance->setSource($invalidArgument);
    }

    public function testSetSourceWithNoParameter()
    {
        $this->instance->method('setSource')
            ->willReturn($this->instance);
        $this->expectException(ArgumentCountError::class, 'Expect proper error when no parameters passed along');
        $this->instance->setSource();
    }

}
