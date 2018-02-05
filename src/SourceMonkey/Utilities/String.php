<?php

namespace WebSpanner\SourceMonkey\Utilities;

class String
{
    /**
     * Returns true if the string contains a property with an opening square brace
     *
     * @param string
     * @return bool
     **/
    public function containsPropertyDeclaration($string)
    {
        return preg_match('/.*((protected)|(public)|(private))\s\$[a-z]+\s=/', $string);
    }

    public function getStringBetween($string, $startString, $endString)
    {
        
    }
}
