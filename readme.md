## Laravel Subscriber Managment System

System provides an adhoc way of creating a landing page for any new product or services. You can customize landing page from admin panel based on your requirement. Moreover, this system allows you to manage themes of your landing page. Currently system contains two theme 'dark'
and 'light'. You can choose from adming panel.

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
php artisan serve --port=8000
```


## Admin Dashboard ##
- Follow the Routes file
    - "\admmin" rote will lead to login page for basic auth
    - Admin can login with the User Credential provided in User Table

- Add your Mailgun private key and domain to app/config/mail.php You can make additional settings here if you desire


# Vision #

- A platform to host your Landing Page.


## Admin ##
- Can Manage the Theme
- Change settings of Theme
    - Set Logo for selected theme
    - Set Description
    - Set your own Title & Sub-Title
- View Details of Subscriber



## Subscriber ##
- Gets Subscribed through Subscription form
- Notification for confiramtion  through Mail
- Can Renew or Unsubscribe