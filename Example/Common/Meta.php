<?php

namespace EventsPhp\Example\Common;

use EventsPhp\BaseRecord;
use EventsPhp\Example\Common\Origin;

class Meta extends BaseRecord
{

    /** @var string */
    private $uuid;

    /** @var int */
    private $emitted;

    /** @var Origin */
    private $origin;

    /** @return string */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /** @param string $uuid */
    public function setUuid(string $uuid): Meta
    {
        $this->uuid = $uuid;
        return $this;
    }

    /** @return int */
    public function getEmitted(): int
    {
        return $this->emitted;
    }

    /** @param int $emitted */
    public function setEmitted(int $emitted): Meta
    {
        $this->emitted = $emitted;
        return $this;
    }

    /** @return Origin */
    public function getOrigin(): Origin
    {
        return $this->origin;
    }

    /** @param Origin $origin */
    public function setOrigin(Origin $origin): Meta
    {
        $this->origin = $origin;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            "uuid" => $this->encode($this->uuid),
            "emitted" => $this->encode($this->emitted),
            "origin" => $this->encode($this->origin)
        ];
    }

    public function schema(): string
    {
        return <<<SCHEMA
{
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
SCHEMA;
    }

}