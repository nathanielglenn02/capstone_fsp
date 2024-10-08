<?php
class Event
{
    /* =======================
       Data Members
    ======================== */
    private $eventId;
    private $eventName;
    private $description; // Foreign key ke Game
    private $date; // Tanggal event

    /* =======================
        Constructors
    ======================== */
    public function __construct($eventId, $eventName, $description, $date)
    {
        $this->eventId = $eventId;
        $this->eventName = $eventName;
        $this->description = $description;
        $this->date = $date;
    }

    /* =======================
       Properties
    ======================== */
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

    /* =======================
       Methods
    ======================== */

    public function createEvent($koneksi)
    {
        $query = "INSERT INTO event (name, description, date) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "sss", $this->eventName, $this->description, $this->date);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }


    public static function getAllEvents($koneksi)
    {
        $stmt = $koneksi->prepare("
            SELECT * from event
        ");
        $stmt->bind_param("sii");
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $events = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $event = new Event($row['idevent'], $row['name'], $row['description'], $row['date']);
            $events[] = $event;
        }

        return $events;
    }
    public static function getAllEventsWithPaging($koneksi, $page = 1, $limit = 5, $search = "")
    {
        $offset = ($page - 1) * $limit;
        $search = "%" . $search . "%";
        $stmt = $koneksi->prepare("
            SELECT * from event
            WHERE name LIKE ?
            LIMIT ?, ?
        ");
        $stmt->bind_param("sii", $search, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $events = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $event = new Event($row['idevent'], $row['name'], $row['description'], $row['date']);
            $events[] = $event;
        }

        return $events;
    }


    public static function getEventById($koneksi, $idevent)
    {
        $query = "SELECT * FROM event WHERE idevent = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "i", $idevent);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $event = new Event($row['idevent'], $row['name'], $row['description'], $row['date']);
        } else {
            $event = null; // Tidak ditemukan
        }

        mysqli_stmt_close($stmt);

        return $event;
    }


    public function updateEvent($koneksi)
    {
        $query = "UPDATE event SET name = ?, description = ?, date = ? WHERE idevent = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "sssi", $this->eventName, $this->description, $this->date, $this->eventId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }


    public function deleteEvent($koneksi)
    {
        $query = "DELETE FROM event WHERE idevent = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "i", $this->eventId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }
}
