<?php

namespace App\Classes\Services;

use App\Classes\EmployeeTimetable;
use App\Classes\EmployeeTimetableFactory;
use DateTime;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Date;
use Wonde\Endpoints\Classes;
use Wonde\Endpoints\Schools;

class TimetableService
{

    private EmployeeTimetableFactory $employeeTimetableFactory;

    /**
     * @throws Exception
     */

    public function __construct(EmployeeTimetableFactory $employeeTimetableFactory){
        $this->employeeTimetableFactory = $employeeTimetableFactory;
    }

    /**
     * @throws Exception
     */
    public function generateEmployeeTimetable(Schools $school, string $employeeId): EmployeeTimetable
    {
        $this->destroyActiveSession();
        $employee = $school->employees->get($employeeId, ['classes']);
        $classes = $employee->classes->data;
        $timetableArray = $this->mapLessonsToCorrectWeekdays($school, $classes);
        $employeeName = $employee->forename . ' ' . $employee->surname;

        return $this->createAndStoreEmployeeTimetable($timetableArray, $employeeId, $employeeName);
    }

    /**
     * @throws Exception
     */
    private function mapLessonsToCorrectWeekdays(Schools $school, array $classes): array
    {
        $timetableArray = [];
        foreach($classes as $class) {
            $classroomData = $school->classes->get($class->id, ['lessons', 'students']);
            $classDay = [];
            foreach ($classroomData->lessons->data as $lesson) {
                $lessonStartTimeDate = $lesson->start_at;
                if ($lessonStartTimeDate->timezone !== 'UTC') {
                    $this->convertTimeToUTC($lessonStartTimeDate);
                }
                $dayOfTheWeek = date('l', strtotime($lessonStartTimeDate->date));

                if ($this->isClassUniqueForThisWeekday($dayOfTheWeek, $classDay)) {
                    $timetableArray[$dayOfTheWeek][] = $classroomData;
                    $classDay[] = $dayOfTheWeek;
                }
            }
        }

        return $timetableArray;
    }

    /**
     * @throws Exception
     */
    private function convertTimeToUTC($lessonStartTimeDate): DateTime
    {
        $lessonStartTimeDate = new DateTime($lessonStartTimeDate->date);
        $timezone = new \DateTimeZone('UTC');

        return $lessonStartTimeDate->setTimezone($timezone);
    }

    private function isClassUniqueForThisWeekday(string $dayOfTheWeek, $classDay): bool
    {
        return !in_array($dayOfTheWeek, $classDay);
    }

    private function createAndStoreEmployeeTimetable(array $timetable, string $employeeId, string $employeeName): EmployeeTimetable
    {
        $employeeTimetable = $this->employeeTimetableFactory->createEmployeeTimetable($timetable, $employeeId,$employeeName);

        session(['EmployeeTimetable' => $employeeTimetable]);

        return $employeeTimetable;
    }

    private function destroyActiveSession(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
        }
    }
}
