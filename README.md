# Unnamed CMS
This repository serves for storing temporary public releases of Unnamed CMS and NOT for development. To develop this CMS we are using private repository with limited access.  
## Installation
**1)** Edit ```.env``` file located in the root folder.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 // Database host
DB_PORT=3306 // Database port 
DB_DATABASE=laravel // Database name
DB_USERNAME=root // Database User
DB_PASSWORD= // Database User password
```
First connection will be used to store tables related to the CMS. 

After configuring first connection, you need to edit config details for other 3 connections ```DB_WORLD_CONNECTION```, ```DB_CHARACTERS_CONNECTION``` and ```DB_AUTH_CONNECTION```  (```world```, ```characters``` and ```auth```) in the same file below.

**2)** Edit ```config/server.php``` file like so:
```
'realms' => array(
      [
          'name' => 'Realm name',
          'ip'   => 'Realm IP (default: 127.0.0.1)', // Convention
          'port' => port (default: 8085)
      ]
    )
```
**3)** Create database with the name you specified in ```.env``` file ```DB_DATABASE``` option (database name is ```laravel``` in this example above). Import ```sql\database.sql``` into the this database.

**4)** Set your ```Apache```, ```WampServer``` or ```OpenServer``` site directory to ```public``` folder.

DONE. If you have any trouble with installing, configuring or using CMS, please create an [Issue](https://github.com/WoWTech/unnamed-cms-releases/issues/new)

### Setup Administrator user
By default, every registered user gets ```user``` role. One user can have many roles. For example, administrator is a user, that has ```user```, ```moderator``` and ```administrator``` roles attached. 

Currently, we don't have any automatic setup for FIRST administrator account, so to setup first site administrator account, you need manually edit database (you need to use software like HeidiSQL or other to view and edit database):

1) Register user using ```Register``` button or http://localhost/register link.

2) Open the database, that you created in the 3rd step of installation instructions above (in this example it's called ```laravel```).

2) Open ```account_role``` table and add 2 new lines (normally, when you registered new user, first record in this table must already persisted in your database, so you can use it as a template, and only change ```role_id``` column)

| role_id       | account_id           | user_type   |
| ------------- |:--------------------:| -----------:|
| 3             | (created account ID) | App\Account |
| 2             | (created account ID) | App\Account |
| 1             | (created account ID) | App\Account |

If you completed all this steaps above successfully, you should see red ```Control panel``` button in the sidebar (right side of the screen). As long as you already have the user with ```administrator``` role, you can change roles for other users in the admin panel, which is available at the http://localhost/admin . Or you can access it by clicking the red ```Control panel``` button.

**NOTE:** After assigning roles through the database, you need to re login.
