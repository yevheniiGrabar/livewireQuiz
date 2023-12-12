# Laravel + Livewire Survey Website

This Laravel project, powered by Livewire and Breeze, allows logged-in users to collect simple surveys for different
types, such as students and teachers.

## Features

- View a table called "types" with fields ID and NAME. Two default types are available: Students and Teachers.
- See a table named "surveys" that can be associated with a single type. Surveys consist of ordered questions supporting
  various types like text inputs, multiple checkboxes, dropdowns, etc.
- Default surveys:
    - For Students: "Year of Admission" (Number Input), "AVERAGE SCORE" (Dropdown - "60-74", "75-89", "90-100")
    - For Teachers: "Degree" (Text Input), "Lessons" (Checkbox - "Math", "Literature", "Philosophy")
- Create entries in a table called "Units of Analysis" with fields "User_id," "Type_id," and "Title." Users can create
  new entries using a modal, and the results are displayed in a table with columns: "User," "Title," "Action."
- The "Action" column has a link that opens a modal called "Survey," displaying the survey associated with the "Unit of
  Analysis." Users can fill out a form with questions from the survey and save the results.
- After saving the survey form, the results are stored in the "Submissions" table with fields "UOA_ID" (Foreign Key for
  the table "unit_of_analysis") and "JSON" (answers in JSON format).
- If a unit of analysis has a related survey submission, it is displayed when opening the UOA modal.

## Installation

   ```bash
   git clone https://github.com/yevheniiGrabar/survey-website.git
    cd survey-website
    composer install
    npm install && npm run dev
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan serve
   ```


