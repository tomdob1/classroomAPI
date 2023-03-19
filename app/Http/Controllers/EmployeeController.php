<?php

namespace App\Http\Controllers;

use App\Classes\wondeClient\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Wonde\Endpoints\Schools;
use Wonde\Exceptions\InvalidTokenException;

class EmployeeController extends Controller
{
    private const MONDAY = 'monday';
    private const TUESDAY = 'tuesday';
    private const WEDNESDAY = 'wednesday';
    private const THURSDAY = 'thursday';
    private const FRIDAY = 'friday';

    private Schools $school;

    /**
     * @throws InvalidTokenException
     */
    public function __construct()
    {
        $this->school = Client::getWondeClient()->school(env('WONDE_SCHOOL_ID'));
    }

    public function getEmployees(): Factory|View|Application
    {
        $employees = $this->school->employees->all(['classes']);

        return view('employees', [
            'employees' => $employees
        ]);

    }

}
