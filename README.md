# internFYI

a WAD2 project
by G5T2: 
eunjin.kim.2020@scis.smu.edu.sg
megan.thong.2020@scis.smu.edu.sg
patricialoi.2020@scis.smu.edu.sg
tianyu.chen.2020@scis.smu.edu.sg

## Heroku Deployment

Please visit: https://intern-fyi.herokuapp.com/HTML/home.php

*No setup is required, you can use the link above on any device.

You may use this existing account, with login and password as follows: <br>
    Email: mokkie@smu.edu.sg <br>
    Password: <3YouProfPleaseGiveUsA+++


Because we are using the free version of Heroku, the app goes to 'sleep' if there are no visitors to the page after 30 minutes. Hence, the website may load slowly upon your first visit. Subsequently, it will be much faster. 
    
Note that composer was installed (hence the presence of composer.json and composer.lock files in the directory). This was due to requirements for deploying on heroku. Our application uses the php buildpack from Heroku, and JawsDB MySQL add-on for our database.

---

## Local Deployment 
Alternatively you can deploy locally:

1. Download files, and make sure it is in the correct folder in WAMP/MAMP to be run on localhost
2. load database/internFYI.sql into phpmyadmin, followed by database/load test.sql (requires sql to run stored procedures and triggers)
3. Make sure the ConnectionManager.php in processDbRequest/model is referencing the correct host, port, and password (for Mac)
4. all files, excluding sql files in /database, must be hosted for php to run

Users who are not logged in are not allowed to write reviews.

Thank you.
