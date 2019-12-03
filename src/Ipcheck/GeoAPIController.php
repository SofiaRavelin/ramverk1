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

class GeoAPIController implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;


/**

     * This is the index method action, it handles:

     * ANY METHOD mountpoint

     * ANY METHOD mountpoint/

     * ANY METHOD mountpoint/index

     *

     * @return array

     */

    public function indexActionPost() : array
    {
        $title = "geoapicheck";
        $page = $this->di->get("page");
        $ipAddress = $this->di->get("request")->getPost("ipaddress");
        //var_dump($ipAddress);
        $geo = new Geo();
        //var_dump($ipAddress);
        $res = $geo->Nu($ipAddress);
        $data = [
            //"content" => json_encode($res, JSON_PRETTY_PRINT)
            "ipAddress" => $res["ip"],
            "city" => $res["city"],
            "country" => $res["country_name"],
            "latitude" => $res["latitude"],
            "longitude" => $res["longitude"],
        ];

        return [$data];
    }
}
