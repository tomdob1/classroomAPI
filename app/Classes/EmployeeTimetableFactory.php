<?php

namespace App\Classes;

class EmployeeTimetableFactory
{
    public function createEmployeeTimetable(array $timetable, string $employeeId, string $employeeName): EmployeeTimetable
    {
        $monday = $timetable['Monday'] ?? [];
        $tuesday = $timetable['Tuesday'] ?? [];
        $wednesday = $timetable['Wednesday'] ?? [];
        $thursday = $timetable['Thursday'] ?? [];
        $friday = $timetable['Friday'] ?? [];

        return new EmployeeTimetable($employeeId, $employeeName, $monday, $tuesday, $wednesday, $thursday, $friday);
    }
}
