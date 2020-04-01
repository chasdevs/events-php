<?php

namespace EventsPhp\Example;

use EventsPhp\BaseRecord;
use EventsPhp\Example\Common\Meta;

class ExampleEvent extends BaseRecord
{

    /** @var Meta */
    private $meta;

    /** @var int */
    private $x;

    /** @var float */
    private $y;

    /** @var null|string */
    private $foo;

    /** @var string */
    private $bar = "BAR BAR";

    /** @var bool */
    private $active = true;

    /** @var float */
    private $money;

    /** @return Meta */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /** @param Meta $meta */
    public function setMeta(Meta $meta): ExampleEvent
    {
        $this->meta = $meta;
        return $this;
    }

    /** @return int */
    public function getX(): int
    {
        return $this->x;
    }

    /** @param int $x */
    public function setX(int $x): ExampleEvent
    {
        $this->x = $x;
        return $this;
    }

    /** @return float */
    public function getY(): float
    {
        return $this->y;
    }

    /** @param float $y */
    public function setY(float $y): ExampleEvent
    {
        $this->y = $y;
        return $this;
    }

    /** @return null|string */
    public function getFoo()
    {
        return $this->foo;
    }

    /** @param null|string $foo */
    public function setFoo($foo): ExampleEvent
    {
        $this->foo = $foo;
        return $this;
    }

    /** @return string */
    public function getBar(): string
    {
        return $this->bar;
    }

    /** @param string $bar */
    public function setBar(string $bar): ExampleEvent
    {
        $this->bar = $bar;
        return $this;
    }

    /** @return bool */
    public function getActive(): bool
    {
        return $this->active;
    }

    /** @param bool $active */
    public function setActive(bool $active): ExampleEvent
    {
        $this->active = $active;
        return $this;
    }

    /** @return float */
    public function getMoney(): float
    {
        return $this->money;
    }

    /** @param float $money */
    public function setMoney(float $money): ExampleEvent
    {
        $this->money = $money;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            "meta" => $this->encode($this->meta),
            "x" => $this->encode($this->x),
            "y" => $this->encode($this->y),
            "foo" => $this->encode($this->foo),
            "bar" => $this->encode($this->bar),
            "active" => $this->encode($this->active),
            "money" => $this->encode($this->money)
        ];
    }

    public function schema(): string
    {
        return <<<SCHEMA
{
    "type": "record",
    "name": "ExampleEvent",
    "namespace": "example",
    "fields": [
        {
            "name": "meta",
            "type": {
                "type": "record",
                "name": "Meta",
                "namespace": "example.common",
                "fields": [
                    {
                        "name": "uuid",
                        "type": "string"
                    },
                    {
                        "name": "emitted",
                        "type": {
                            "type": "long",
                            "logicalType": "timestamp-millis"
                        }
                    },
                    {
                        "name": "origin",
                        "type": {
                            "type": "enum",
                            "name": "Origin",
                            "symbols": [
                                "SITE_ONE",
                                "SITE_TWO",
                                "OUTDATED_SCHEMA"
                            ],
                            "default": "OUTDATED_SCHEMA"
                        }
                    }
                ]
            }
        },
        {
            "name": "x",
            "type": "int"
        },
        {
            "name": "y",
            "type": "float",
            "default": 0
        },
        {
            "name": "foo",
            "type": [
                "null",
                "string"
            ]
        },
        {
            "name": "bar",
            "type": "string",
            "default": "BAR BAR"
        },
        {
            "name": "active",
            "type": "boolean",
            "default": true
        },
        {
            "name": "money",
            "type": "double",
            "default": 0
        }
    ]
}
SCHEMA;
    }

}