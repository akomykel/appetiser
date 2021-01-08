<?php
namespace App\Repositories;

use App\Models\Event;

class EventRepository implements EventInterface
{
    public function createEvent($request) {
        $event = new Event();
        $event->eventTitle = $request->eventTitle;
        $event->dateFrom = $request->dateFrom;
        $event->dateTo = $request->dateTo;
        $event->days = $request->days;
        $event->save();
        return $event;
    }

    public function listEvents() {
        $events = Event::all();
        return $events;
    }
}