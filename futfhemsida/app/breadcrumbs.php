<?php

//-----Static breadcrumbs------
Breadcrumbs::register('events', function($breadcrumbs){
   $breadcrumbs->push('Events', route('events'));
});
Breadcrumbs::register('new_event', function($breadcrumbs){
    $breadcrumbs->parent('events');
    $breadcrumbs->push('New Event', route('new_event'));
});
Breadcrumbs::register('event', function($breadcrumbs, $id)
{
    $event = Event::findOrFail($id);
    $breadcrumbs->parent('events');
    $breadcrumbs->push($event->name, route('event', $event->id));
});
Breadcrumbs::register('edit_event', function($breadcrumbs, $id)
{
    $event = Event::findOrFail($id);
    $breadcrumbs->parent('event', $event->id);
    $breadcrumbs->push('Edit', route('edit_event', $event->id));
});


//-----Dynamic breadcrumbs------
Breadcrumbs::register('menu.dyn1', function($breadcrumbs, $page)
{
    $breadcrumbs->push($page->name, url($page->url));
});

Breadcrumbs::register('menu.dyn2', function($breadcrumbs, $page, $page2)
{
    $breadcrumbs->parent('menu.dyn1', $page);
    $breadcrumbs->push($page2->name, url($page2->url));
    //$breadcrumbs->push($page[0]->name, route('menu.dyn', $page[0]->url));
});



