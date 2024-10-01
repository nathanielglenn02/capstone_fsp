<?php
require_once('classEvent.php'); // Tambahkan ini untuk menyertakan class Event

class EventTeams
{
    /* =======================
       Data Members
    ======================== */
    private $eventId;
    private $teamId;

    /* =======================
        Constructors
    ======================== */
    public function __construct($eventId, $teamId)
    {
        $this->eventId = $eventId;
        $this->teamId = $teamId;
    }

    /* =======================
       Properties
    ======================== */
    public function getEventId()
    {
        return $this->eventId;
    }

    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    public function getTeamId()
    {
        return $this->teamId;
    }

    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
    }

    /* =======================
       Methods
    ======================== */

    public function createEventTeam($koneksi)
    {
        $query = "INSERT INTO event_teams (idevent, idteam) VALUES (?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "ii", $this->eventId, $this->teamId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    public static function getEventsByTeam($koneksi, $teamId)
    {
        $query = "SELECT e.* FROM event_teams et 
                  JOIN event e ON et.idevent = e.idevent 
                  WHERE et.idteam = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "i", $teamId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $events = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $event = new Event(
                $row['idevent'],
                $row['name'],
                $row['description'],
                $row['date']
            );
            $events[] = $event;
        }

        mysqli_stmt_close($stmt);

        return $events;
    }

    public static function deleteEventFromTeam($koneksi, $eventId, $teamId)
    {
        $query = "DELETE FROM event_teams WHERE idevent = ? AND idteam = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "ii", $eventId, $teamId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }
}
