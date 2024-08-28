<?php
class Event
{
    private $eventId;
    private $eventName;
    private $gameId; // Foreign key ke Game
    private $date; // Tanggal event

    public function __construct($eventId, $eventName, $gameId, $date)
    {
        $this->eventId = $eventId;
        $this->eventName = $eventName;
        $this->gameId = $gameId;
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

    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
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