<?php
class Event
{
    private $eventId;
    private $eventName;
    private $description; // Foreign key ke Game
    private $date; // Tanggal event

    public function __construct($eventId, $eventName, $description, $date)
    {
        $this->eventId = $eventId;
        $this->eventName = $eventName;
        $this->description = $description;
        $this->date = $date;
    }

    // Getter dan Setter
    public function getEventId()
    {
        return $this->eventId;
    }

    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    public function getEventName()
    {
        return $this->eventName;
    }

    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

}