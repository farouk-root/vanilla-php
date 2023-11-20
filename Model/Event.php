<?php

namespace Model;

use Cassandra\Date;
use DateTime;

class Event
{
    private int $id;
    private string $name;
    private string $startTime;
    private string $endTime;
    private string $location;
    private string $description;
    private string $registrationDeadline;
    private int $organisationID;
    private int $categoryID;

    /**
     * @param int $id id of the event
     * @param string $name name of the event
     * @param string $startTime start time of the event
     * @param string $endTime end time of the event
     * @param string $location location of the event
     * @param string $description description of the event
     * @param string $registrationDeadline registration deadline of the event
     * @param int $organisationID id of the organizer of the event
     * @param int $categoryID id of the category of the event
     */
    public function __construct(int $id, string $name, string $startTime, string $endTime, string $location, string $description, string $registrationDeadline, int $organisationID, int $categoryID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->location = $location;
        $this->description = $description;
        $this->registrationDeadline = $registrationDeadline;
        $this->organisationID = $organisationID;
        $this->categoryID = $categoryID;
    }

    /**
     * @return int returns the id of the event
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id set the id of the event
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string returns the name of the event
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name set the name of the event
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string returns the start time of the event
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime set the start time of the event
     */
    public function setStartTime(string $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string returns the end time of the event
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * @param string $endTime set the end time of the event
     */
    public function setEndTime(string $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return string returns the location of the event
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location set the location of the event
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string returns the description of the event
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description set the description of the event
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string returns the registration deadline of the event
     */
    public function getRegistrationDeadline(): string
    {
        return $this->registrationDeadline;
    }

    /**
     * @param string $registrationDeadline set the registration deadline of the event
     */
    public function setRegistrationDeadline(string $registrationDeadline): void
    {
        $this->registrationDeadline = $registrationDeadline;
    }

    /**
     * @return int returns the id of the organizer of the event
     */
    public function getOrganisationID(): int
    {
        return $this->organisationID;
    }

    /**
     * @param int $organisationID set the id of the organizer of the event
     */
    public function setOrganisationID(int $organisationID): void
    {
        $this->organisationID = $organisationID;
    }

    /**
     * @return int  returns the id of the category of the event
     */
    public function getCategoryID(): int
    {
        return $this->categoryID;
    }

    /**
     * @param int $categoryID set the id of the category of the event
     */
    public function setCategoryID(int $categoryID): void
    {
        $this->categoryID = $categoryID;
    }


}