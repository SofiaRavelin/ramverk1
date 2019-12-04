<?php


namespace Anax\Ipcheck;

use Anax\Commons\ContainerInjectableInterface;

use Anax\Commons\ContainerInjectableTrait;

use Anax\Model\Geo;

// use Anax\Route\Exception\ForbiddenException;

// use Anax\Route\Exception\NotFoundException;

// use Anax\Route\Exception\InternalErrorException;



/**

 * A sample controller to show how a controller class can be implemented.

 * The controller will be injected with $di if implementing the interface

 * ContainerInjectableInterface, like this sample class does.

 * The controller is mounted on a particular route and can then handle all

 * requests for that mount point.

 *

 * @SuppressWarnings(PHPMD.TooManyPublicMethods)

 */

class GeoIPCheckController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;


    /**
     * This is the index method action, it handles:
     *
     * @return string
     */

    public function indexAction()
    {
        $title = "geocheck";
        $page = $this->di->get("page");

        $page->add("geocheck/main", ["ipAddress" => $this->di->get("request")->getServer("REMOTE_ADDR")]);
        //"ipAddress" => $this->di->get("request")->getServer("REMOTE_ADDR")
        //value="<?= $ipAddress ?

        return $page->render([
            "title" => $title,
        ]);
    }

    /**
     * This is the index method action, it handles:
     *
     * @return object
     */


    public function indexActionPost() : object
    {
        $title = "geocheck";
        $page = $this->di->get("page");
        $ipAddress = $this->di->get("request")->getPost("ipaddress");
        $isValid = filter_var($ipAddress, FILTER_VALIDATE_IP) ? true : false;

        if ($isValid) {
            $geo = new Geo();
            $res = $geo->geoInfo($ipAddress);
        }

        $data = [
            //"content" => json_encode($res, JSON_PRETTY_PRINT)
            "ipAddress" => $ipAddress,
            "protocol" => $res["protocol"] ?? null,
            "city" => $res["city"] ?? null,
            "country" => $res["country_name"] ?? null,
            "latitude" => $res["latitude"] ?? null,
            "longitude" => $res["longitude"] ?? null,
        ];

        $page->add("geocheck/result", $data);

        return $page->render([
            "title" => $title,
        ]);
    }
}
