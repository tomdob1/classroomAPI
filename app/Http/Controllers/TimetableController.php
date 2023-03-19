<?php

namespace App\Http\Controllers;

use App\Classes\Services\TimetableService;
use App\Classes\wondeClient\Client;
use Exception;
use Wonde\Endpoints\Schools;

class TimetableController
{
    private const TIMETABLE_MONDAY = 'Monday';
    private const TIMETABLE_TUESDAY = 'Tuesday';
    private const TIMETABLE_WEDNESDAY = 'Wednesday';
    private const TIMETABLE_THURSDAY = 'Thursday';
    private const TIMETABLE_FRIDAY = 'Friday';

    private TimetableService $timetableService;
    private Schools $school;

    /**
     * @throws \Wonde\Exceptions\InvalidTokenException
     */
    public function __construct(
        TimetableService $timetableService,
    ) {
        $this->school = Client::getWondeClient()->school('A1930499544');
        $this->timetableService = $timetableService;
    }

    /**
     * @throws Exception
     */
    public function getTimetableMonday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable === null || $employeeTimetable->getEmployeeId() !== $employeeId) {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
        }

        $monday = $employeeTimetable->getMondayTimetable();
        $employeeName = $employeeTimetable->getEmployeeName();

        return view('timetable', [
            'day' => self::TIMETABLE_MONDAY,
            'timetable' => $monday,
            'employeeId' => $employeeId,
            'employeeName' => $employeeName,
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableTuesday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable === null || $employeeTimetable->getEmployeeId() !== $employeeId) {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
        }

        $tuesday = $employeeTimetable->getTuesdayTimetable();
        $employeeName = $employeeTimetable->getEmployeeName();

        return view('timetable', [
            'day' => self::TIMETABLE_TUESDAY,
            'timetable' => $tuesday,
            'employeeId' => $employeeId,
            'employeeName' => $employeeName,
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableWednesday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable === null || $employeeTimetable->getEmployeeId() !== $employeeId) {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
        }

        $wednesday = $employeeTimetable->getWednesdayTimetable();
        $employeeName = $employeeTimetable->getEmployeeName();

        return view('timetable', [
            'day' => self::TIMETABLE_WEDNESDAY,
            'timetable' => $wednesday,
            'employeeId' => $employeeId,
            'employeeName' => $employeeName,
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableThursday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable === null || $employeeTimetable->getEmployeeId() !== $employeeId) {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
        }

        $thursday = $employeeTimetable->getThursdayTimetable();
        $employeeName = $employeeTimetable->getEmployeeName();

        return view('timetable', [
            'day' => self::TIMETABLE_THURSDAY,
            'timetable' => $thursday,
            'employeeId' => $employeeId,
            'employeeName' => $employeeName,
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableFriday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable === null || $employeeTimetable->getEmployeeId() !== $employeeId) {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
        }

        $friday = $employeeTimetable->getFridayTimetable();
        $employeeName = $employeeTimetable->getEmployeeName();

        return view('timetable', [
            'day' => self::TIMETABLE_FRIDAY,
            'timetable' => $friday,
            'employeeId' => $employeeId,
            'employeeName' => $employeeName,
        ]);
    }
}
