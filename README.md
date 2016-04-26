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
./oc_cli.php **<app>** **<route-to-controller>**
```
