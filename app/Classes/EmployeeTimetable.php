<?php

namespace App\Classes;

class EmployeeTimetable
{
    private string $employeeId;
    private array $mondayTimetable;
    private array $tuesdayTimetable;
    private array $wednesdayTimetable;
    private array $thursdayTimetable;
    private array $fridayTimetable;

    public function __construct(
        string $employeeId,
        array $mondayTimetable,
        array $tuesdayTimetable,
        array $wednesdayTimetable,
        array $thursdayTimetable,
        array $fridayTimetable,
    ) {
        $this->employeeId = $employeeId;
        $this->mondayTimetable = $mondayTimetable;
        $this->tuesdayTimetable = $tuesdayTimetable;
        $this->wednesdayTimetable = $wednesdayTimetable;
        $this->thursdayTimetable = $thursdayTimetable;
        $this->fridayTimetable = $fridayTimetable;
    }

    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    public function setEmployeeId(string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    public function setMondayTimetable(array $mondayTimetable): void
    {
        $this->mondayTimetable = $mondayTimetable;
    }

    public function setTuesdayTimetable(array $tuesdayTimetable): void
    {
        $this->tuesdayTimetable = $tuesdayTimetable;
    }

    public function setWednesdayTimetable(array $wednesdayTimetable): void
    {
        $this->wednesdayTimetable = $wednesdayTimetable;
    }

    public function setThursdayTimetable(array $thursdayTimetable): void
    {
        $this->thursdayTimetable = $thursdayTimetable;
    }

    public function setFridayTimetable(array $fridayTimetable): void
    {
        $this->fridayTimetable = $fridayTimetable;
    }

    public function getMondayTimetable(): array
    {
        return $this->mondayTimetable;
    }

    public function getTuesdayTimetable(): array
    {
        return $this->tuesdayTimetable;
    }

    public function getWednesdayTimetable(): array
    {
        return $this->wednesdayTimetable;
    }

    public function getThursdayTimetable(): array
    {
        return $this->thursdayTimetable;
    }

    public function getFridayTimetable(): array
    {
        return $this->fridayTimetable;
    }
}
