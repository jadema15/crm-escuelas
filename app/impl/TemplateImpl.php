<?php

namespace App\impl;

use App\Contracts\iTemplate;

class TemplateImpl implements iTemplate
{
    protected $variables = [];

    public function setVariable($posicion, $var)
    {
        $this->variables[$posicion] = $var;
    }

    public function getHtml($template)
    {
        return $template;
    }
}
