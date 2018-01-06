# bot-soutenance

#### This application allows you to contact many students for mentoring session, first session or exam session

### Installation

Clone [the project](https://github.com/ismail1432/bot-soutenance.git/)

Move to directory

``$ cd path/to/directory ``

Install the [Composer](https://getcomposer.org/download/) and run 

`$ php composer.phar install`

Create an import directory that will store you csv file
`$ mkdir import`

open the .env file and configure it with your database credentials

``$ vi .env``

DATABASE_URL=mysql://root:root@127.0.0.1:8889/bot_soutenance

`$ php bin/console doctrine:database:create`

`$ php bin/console doctrine:schema:update -f`

This application have 3 kinds of message, they are [here](https://github.com/ismail1432/bot-soutenance/blob/master/src/DataFixtures/MessageFixtures.php).
You can change them before create the fixtures

Load fixtures in the database

`$ php bin/console doctrine:fixtures:load`

The application uses [Swiftmailer](https://github.com/swiftmailer/swiftmailer) to send mails

open the .env file and configure your mailer sender credentials

exemple:
 
MAILER_URL=gmail://accountgmail@gmail.com:password@localhost

In the .env file configure the author name and mailer from

MESSAGE_AUTHOR="Smaïne"

MAIL_FROM="contact@smaine.me"

### Use it

Create a csv file with this model

##### *The first line should look like this*

> studentmail, subject, doodlelink,

* studentmail is the recipient
* subject correspond to the email subject and the kind of message, you have 3 choices : soutenance, session découverte, session mentorat
* doodlelink correspond to the doodle [link](https://doodle.com/fr/) avaibility 

A real exemple should be that:

contact@smaine.me, session mentorat, https://doodle.com/poll/n3nuuay6gbxt6vvm
blabla@gmail.fr
test@hotmail.fr

##### *the file must be in csv format and IN the import directory*

contact the students

`$ php bin/console contact:student yourfile.csv`

### Enhancements :

Please note that it's the first release !
* [Allow multiples differents session in the same file](https://github.com/ismail1432/bot-soutenance/issues/1)
* [launch command without specify name file](https://github.com/ismail1432/bot-soutenance/issues/2)
* [Create IHM for custom the message](https://github.com/ismail1432/bot-soutenance/issues/3)
* [Logs Errors and success](https://github.com/ismail1432/bot-soutenance/issues/4)
* More and more tests !