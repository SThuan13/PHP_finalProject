<?php 

function redirect($url, $queryStrings = [])
{
    $queryString = http_build_query($queryStrings);
    return header("location: ".BASE_PATH.$url."?".$queryString);
}

/**
 * Return to previous page
 *
 * @return void
 */
function back()
{
    return header("Location:".$_SERVER['HTTP_REFERER']);
}

/**
 * Render content to view
 *
 * @param [type] $view
 * @param [type] $data
 * @return void
 */
function render($view,$data) {
    extract($data);
    ob_start();
    require('views/'.$view);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}