<?php

namespace OranFry\Jars\Contract;

class Constants
{
    const GROUP_BARREL_PATTERN = '[a-zA-Z0-9]+';
    const GROUP_SUB_PATTERN = '(?:' . self::GROUP_BARREL_PATTERN . ')(?:-(?:' . self::GROUP_BARREL_PATTERN . '))*';
    const GROUP_PREFIX_PATTERN = '(?:' . self::GROUP_SUB_PATTERN . '\\/)*';
    const GROUP_PATTERN = '(?:(?:' . self::GROUP_PREFIX_PATTERN . ')(?:' . self::GROUP_SUB_PATTERN . '))?';
    const ROOT_VERSION = '00000096d746ac3688c7de4ed14988c6ac0af8244b42a6c48298d9fff331c701';
}
