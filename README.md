Project Description
===================

    - You will be creating an API to read and update a table in a MYSQL database. -OK
    - You will be creating an HTML table themed with Bootstrap3 to display data returned from the database. -OK
    - You will be creating a separate button to generate random names and passwords to update the MYSQL table with -OK
    - No PHP can be included in the Codeigniter view. -OK
    - JavaScript must be used to request and update the data with your API. -OK

    - Create a HTML table with id, user_name and password columns -OK
    - Create API method to read list of students from MYSQL table -OK
    - Create API method to update list of students in MYSQL table -OK
    - Fill HTML table with data returned from API read method -OK
    - Create separate HTML button that randomly changes the passwords and user_names and calls the API update method the MYSQL table -OK
    - Commit all your changes to Github for review
    - Use CIUnit to test 'ALL' PHP functionality. (Controllers, Models)
    - Make an initial commit on Github with no changes before you start working on the assignment -OK

Original Project
================

    - [CodeIgniter 2.2.0](https://ellislab.com/asset/ci_download_files/CodeIgniter_2.2.0.zip)
    - [CIUnit 1.2.1](https://github.com/destructivecreator/ciunit-framework)
    - https://github.com/agop/ciunit-framework/archive/master.zip

Project Structure Changes
=========================

Client
------

    - main.js Setups dependencies and modules
    - app.js Declares general useful methods
    - start.js Initializes the initial modules and methods
    - student.js Methods related to the "student" object
    - students.js Methods related to the "students" object

Server
------

    - interfaces/* Provides interface templates for models & controllers to follow
    - libraries/* Provides classes that can be reused in all models & controllers

Considerations
==============

Tests
-----

    - Installed phpunit with composer https://phpunit.de/manual/current/en/installation.html#installation.composer
    - Installed ciunit with composer https://bitbucket.org/kenjis/my-ciunit
    - Modify core codeigniter files as directed by ciunit installation http://www.cuelogic.com/blog/getting-started-with-phpunit-codeigniter/
    - Prepare test database http://d.hatena.ne.jp/Kenji_s/20120117/1326763908

Speed
-----

    - Minification of JS & CSS assets with YUICompressor & Node lessc
    - Asyncronous module loading with requireJS
    - GZIP server compression
    - CDN resource loading to increase client caching probability

Security
--------

    - HSTS headers for forced TLS
    - Remove obsolete cyphers in SSL negotiation
    - HTTP to HTTPS redirection
    - Password hashing with openssl & mcrypt with native PHP 5.6.9
    - Strict JSON communication
    - Restrict endpoint allowed methods to POST, GET (not in server directives, however)

Live Version
-----------

    - Located at www.letsdofunshit.today/test

Todos
=====

    - Finish unit testing
    - Finish setting up phpunit

Credits
=======

    - loading.gif http://preloaders.net/en/science
    - header gradient effect http://www.colorzilla.com/gradient-editor/
    - CSS3 cube https://desandro.github.io/3dtransforms/docs/cube.html
    - overlay pattern http://www.patternify.com

Author
======

   ______      _ ____                             ____
  / ____/_  __(_) / /__  _________ ___  ____     / __ )
 / / __/ / / / / / / _ \/ ___/ __ `__ \/ __ \   / __  |
/ /_/ / /_/ / / / /  __/ /  / / / / / / /_/ /  / /_/ /
\____/\__,_/_/_/_/\___/_/  /_/ /_/ /_/\____/  /_____(_)

