<?php

namespace WebSpanner\SourceMonkey\Models;

class Str
{
    protected $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function __toString()
    {
        return $this->string;
    }

    /**
     * Returns true if the string contains a property with an opening square brace
     *
     * @return bool
     **/
    public function containsPropertyDeclaration()
    {
        return preg_match('/.*((protected)|(public)|(private))\s\$[a-z]+\s=/', $this->string);
    }

    public function getVariableName()
    {
        preg_match('/\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', $this->string, $matches);

        return $matches[1];
    }
}

