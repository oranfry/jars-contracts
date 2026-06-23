<?php

namespace OranFry\Jars\Contract;

class Constants
{
    const GROUP_BARREL_PATTERN = '[a-zA-Z0-9]+';
    const GROUP_SUB_PATTERN = '(?:' . self::GROUP_BARREL_PATTERN . ')(?:-(?:' . self::GROUP_BARREL_PATTERN . '))*';
    const GROUP_PREFIX_PATTERN = '(?:' . self::GROUP_SUB_PATTERN . '\\/)*';
    const GROUP_PATTERN = '(?:(?:' . self::GROUP_PREFIX_PATTERN . ')(?:' . self::GROUP_SUB_PATTERN . '))?';
}
