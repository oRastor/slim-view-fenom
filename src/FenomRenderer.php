<?php

namespace Rastor\Slim\View;

use Fenom;
use Psr\Http\Message\ResponseInterface;

class FenomRenderer {

    /**
     * Fenom instance
     * 
     * @var type 
     */
    private $fenom;

    public function __construct(Fenom $fenom) {
        $this->fenom = $fenom;
    }

    /**
     * Get Fenom instance
     * 
     * @return type
     */
    public function getFenom() {
        return $this->fenom;
    }

    /**
     * Render a template
     * 
     * @param ResponseInterface $response
     * @param type $template
     * @param array $data
     * @return \ResponseInterface
     */
    public function render(ResponseInterface $response, $template, array $data = []) {
        $output = $this->getFenom()->fetch($template, $data);
        $response->getBody()->write($output);
        return $response;
    }

}
