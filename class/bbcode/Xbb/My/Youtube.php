<?php
// Класс для тега [youtube]
class Xbb_My_Youtube extends bbcode
{
    public $behaviour = 'img';

    function get_html($tree = null)
    {
        $param = htmlspecialchars(parent::get_html($tree));
        $html = '<object width="425" height="355">'
              . '<param name="movie" value="http://www.youtube.com/v/' . $param
              . '&amp;rel=1"></param>'
              . '<param name="wmode" value="transparent"></param>'
              . '<embed src="http://www.youtube.com/v/' . $param . '&amp;rel=1" '
              . 'type="application/x-shockwave-flash" wmode="transparent" width="425" '
              . 'height="355"></embed>'
              . '</object>';
        return $html;
    }
}