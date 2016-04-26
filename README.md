# oc_cli
Extension for OpenCart 2.2 which allows it to run in command line mode. Allows the user to run controllers through the command line for both admin and catalog pages. The admin authentication is bypassed.

System Requirements
--------------
- UNIX server (Recommended, since oc_cli has not been tested on Windows yet)
- OpenCart 2.2

Installation
--------------
Just copy everything from the /upload directory to your OpenCart root directory. No original OpenCart files will be overwritten.

That's all!

How it works
--------------
oc_cli introduces a new file in your OpenCart root directory: `oc_cli.php`. All you need to do is run this file from your command line with the appropriate parameters. A simple command looks like this:

```
./oc_cli.php [APP] [ROUTE]
```

**[APP]** stands for the application which you need to run. It can take one of the following values:
- *catalog* : this will run the **[ROUTE]** of your front-end OpenCart catalog
- *<name-of-admin-dir>* : this will run the **[ROUTE]** of your admin panel

###### What about admin panel authentication?
This is not needed. oc_cli allows you to run admin panel controllers without requiring a login to the admin panel. This allows you to run admin controllers with ease.
