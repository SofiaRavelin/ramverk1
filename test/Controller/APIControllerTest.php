<?php

namespace Anax\Ipcheck;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class APIControllerTest extends TestCase
{

        /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;
        // Set di as global variable
        $this->di = new DIFactoryConfig();
        $di = $this->di;
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // Setup controllerclass
        $this->controller = new APIController();
        $this->controller->setDI($this->di);
        $di->set("request", "\Anax\Request\Request");
    }

    public function testIndexActionPost()
    {
        $this->di->get("request")->setPost("ip", "192.168.0.1");
        $res = $this->controller->indexActionPost();
        $this->assertInternalType("array", $res);
        //$this->assertIsArray($res);
    }
}
