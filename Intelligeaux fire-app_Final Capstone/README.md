# Fire App 
## Installation : 
 - Laravel Installation for Windows Users - [Installation](https://youtu.be/2qgS_MCvDfk)
 - Laravel Installation for Mac OS Users  - [Installation](https://youtu.be/DtUY8J2T-mc)

 ## How to use :
> - Clone project and unzip/unrar project.
> - Open project folder with your favorite text editor.
> - Copy, paste and rename the file ``` .env.example``` to ```.env``` in the root directory.
> - Set up Databse from the information gathered from the installation video above.

### Run the following commands to use the application
```
0. composer install
1. php artisan migrate
2. php artisan serve 
3. npm install
4. npm run dev
5. php artisan db:wipe - to drop all tables (delete all tables in database)
6. php artisan migrate:refresh - drop tables and update with new changes in database 
```
### List of Routes
```
0. /admins - Auth pages for admins
1. / - Home page
2. /fire-department/login - Fire department Sign in Page
3. /fire-department/register - Fire department Sign up Page
4. /student/login - Student Sign in Page
5. /student/register - Student Sign up Page
6. /sle/login - Sle Sign in Page
7. /sle/register - Sle Sign up Page
8. /fire-department/dashboard - Fire department dashboard
9. /student/dashboard - Student dashboard
10. /sle/dashboard - Sle dashboard
```

Explanation 

How to Install composer - command 

```composer require laravel/breezee --dev```

Laravel comes wtih an in built authentication and authorization system which is called **breeze** and to install we use the above command. 



