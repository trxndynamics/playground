playground
==========

This was initially a workflow demo.  It has been expanded to be a Football Manager application built in PHP, Laravel and MongoDB.
The initial setup (listed below) will get the workflow built as well as the application (which is under construction) up and running.

The application is currently missing data so a few endpoints are not going to work.  I will get around to updating sample data but for now not everything is working as per expectation.

Please feel free to ignore areas that are of little interest to yourself.

Pre-requisites:

1.	Vagrant
2.	Oracle VirtualBox
3.	PHPStorm (although any IDE will suffice, there is PHPStorm specific configuration instructions here)

Install Guide:

1)	GitHub Forking

Login / Register with GitHub
Fork the repository within GitHub: https://github.com/trxndynamics/playground

2)	Create Project

Open PHPStorm
Click on 'Check out from Version Control' and select 'GitHub'
Enter authentication details
Fill in the form:

URL: 				https://github.com/trxndynamics/playground	(this should be the place of YOUR checked out repository URL, usually github.com/yourAccountName/repoName)
Parent Directory: 	C:\vagrants
Directory Name:		playground

3) Configure Vagrant within PHPStorm

Open up File->Settings
Under Project Settings click on Vagrant
Set the vagrant executable to point to your vagrant.exe (e.g. C:\HashiCorp\Vagrant\bin\vagrant.exe)
In instance folder:  C:\vagrants\playground\server\vagrant

Click ok to accept the changes.

4) Start the Virtual Machine (VM)

Click on Tools->Vagrant->Up

This will likely
This should build the box with the puppet configurations defined within the github repository.

5) Connect to the VM

Click on Tools->Start SSH session...
Vagrant at C:\vagrants\playground\server\vagrant

This should get you into the Virtual Machine via SSH

6) Install Laravel

http://laravel.com/docs/installation#install-laravel

Do this from the SSH command line

cd /var/www/playground
composer global require "laravel/installer=~1.1"
composer create-project laravel/laravel --prefer-dist


7) Edit Hosts File

Edit C:\Windows\System32\drivers\etc\hosts
Add the line:
192.168.56.101	playground

8) Verify location

Open browser window and type in the URL:
http://playground.vm

You should see 403 Forbidden nginx

9) conf file changes

cd /etc/nginx/sites-available/

sudo vi ./playground.vm.conf
change location root to read /var/www/playground/laravel/public in both instances

sudo nginx -s reload

10) Verify again

Open browser window and type in the URL:
http://playground.vm

You should now see the default Laravel 'You have arrived page'.


---------------------------


DATA INSTALL

There is intended to be an update where you can install the latest game data by running a mongoimport with the appropriate data file.
Club images will not be made available within this repository.