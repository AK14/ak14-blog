<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Facades\Calendar as Madd_Calendar;
use MaddHatter\LaravelFullcalendar\Event;
use MaddHatter\LaravelFullcalendar\IdentifiableEvent;

class Calendar extends Madd_Calendar
{

}

class EventModel extends Model implements Event, IdentifiableEvent
{
    protected $dates = ['start','end'];

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
      return $this->end;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param array $dates
     * @return EventModel
     */
    public function setDates($dates)
    {
        $this->dates = $dates;
        return $this;
    }
}

class CalendarEvent extends Model implements Event
{
    public function getEventOptions()
    {
        return[
            'color'=>$this->background_color
        ];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

}

