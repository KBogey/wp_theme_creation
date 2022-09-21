<?php
/**
* Add integrity and crossorigin to bootstrap cdn stylesheet
*
* @param $link_element - Element HTML link
* @param $handle - Stylesheet name (handle)
* @param $url - Stylesheet url
*
* @return string - filtered Link element
*
* @since 1.0.0
*/
function ch_add_attributes_to_bootstrap_stylesheet($link_element, $handle, $url) : string {
//    var_dump($handle); die;
if ( $handle === "bootstrap") {
$integrity_token = 'sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT';
return str_replace(
"href='$url'",
"href='$url' integrity='$integrity_token' crossorigin='anonymous'",
$link_element
);
}
return $link_element;

}

/**
* Add integrity and crossorigin to bootstrap cdn script
*
* @param $script_element - Element script
* @param $handle - Script name (handle)
* @param $src - Script url
*
* @return string - filtered script element
*
* @since 1.0.0
*/
function ch_add_attributes_to_bootstrap_script($script_element, $handle, $src) : string {
if ( $handle === "bootstrap") {
$integrity_token = 'sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8';
return str_replace(
"src='$src'",
"src='$src' integrity='$integrity_token' crossorigin='anonymous'",
$script_element
);
}
return $script_element;
}