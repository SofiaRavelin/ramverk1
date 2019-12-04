<?php

namespace Anax\Ipcheck;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class GeoAPIControllerTest extends TestCase
{

    // Create the di container.
    protected $di;

        /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;
        // Set di as global variable
        $this->di = new DIFactoryConfig();
        // View helpers uses the global $di so it needs its value
        $di = $this->di;
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // Setup controllerclass
        $this->controller = new GeoAPIController();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
        $di->set("request", "\Anax\Request\Request");
    }

    public function testIndexActionPost()
    {
        $this->di->get("request")->setPost("ipaddress", "88.206.249.29");
        $res = $this->controller->indexActionPost();
        $this->assertInternalType("array", $res);
    }
}
