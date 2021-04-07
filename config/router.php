<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    return "Testing response";
});

$router->addRoute("GET", "/", "\Mos\Controller\Index");
$router->addRoute("GET", "/debug", "\Mos\Controller\Debug");
$router->addRoute("GET", "/twig", "\Mos\Controller\TwigView");

$router->addGroup("/session", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Mos\Controller\Session", "index"]);
    $router->addRoute("GET", "/destroy", ["\Mos\Controller\Session", "destroy"]);
});

$router->addGroup("/some", function (RouteCollector $router) {
    $router->addRoute("GET", "/where", ["\Mos\Controller\Sample", "where"]);
});

$router->addGroup("/dice", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\Jolf20\Controller\Game21", "playGame"]); 
    $router->addRoute("POST", "/setup", ["\Jolf20\Controller\Game21", "setup"]);
    $router->addRoute("POST", "/player-roll", ["\Jolf20\Controller\Game21", "playerRoll"]);
    $router->addRoute("POST", "/computer-roll", ["\Jolf20\Controller\Game21", "computerRoll"]);
    $router->addRoute("POST", "/play-again", ["\Jolf20\Controller\Game21", "playAgain"]);
    $router->addRoute("POST", "/reset-score", ["\Jolf20\Controller\Game21", "resetScore"]);
    $router->addRoute("POST", "/reset-bitcoins", ["\Jolf20\Controller\Game21", "resetBitCoins"]);
});
