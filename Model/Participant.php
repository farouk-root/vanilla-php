<?php

namespace Model;
class Participant
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private int $eventID;

    /**
     * @param int $id id of the participant
     * @param string $name name of the participant
     * @param string $email email address of the participant
     * @param string $phone phone number of the participant
     * @param int $eventID id of the event the participant is registered to
     */
    public function __construct(int $id, string $name, string $email, string $phone, int $eventID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->eventID = $eventID;
    }

    /**
     * @return int returns the id of the participant
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string returns the name of the participant
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getEventID(): int
    {
        return $this->eventID;
    }

    /**
     * @param int $eventID
     */
    public function setEventID(int $eventID): void
    {
        $this->eventID = $eventID;
    }


}