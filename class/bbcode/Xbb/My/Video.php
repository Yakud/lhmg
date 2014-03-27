<?php
// Класс для тега [video]
class Xbb_My_Video extends bbcode
{
     public $behaviour = 'img'; 
 
     function get_html($tree = null)
     {
         $param = htmlspecialchars(parent::get_html($tree)); 
 
         // youtube.com
                 $param = preg_replace('/(http:\/\/|http:\/\/www\.)youtube\.com\/watch\?v=([a-zA-Z0-9_\-]+(.*))/i','<object width="640" height="480"><param name="movie" value="http://www.youtube.com/v/$2&hl=en"></param><param name="wmode" value="opaque"></param><param name="wmode" value="opaque"></param><embed src="http://www.youtube.com/v/$2&hl=en&rel=1" type="application/x-shockwave-flash" wmode="opaque" width="640" height="480"></embed></object>', $param); 
 
         // rutube.ru
         $param = preg_replace('/(http:\/\/|http:\/\/www\.)rutube\.ru\/tracks\/\d+.html\?v=([a-zA-Z0-9_\-]+(.*))/i', '<OBJECT width="640" height="480"><PARAM name="movie" value="http://video.rutube.ru/$2"></PARAM><PARAM name="wmode" value="opaque"></PARAM><PARAM name="wmode" value="window"></PARAM><PARAM name="allowFullScreen" value="true"></PARAM><PARAM name="flashVars" value="uid=662118"></PARAM><EMBED src="http://video.rutube.ru/$2" type="application/x-shockwave-flash" wmode="window" width="640" height="480" allowFullScreen="true" flashVars="uid=662118"></EMBED></OBJECT>', $param);
         
         // vimeo.com
         $param = preg_replace('/(http:\/\/|http:\/\/www\.)vimeo\.com\/([a-zA-Z0-9_\-]+)/i', '<object width="640" height="480"><param name="allowfullscreen" value="true"></param><param name="wmode" value="opaque"></param><param name="allowscriptaccess" value="always"></param><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=$2&server=vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=&fullscreen=1"></param><embed src="http://vimeo.com/moogaloop.swf?clip_id=$2&server=vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=&fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="640" height="480"></embed></object><br />', $param); 
 
         // smotri.com
         $param = preg_replace('/http:\/\/smotri.com\/video\/view\/\?id\=([a-zA-Z0-9_\-]+)(.*)/i', ' <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="640" height="480"><param name="movie" value="http://pics.smotri.com/scrubber_custom8.swf?file=$1&bufferTime=3&autoStart=false&str_lang=rus&xmlsource=http%3A%2F%2Fpics.smotri.com%2Fcskins%2Fblue%2Fskin_color_lightaqua.xml&xmldatasource=http%3A%2F%2Fpics.smotri.com%2Fskin_ng.xml"></param><param name="wmode" value="opaque"></param><param name="allowScriptAccess" value="always"></param><param name="allowFullScreen" value="true"></param><param name="bgcolor" value="#ffffff"></param><embed src="http://pics.smotri.com/scrubber_custom8.swf?file=$1&bufferTime=3&autoStart=false&str_lang=rus&xmlsource=http%3A%2F%2Fpics.smotri.com%2Fcskins%2Fblue%2Fskin_color_lightaqua.xml&xmldatasource=http%3A%2F%2Fpics.smotri.com%2Fskin_ng.xml" quality="high" allowscriptaccess="always" allowfullscreen="true" wmode="window"  width="640" height="480" type="application/x-shockwave-flash"></embed></object>', $param);
         
         // videoradar.ru 
         $param = preg_replace('/(http:\/\/|http:\/\/www\.)videoradar\.ru\/video\/([a-zA-Z0-9_\-]+)\.html/i', '<object width=640 height=480 id=flvplayer align=middle><param name=allowScriptAccess value=always /><param name=allowFullScreen value=true /><param name="wmode" value="opaque"></param><param name=quality value=high /><param name=wmode value=window /><param name=bgcolor value=#ffffff /><param name=movie value="http://videoradar.ru/player/vplayer.swf?v=$2&host=videoradar.ru&logo=http://videoradar.ru/player/logo.png&linkfromdisplay=true&streamscript=lighttpd" /><embed src="http://videoradar.ru/player/vplayer.swf?v=$2&host=videoradar.ru&logo=http://videoradar.ru/player/logo.png&linkfromdisplay=true&streamscript=lighttpd" quality=high wmode=window bgcolor=#ffffff width=640 height=480 name=flvplayer align=middle allowScriptAccess=always allowFullScreen=true type=application/x-shockwave-flash pluginspage=http://www.macromedia.com/go/getflashplayer></embed></object>', $param); 
                 
        return $param;
     }
}
?>