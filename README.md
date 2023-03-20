

## Classroom API

This application uses the Wonde API to obtain school information on:

- Employees
- Classes
- Lessons
- Students

It displays a list of all the employees present at a school, with the option to view their weekly timetable.

Each Employee timetable will show a breakdown of classes, and the students within each class for each day of the week.

## Assumptions
**For the user story:**

- As a Teacher I want to be able to see which students are in my class each day
  of the week so that I can be suitably prepared

**Going into this task my assumption were as follows:**

- A teacher is an employee at the school
- The teachers top priority of the feature is to see which students are in their class each day of the week.
- The time at which the classes start is not a concern for the teachers.

## How To Run This Application

To run the application please setup a .env file for this project and add in your unique credentials for the following environment variables:

- WONDE_CLIENT_KEY
- WONDE_SCHOOL_ID

The WONDE_CLIENT_KEY will grant you access to the WONDE API.
The WONDE_SCHOOL_ID will be used to provide information on the relevant school.

**Starting the application:**

To start the application please navigate to the file directory in terminal and input:

`php artisan serve`

Once the process is complete, go to your web browser of choice and input [http://127.0.0.1:8000/](http://127.0.0.1:8000/) to view the homepage.

## Future Improvements

If I were to improve this application
