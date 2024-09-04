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
    // Metode untuk membuat event baru
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

    // Metode untuk mendapatkan semua event
    public static function getAllEvents($koneksi)
    {
        $query = "SELECT * FROM event";
        $result = mysqli_query($koneksi, $query);

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

    // Metode untuk mendapatkan event berdasarkan ID
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

    // Metode untuk mengupdate event
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

    // Metode untuk menghapus event
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
