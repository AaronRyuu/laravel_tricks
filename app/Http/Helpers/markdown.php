<?php

use GrahamCampbell\Markdown\Facades\Markdown;

/**
 * 将文本转成markdown
 * @param $str
 * @return mixed
 */
function markdown($str)
{
    return Markdown::convertToHtml($str);
}