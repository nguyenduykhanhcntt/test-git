<?php

namespace Core;

function replaceCurlyBraces($template, $data = [])
{
    return preg_replace_callback("#{([A-Za-z0-9\_]+)}#", function ($matches) use ($data) {

        if (empty($data['default'])) {
            $data['default'] = '**';
        }

        /**
         * Always return $matches[0] and $matches[1] with above regex
         */
        return !empty($data[$matches[0]]) ? $data[$matches[0]] : (!empty($data[$matches[1]]) ? $data[$matches[1]] : $data['default']);

    }, $template);
}

function isConsole()
{
    return (php_sapi_name() === 'cli');
}