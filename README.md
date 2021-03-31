# oc_cli
Extension for OpenCart allowing it to run in command line mode. Allows the user to run admin and/or catalog controllers directly through the command line. Admin authentication is bypassed.

This extension can help you develop OpenCart controllers which can be run directly from the command line with ease.

System Requirements
--------------
- UNIX server (oc_cli has not been tested on Windows yet)
- OpenCart 2.2.0.0 to OpenCart 2.3.0.2
- Opencart 3 - Just remove /system/config/oc_cli.php then rename /system/config/oc_cli_3.php to /system/config/oc_cli.php
- Command line access to `php`. You can see if you have it by running `which php`
- "cli" PHP Server API (SAPI)

Installation
--------------
Just copy everything from the /upload directory to your OpenCart root directory. No original OpenCart files will be overwritten.

Make sure to add execute permissions to the file oc_cli.php:

```
$ chmod +x ./oc_cli.php
```

That's all!

How it works
--------------
oc_cli introduces a new file in your OpenCart root directory: `oc_cli.php`. All you need to do is run this file from your command line with the appropriate parameters. A simple command looks like this:

```
$ php ./oc_cli.php [APP] [ROUTE] [param1] [param2] ...
```

**[APP]** stands for the application you will run. It can take exactly one of the following values:
- *catalog* : this will run **[ROUTE]** from your front-end OpenCart catalog
- *name-of-admin-dir* : this will run **[ROUTE]** in your admin panel

**[ROUTE]** : the route you wish to execute, for example: `oc_cli/welcome`

**[param1]**, **[param2]** : Optional parameters which you may pass to your controllers.

###### What about admin panel authentication?
This is not necessary. oc_cli allows you to run admin panel controllers without requiring a login to the admin panel. This allows you to run admin controllers with ease.

###### Some examples:

```
$ php ./oc_cli.php catalog common/home/test
$ php ./oc_cli.php admin module/test/cron_task
$ php ./oc_cli.php catalog oc_cli/welcome/hello FooBar
```

Tips and tricks for developers
--------------------------
1. Note that oc_cli defines a constant called **OPENCART_CLI_MODE** which can be a boolean TRUE/FALSE. You can use this constant in your custom controllers to check if you are running in CLI mode. We strongly suggest you implement such a check in your controllers if you wish to avoid direct access from a web browser.

2. As you see from the examples above, the entry point is a simple PHP file. To simplify your command line experience, you can create a BASH wrapper.

3. oc_cli introduces the function `oc_cli_output`. This function can be used to output your CLI messages. It may also exit with a status code if necessary.

```
string oc_cli_output ( string $message [, int $exit_status = NULL] )
```
Parameters:

**$message**
The message you need to echo in the command line.

**$exit_status**
If set to a value different than NULL, it will terminate the process with the PHP `exit` function and the status number which you provide.

License
--------------
The MIT License (MIT)

Copyright (c) 2016 iSenseLabs

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.


