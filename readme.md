## Laravel Subscriber Managment System

System provides an adhoc way of creating a landing page for any new product or services. You can customize landing page from admin panel based on your requirement. Moreover, this system allows you to manage themes of your landing page. Currently system contains two theme 'dark'
and 'light'. You can choose from adming panel.


# Vision #

- A platform to host your Landing Page.


# Install PHP Composer#
```
composer install
```

# Database and Seed #

- Add  Database in mysql with convinent name

- Create the .env file as per .env.example by providing mysql details
    -Database Name
    -User Name
    -Password

- Once .env file is created , database can be migrated
```
 php artisan migrate --seed
 ```


# Run the application #
```
php artisan serve 
```

# Configuration of Email
- Add your Mailgun private key and domain to app/config/mail.php You can make additional settings here if you wishes.


## Admin Logon ##
- There is an admin user already seeded to system. Admin can logon to system from '/admin' route.
   - Default user name is 'user@gmail.com' and password is '123123'

### Admin can do following things:
- Can Manage the Theme
- Change settings of Theme
    - Set Logo for selected theme
    - Set Description
    - Set your own Title & Sub-Title
- View Details of Subscriber

