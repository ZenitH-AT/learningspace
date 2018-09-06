# learningspace
Accommodation Website project for ITSP200 - 2018

A student accomodaition website with full user and admin features.

The **learningspace** and **learningspaceadmin** folders contain templates for the final system (use these for an idea of what your solution should look like).

The **learningspacefinal** folder contains what you will need to run the project. To run the project:
- Start the MySQL server with XAMPP and import **accomodation.sql** to your MySQL server.
- Unzip **live-chat.zip** and follow the README, then start the Apache server in XAMPP.
- Navigate to the "livechat" folder and run app.js through a command line using the "node app.js" command.
- Place the **AccSystem** folder in your NetBeans project folder located at "C:\xammp\htdocs\project".
- Connect to the website using NetBeans or simply by going to "http://localhost:8080/project/AccSystem/public/HomePage.php".

The live chat system (port 8088) is external, so you need to add **allow_url_include = 1** to your php.ini file on your Apache server. In order for it to work correctly, you may need to change your Apache server's port to 8080 in httpd.conf.

You will require a running Redis server to use the live chat subsystem.

If you aren't using port 8080, you will need to remove it from the activation email link in functions.php and change all port 8080 instances in the live chat subsystem.
