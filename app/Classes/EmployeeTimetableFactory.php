<?php

namespace App\Classes;

class EmployeeTimetableFactory
{
    public function createEmployeeTimetable(array $timetable, string $employeeId): EmployeeTimetable
    {
        $monday = $timetable['Monday'] ?? [];
        $tuesday = $timetable['Tuesday'] ?? [];
        $wednesday = $timetable['Wednesday'] ?? [];
        $thursday = $timetable['Thursday'] ?? [];
        $friday = $timetable['Friday'] ?? [];

        return new EmployeeTimetable($employeeId, $monday, $tuesday, $wednesday, $thursday, $friday);
    }
}
