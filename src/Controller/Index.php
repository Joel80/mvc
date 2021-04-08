<?php

declare(strict_types=1);

namespace Mos\Controller;

//use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

use function Mos\Functions\renderView;

/**
 * Controller for the index route.
 */
class Index 
{
    use ControllerTrait;

    public function __invoke(): ResponseInterface
    {
        $data = [
            "header" => "Index page",
            "message" => "Hello, this is the index page, rendered as a layout -nice.",
        ];

        $body = renderView("layout/page.php", $data);

        return $this->response($body);
    }
}
