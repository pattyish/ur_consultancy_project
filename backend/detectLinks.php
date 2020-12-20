<?php
function turnUrlIntoHyperlink($string){
    //The Regular Expression filter
    $reg_exUrl = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

    // Check if there is a url in the text
    if(preg_match_all($reg_exUrl, $string, $url)) {

        // Loop through all matches
        foreach($url[0] as $newLinks)
        {
            if(strstr( $newLinks, ":" ) === false)
            {
                $link = 'http://'.$newLinks;
            }
            else
            {
                $link = $newLinks;
            }

            // Create Search and Replace strings
            $search  = $newLinks;
            $replace = '<span style="color :blue;"><h6>HelloFriendz link:</h6></span> <a href="'.$link.'" title="'.$newLinks.'" target="_blank" style="color: #6e3c7d;"><b>'.$link.'</b></a>';
            $string = str_replace($search, $replace, $string);
        }
    }

    //Return result
    return $string;
}

?>