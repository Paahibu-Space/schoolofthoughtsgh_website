<?php

function iFrameFilterInSummernoteAndRender($content){
    return str_replace(['{iframe}','{vsrc}','{/iframe}'],['<iframe','src',' frameborder="0" height="360" width="640"></iframe>'],$content);
}

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return \App\Models\WebsiteSetting::getValue($key, $default);
    }
}

function render_frontend_footer_events()
{
    $instance = new \App\MenuBuilder\MenuBuilderFrontendRender();
    return $instance->render_frontend_footer_events();
}