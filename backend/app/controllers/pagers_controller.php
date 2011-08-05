<?php
class PagesController extends AppController {
    public function view() {
        // Your normal pages
    }

    public function homepage() {
        $posts = ClassRegistry::init('Post')->find('all');
        $this->set(compact('posts'));
    }
}
