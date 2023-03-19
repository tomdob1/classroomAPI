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
        $this->school = Client::getWondeClient()->school(env('WONDE_SCHOOL_ID'));
        $this->timetableService = $timetableService;
    }

    /**
     * @throws Exception
     */
    public function getTimetableMonday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable['EmployeeId'] === $employeeId) {
            $monday = $employeeTimetable[self::TIMETABLE_MONDAY];
        } else {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
            $monday = $employeeTimetable->getTuesdayTimetable();
        }

        return view('timetable', [
            'day' => self::TIMETABLE_MONDAY,
            'timetable' => $monday,
            'employeeId' => $employeeId
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableTuesday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable['EmployeeId'] === $employeeId) {
            $tuesday = $employeeTimetable[self::TIMETABLE_TUESDAY];
        } else {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
            $tuesday = $employeeTimetable->getTuesdayTimetable();
        }

        return view('timetable', [
            'day' => self::TIMETABLE_TUESDAY,
            'timetable' => $tuesday,
            'employeeId' => $employeeId
        ]);

    }

    /**
     * @throws Exception
     */
    public function getTimetableWednesday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable['EmployeeId'] === $employeeId) {
            $wednesday = $employeeTimetable[self::TIMETABLE_WEDNESDAY];
        } else {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
            $wednesday = $employeeTimetable->getTuesdayTimetable();
        }

        return view('timetable', [
            'day' => self::TIMETABLE_WEDNESDAY,
            'timetable' => $wednesday,
            'employeeId' => $employeeId
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableThursday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable['EmployeeId'] === $employeeId) {
            $thursday = $employeeTimetable['Thursday'];
        } else {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
            $thursday = $employeeTimetable->getTuesdayTimetable();
        }

        return view('timetable', [
            'day' => self::TIMETABLE_THURSDAY,
            'timetable' => $thursday,
            'employeeId' => $employeeId
        ]);
    }

    /**
     * @throws Exception
     */
    public function getTimetableFriday(string $employeeId)
    {
        $employeeTimetable = session('EmployeeTimetable');
        if ($employeeTimetable['EmployeeId'] === $employeeId) {
            $friday = $employeeTimetable['Friday'];
        } else {
            $employeeTimetable = $this->timetableService->generateEmployeeTimetable($this->school, $employeeId);
            $friday = $employeeTimetable->getTuesdayTimetable();
        }

        return view('timetable', [
            'day' => self::TIMETABLE_FRIDAY,
            'timetable' => $friday,
            'employeeId' => $employeeId
        ]);

    }
}
