# StudentAPI

### Getting Started

#### Inital Setup for XAMPP - this can be skipped if already have it.

First you must make sure you have all required dependencies to run this API. If you don't have XAMPP installed, first install it at ``https://www.apachefriends.org/index.html``

#### Setting up API on localhost

After it is installed and opened, you can hit ``Start`` beside both Apache and MySQL.

Next you will need to clone this repo to get the source code, please ensure you clone it into the correct folder. You should make sure you first open ``C:\xampp\htdocs`` and clone it in there

```
git clone https://github.com/JesseHarasym/StudentAPI.git
```

The StudentAPI folders name can be changed to whatever you want your initial API route to be. 

**Nisha, if you are using the zip file provided, please change 'StudentAPI' to 'Assignment1' whenever referenced.**

#### Setting up MySQL Database

You must import our sql files if you don't want to create your own data. This can be found under the ``mysql_db`` folder, the file name for our data is ``student.sql``. You can open up ``http://localhost/phpmyadmin/``, create a database named ``students`` and then hit the ``import`` button , find the data file specified earlier and then hit ``Go``. After it has successfully finished importing, you're ready to start using the API.

### Using the API

Now you can use the API, there are currently three routs setup: get_students.php, get_student.php?=id, insert_student.php. All get requests will return data in the form of a JSON object.

#### Get all student data

In order to access all the student data available you can go to the route ``http://localhost/assignment1/get_students.php``.

#### Get student data by id

In order to access a student by their id you can go to the route ``http://localhost/assignment1/get_student.php?id=1`` replacing 1 with whatever id you would like to search.

#### Add student to the database

In order to add with the GUI you must navigate to the route ``http://localhost/assignment1/insert_student.php``. From there you may fill out the form and hit ``Create``

In order to add with the URL route you must navigate to the route ``http://localhost/assignment1/insert_student_url.php`` in postman, and add the parameters as needed. You must specify student_name, student_age and student_number in order to add a student.

### Contributers
- Jesse Harasym-Conrod
- Andre Albuquerque 
- Andrew Miller

### Built With

- Apache
- PHP
- MySQL