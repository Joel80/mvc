<?php

declare(strict_types=1);

namespace Mos\Router;

use Jolf20\Dice\Game;

use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};

/**
 * Class Router.
 */
class Router
{
    public static function dispatch(string $method, string $path): void
    {
        if ($method === "GET" && $path === "/") {
            $data = [
                "header" => "Index page",
                "message" => "Hello, this is the index page, rendered as a layout.",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session") {
            $body = renderView("layout/session.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/session/destroy") {
            destroySession();
            redirectTo(url("/session"));
            return;
        } else if ($method === "GET" && $path === "/debug") {
            $body = renderView("layout/debug.php");
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/twig") {
            $data = [
                "header" => "Twig page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderTwigView("index.html", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/some/where") {
            $data = [
                "header" => "Rainbow page",
                "message" => "Hey, edit this to do it youreself!",
            ];
            $body = renderView("layout/page.php", $data);
            sendResponse($body);
            return;
        } else if ($method === "GET" && $path === "/dice") {
            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : new Game();
            $callable->playGame();
            return;
        } else if ($method === "POST" && $path === "/dice-setup") {
            /* echo "POST ";
            var_dump($_POST); */

            $nrOfDice = intval($_POST["dice"]);

            $typeOfDice = ($_POST["diceType"]);

            $bet = isset($_POST["bet"]) ? intval($_POST["bet"]) : 0;

            $sides = isset($_POST["sides"]) ? intval($_POST["sides"]) : null;

            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

            if ($callable) {
                $callable->setup($nrOfDice, $typeOfDice, $bet, $sides);
            }

            redirectTo(url("/dice"));
             return;
        } else if ($method === "POST" && $path === "/dice-player-roll") {
            /* echo "POST ";
            var_dump($_POST); */

            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

            if ($callable) {
                $callable->playerRoll();
            }
            redirectTo(url("/dice"));
             return;
        } else if ($method === "POST" && $path === "/dice-player-stop") {
            /* echo "POST ";
            var_dump($_POST); */

            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

            if ($callable) {
                $callable->computerRoll();
            }

            redirectTo(url("/dice"));
            return;
        } else if ($method === "POST" && $path === "/dice-play-again") {
            /* echo "POST ";
            var_dump($_POST); */

            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

            if ($callable) {
                $callable->playAgain();
            }

            redirectTo(url("/dice"));
            return;
        } else if ($method === "POST" && $path === "/dice-reset-score") {
            echo "POST ";
            var_dump($_POST);

            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

            if ($callable) {
                $callable->resetScore();
            }

            redirectTo(url("/dice"));
            return;
        } else if ($method === "POST" && $path === "/dice-reset-bitcoins") {
            /* echo "POST ";
            var_dump($_POST); */

            $callable = isset($_SESSION["game"]) ? $_SESSION["game"] : null;
            if ($callable) {
                $callable->resetBitCoins();
            }

            redirectTo(url("/dice"));
            return;
        }

        $data = [
            "header" => "404",
            "message" => "The page you are requesting is not here. You may also checkout the HTTP response code, it should be 404.",
        ];
        $body = renderView("layout/page.php", $data);
        sendResponse($body, 404);
    }
}
