<?php
class Member
{

    /* =======================
       Data Members
    ======================== */
    private $idMember;
    private $firstName;
    private $lastName;
    private $username;
    private $password;
    private $profile; // enum ('admin', 'member')


    /* =======================
        Constructors
    ======================== */
    public function __construct($idMember, $firstName, $lastName, $username, $password, $profile)
    {
        $this->idMember = $idMember;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
        $this->profile = $profile;
    }

    /* =======================
       Properties
    ======================== */
    public function getIdMember()
    {
        return $this->idMember;
    }

    public function setIdMember($idMember)
    {
        $this->idMember = $idMember;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getProfile()
    {
        return $this->profile;
    }

    public function setProfile($profile)
    {
        $this->profile = $profile;
    }
}
