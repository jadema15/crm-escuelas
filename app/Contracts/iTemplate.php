<?php

namespace App\Contracts;

interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}
