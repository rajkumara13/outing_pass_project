VECT MENS HOSTEL OUTING PASS SYSTEM
Hey there!  This is a simple but effective web-based system I built to help manage student outings from VECT Men's Hostel. The main goal was to create an easy way for students to log when they leave and when they return, keeping everything organized in one place.

What's Inside (Key Features)
This little project has a few core features that make it work:

Outing Pass Form: Students can fill out a simple form with their details and the reason for their outing. It's designed to be quick and straightforward.

Time Tracking: The system automatically records the exact date and time a student leaves.

Easy Arrival Update: When a student returns, they just have to enter their attendance number and the current time to update their record in the database.

Simple & Clean Design: I focused on a no-fuss design so it's easy for anyone to use without any confusion.

The Tech Stack
I built this using some classic web technologies, which are perfect for a project like this:

HTML: The structure of the web pages.

CSS: For styling to make it look clean and modern.

JavaScript: To handle the form submissions dynamically without reloading the page.

PHP: This is the server-side magic that processes the form data.

MySQL: The backend database where all the outing and arrival information is stored.

Getting Started (Setup Guide)
Want to run this on your own machine? It's pretty easy. Just follow these steps:

Set up the Database: First, create a new MySQL database named outing_db. Then, create a table inside it called outing_pass1. You'll want to make sure the columns match the fields in the PHP scripts: student_name, department, year, attendance_no, room_no, purpose, outing_time, and arrival_time.

Get a Local Web Server: You'll need a local server environment like XAMPP or WAMP. If you don't have one, go ahead and install it.

Place the Files: Drop all the project files (outing_pass.html, style.css, submit_outing.php, update_arrival.php) into your web server's root directory (e.g., the htdocs folder in XAMPP).

Connect to the Database: Open submit_outing.php and update_arrival.php. You'll need to change the database connection details ($servername, $username, $password, and $dbname) to match your local setup.

Go Live: Once you've done all that, just open your web browser and go to http://localhost/outing_pass.html to see the application in action.

How to Use It
It's designed to be super intuitive:

For Outings: Fill out the form on the main page with your details. When you hit "Submit Outing," it'll save your information.

For Arrivals: A second form will appear. Just enter your attendance number and the current time. Clicking "Submit Arrival" will update your record in the database, so the hostel can keep track of who's back.

