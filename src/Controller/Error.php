<?php

declare(strict_types=1);

namespace Mos\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for error route.
 */
class Error
{
    use ControllerTrait;

    public function do404(): ResponseInterface
    {
        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];

        $body = renderView("layout/page.php", $data);

        return $this->response($body, 404);
    }

    public function do405(array $allowed): ResponseInterface
    {

        $data = [
            "header" => "405",
            "message" => "Method is not allowed. Allowed methods are: "
                . implode(", ", $allowed),
        ];

        $body = renderView("layout/page.php", $data);

        return $this->response($body, 405);
    }
}
