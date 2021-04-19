<?php

declare(strict_types=1);

namespace Jolf20\Config;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the router.php config file
 */

class ConfigRouteTest extends TestCase
{
    private $routerFile = INSTALL_PATH . "/config/router.php";

    /**
     * Require the router file
     */
    public function testRequireRouteFile()
    {
        $exp = 1;
        $actual = require $this->routerFile;
        $this->assertEquals($exp, $actual);
    }
}
