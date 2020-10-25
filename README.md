# Description

This is an admin website for server-side purposes and will use the REST webservice described in my rest_webservice repo to edit information in the MySQL database.
The project is built with PHP and uses session to log in user to administrate content from the database tables. If the user is not logged in then it will ask the user 
for username and password. At this moment the username and password are hardcoded due to lack of time. But in the future will usernames and passwords be stored in a 
database as well. When logged out the user will be sent back to the home page of the client website. JavaScript and Fetch-method is used to catch data from the REST webservice.

