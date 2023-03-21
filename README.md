

## Classroom API

This application uses the Wonde API to obtain school information on:

- Employees
- Classes
- Lessons
- Students

The application displays a list of all the employees in the school, with the option to view their weekly timetable.

Each employee timetable will show a breakdown of classes, and the students within each class for each day of the week.

## Assumptions
**For the user story:**

- As a Teacher I want to be able to see which students are in my class each day
  of the week so that I can be suitably prepared.

**Going into this task my assumption were as follows:**

- A teacher is an employee at the school
- The teachers top priority for this feature, is to see which students are in their class each day of the week.

## How To Run This Application

To setup the application please add a .env file for this project and add in your unique credentials for the following environment variables:

- **WONDE_CLIENT_KEY**
- **WONDE_SCHOOL_ID**

The WONDE_CLIENT_KEY will grant you access to the WONDE API.
The WONDE_SCHOOL_ID will be used to provide information on the relevant school.

Run `composer install` to install all the relevant packages for this project (you must have composer installed on your device).

**Starting the application:**

To start the application please navigate to the file directory in terminal and input:

`php artisan serve`

Once the process is complete, go to your web browser of choice and input [http://127.0.0.1:8000/](http://127.0.0.1:8000/) to view the homepage.

## Key Files

### Routes
**routes/web.php** - Stores the routes of the application.<br>

### Controllers
**Controllers/EmployeeController.php** - The controller behind displaying the list of employees. <br>
**Controllers/TimetableController.php** - The controller behind displaying an employee's timetable. <br>

### Classes
**Classes/Service/TimetableService.php** - Used to create an employee timetable for a specific employee.<br>
**Classes/EmployeeTimetable.php** - A class to store all the timetable information for an employee.<br>
**Classes/EmployeeTimetableFactory.php** - A factory class used to create an EmployeeTimetable object.<br>

### Templates
**views/welcome.blade.php** - Main Template used for the website.<br>
**views/employees.blade.php** - Template for displaying employees.<br>
**view/timetable.blade.php** - Template for displaying an employee's timetable.<br>

## Future Improvements

**If I were to improve this application I would focus on the following areas:**

- Sort classes by start time on the timetable.
- Reduce the number of API calls by fetching larger sums of data in one call and mapping data to the relevant employee.
- Use pagination and filtering on the employee page to make it easier to navigate.
- Use pagination on the API to get all the employee information.
- Add JS to hide a class on a timetable, so that the user does not have to scroll to the bottom of the page to view all their classes for the day.

