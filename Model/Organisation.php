<?php

namespace Model;
class Organisation
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone;
    private string $address;
    private int $sponsorID;

    /**
     * @param int $id id of the organisation
     * @param string $name name of the organisation
     * @param string $email email of the organisation
     * @param string $phone phone number of the organisation
     * @param string $address address of the organisation
     * @param int $sponsorID id of the sponsor of the organisation
     */
    public function __construct(int $id, string $name, string $email, string $phone, string $address, int $sponsorID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->sponsorID = $sponsorID;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getSponsorID(): int
    {
        return $this->sponsorID;
    }

    /**
     * @param int $sponsorID
     */
    public function setSponsorID(int $sponsorID): void
    {
        $this->sponsorID = $sponsorID;
    }


}