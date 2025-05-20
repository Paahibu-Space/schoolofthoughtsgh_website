<?php

namespace App\MenuBuilder;

use App\Models\Event;

class MenuBuilderFrontendRender {

    public function render_frontend_footer_events() {
        $output = '';
        $output .= '<ul class="list-unstyled">';
        $all_events = Event::all();
        foreach ($all_events as $event) {
            $output .= '<li class="mb-2"><a href="' . route('frontend.event.show', $event->id) . '" class="text-white text-decoration-none">' . $event->title . '</a></li>';
        }
        $output .= '</ul>';
        return $output;
    }
}