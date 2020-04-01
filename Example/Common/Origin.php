<?php

namespace EventsPhp\Example\Common;

use MyCLabs\Enum\Enum;

/**
 * @method static Origin SITE_ONE()
 * @method static Origin SITE_TWO()
 * @method static Origin OUTDATED_SCHEMA()
 */
class Origin extends Enum
{
    private const SITE_ONE = 'SITE_ONE';
    private const SITE_TWO = 'SITE_TWO';
    private const OUTDATED_SCHEMA = 'OUTDATED_SCHEMA';
}