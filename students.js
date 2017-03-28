// Dunno if works

function getClickableLinks($profiletext) {
    $regex = '/(((http|https|ftp|ftps)\:\/\/)|(www\.))[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\:[0-9]+)?(\/\S*)?/';
    return preg_replace_callback($regex, function ($matches) {
        return "".$matches[0]."";
    }, $profiletext);
}