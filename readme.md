### Laravel Mail App

###Not production ready

This package is an attempt to build an email client based on laravel framework
leveraging on the power of php-imap library.

It might spiral to a full project in the future.

It is still under active development, with tonnes of features missing.

However to install the project for quick view at what its all about:

1. in the root folder of the project create folders ``packages > Tyondo``
2. In the file ``config/app.php`` under the providers array add the line ``Tyondo\Email\TyondoEmailServiceProvider::class,``
3. On the laravel composer file, under the prs-4, below App namespace add the line ``"Tyondo\\Email\\": "packages/tyondo/morpheus/src/"``
4. Run ``composer validate`` to ensure that you have added the line correctly
5. in the folder that you created ``packages > tyondo`` run the command ``git clone https://github.com/Rndwiga/morpheus.git`` to import the project
6. In the root folder of the project (where you have the .env file) run ``php artisan t-email:install`` to install the project
7. In the file ``config/temail.php`` update the following fileds:
````
    'email_user' => 'myemail@gmail.com',
    'email_password' => 'password',
````
do note that i have only tested with gmail

8. in the root folder of the project run ``php artisan serve``
9. once the local server is launched, navigate to ``http://localhost:8000/tyondo/mail`` to view the emails

###Disclaimer

As you have realized, a lot still has to be done. So things will likely to change a lot!
