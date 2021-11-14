# WAD-grpproject

## Heroku Deployment

Please visit: https://intern-fyi.herokuapp.com/HTML/home.php

*No setup is required, you can use the link above on any device.

You may use this existing account, with login and password as follows:
    Email: mokkie@smu.edu.sg
    Password: <3YouProfPleaseGiveUsA+++
    
Note that composer was installed (hence the presence of composer.json and composer.lock files in the directory). This was due to requirements for deploying on heroku. Our application uses the php buildpack from Heroku.

---

## Local Deployment 
Alternatively you can deploy locally:

1. load database/internFYI.sql, followed by database/load test.sql (requires sql to run stored procedures and triggers)
2. Make sure the connection manager.php in processDbRequest/model is referencing the correct host, port, and password (for Mac)
3. all files, excluding sql files in /database, must be hosted for php to run


Users who are not logged in are not allowed to write reviews.

Thank you.
