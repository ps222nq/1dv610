#1DV610: Login with PHP

##About this repo   
This repository was created for the course 1DV610: Introduction to Software Quality at Linnaeus University, 
Sweden, by Pepyn Swagemakers.   
It contains a login module written in PHP according to the MVC principle, with extra focus on writing good quality code.  
For the definition of "good quality code" please refer to the book Clean Code by Robert C. Martin

##About the assignment
You can find the assignment [here](https://coursepress.lnu.se/kurs/introduktion-till-mjukvarukvalitet/assignments/a4-requirements-and-code-quality/)   
Other important documents are the [Use Cases](https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/UseCases.md) and 
its corresponding [Test Cases](https://github.com/dntoll/1dv610/blob/master/assignments/A2_resources/TestCases.md).

##Status of the implementation
Currently most of the functionality has been implemented.   
Use cases not implemented are:
 * UC3 Authentication with saved credentials
   
Aside from this, the database is currently not yet implemented but uses a placeholder interface instead 
so the rest of the code can work as if the Database is actually working. This is a strategy suggested in Robert C Martins
book Clean Code (chapter 8).  
   
An improvement that could be made is decreasing the use of the $_POST even further by separating request data into
an own class in the model namespace.   

##Testing this application
You may manually test this application for yourself by downloading the code and running it on your own machine (see below).
You will need to add a file named "DBSettings.php" with a password and username that will result in a correct login.

Automated unit tests can be run by entering the URL of a live version, as well as a demo password and username,
 for the application at http://csquiz.lnu.se:82 

##Using this code
The easiest way to run this code would be to use a local server running Apache/MySQL/PHP such as 
MAMP (for Mac users) or WAMP Server (for Windows users). Download the code from GitHub, place it in the directory where 
your local server runs, and go to http://localhost:8888.   

Alternatively, upload the code to a server that allows you to run PHP apps.

