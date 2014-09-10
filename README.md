=========
## workplace-systems
============

Hi Sean and Workplace Systems,

Here we have an example of a tested, devopsy PHP application.

Virtual Machine Management (Phlagrant configuration), OS Configuration Management, Automated application deployment,
Infrastructure as Code, Jenkins build configuration, Selenium Configuration, Behat Configuration and Testing, PHPUnit
configuration and testing, with a custom PHP site. I prepared this for you guys today as a real world example of my
PHP Dev/ PHP DevOps / Testing Skills.



# Install Instructions:
------------

Prerequisites: You'll need to be running Ubuntu between 12 and 14 on your machine for this. I tried it on 12 and 14, it
*should* be fine on 13 too. Your user should also have sudo privileges.

1) Do this...

bash <(wget -qO- http://github.com/phpengine/workplace-systems/raw/master/workplace-systems-install.sh)

Which will install Git and PHP5 if you don't already have them, Install Cleopatra Config Management, Clone this repo,
change directory into it, use a Cleopatra autopilot file to install Dapperstrano, Phlagrant and Virtualbox,
Then Install the Virtual Machine for this project and Configuration with Phlagrant. It will then bring up the Phlagrant
box, run config management and install PHP, Apache, Selenium, Behat, PHPUnit, Jenkins, Jenkins Plugins, a Jenkins Build
already configured to execute the tests, Virtual Hosts, Host Names. Everything will work out of the box after this. All
a Managed, Reproducible, Infrastucture by (PHP) code Configuration.

2) That might take a while... 30 minutes on my BT infinity, about 2GB of software downloads
   ... but now you can browse the website as a bonus, sthis will also provision your host (hostname) for a nice URL)
   http://www.workplace-systems.vm

3) And also browse a jenkins build, where you'll see executable tests in PHPUnit, Behat and Selenium. Hit Build Now
   to have them executed. The associated software, Behat, Selenium and PHPUnit will be set up and working.
   http://www.wsys-jenkins.vm

4) When you're done gracefully close the VM with
   phlagrant halt now --fail-hard
   phlagrant destroy now
   to make sure the provisioning on your host machine is undone.

5) Bring the box back up with
   phlagrant up now --modify --provision
   if needed


# Talking Stuff

In a real world situation there would be far more complex test plans, scalability, managed infrastructure, multiple types
of automated testing, test patterns, continuous integration, multiple and prototypable environments and the like.

This will soon work on any OS, as its just Phlagrant that needs some windows compatible models. I think it will work
fine on a Mac, but haven't tried yet.

Notes:
During configuration management of the vm, you'll see something like...

[192.168.56.XXX] Executing echo phlagrant | sudo -S cleopatra auto x --af=/tmp/provision.php...

For quite a long time. It might appear to have hung, but it (hopefully) hasn't. It reads as a command, not a stream, so
can't update until the entire configuration management (downloading/installing selenium, behat and everything else) is
completed. You can SSH into the box to see what it's doing. The IP is in the log and the user is phlagrant:phlagrant .

ps aux | grep cleopatra

strace -p*cleopatra process number*

will let you see whats going on behind the scenes...

I haven't put the "kill a build that lasts too long" plugin in, so an erroneous build will write a neverending log and
crash the box...


# A list of most of the steps I've automated here...


host config mgmt
----------------

Ensure installation of Cleopatra

Ensure installation of Dapperstrano

Ensure installation of Testingkamen

Ensure installation of Phlagrant

Ensure installation of Virtualbox and Guest Additions


host application deployment
----------------

Create our host file entry for our VM PHP App URL

Create our host file entry for our VM Jenkins URL


guest system mgmt
----------------

image file downloading

image file extracting

image file importing

shared folder configuration

virtual machine network configuration

virtual machine memory and other hardware configuration



guest config mgmt
----------------

Lets begin Configuration of a Phlagrant Box

Ensure installation of the Phlagrant user can use Sudo without a Password

Ensure installation of our common PHP Modules are installed

Ensure installation of Cleopatra

Ensure installation of Dapperstrano

Ensure installation of Testingkamen

Ensure installation of Apache Server 

Ensure installation of our common Apache Modules are installed

Ensure installation of our reverse proxy Apache Modules are installed

Ensure installation of some standard tools are installed

Ensure installation of some git tools are installed

Ensure installation of Git SSH Key Safe version is are installed

Ensure installation of Firefox 24  for selenium

Ensure installation of Selenium Server 

Lets also start Selenium so we can use it

Ensure installation of Behat 

Lets restart Apache for our PHP and Apache Modules

Ensure installation of Jenkins 

Ensure installation of Jenkins PHP Plugins are installed

Ensure installation of the Jenkins user can use Sudo without a Password

Lets add global jenkins config

Lets create our jenkins job

Lets also restart Jenkins

Lets install VNC Server for Jenkins

Lets setup VNC Server Password for Jenkins

Ensure installation of Mysql Server 

Ensure installation of a Mysql Admin User 

// mozilla dir fix, see end of document

chown -R phlagrant /home/phlagrant/.mozilla",

rm -rf /home/phlagrant/.mozilla",

chmod -R 775 /home/phlagrant/.mozilla",


guest application deployment
-----------------

Initialise Project container

Lets initialize our new download directory as a dapper project

Next create our host file entry for our local URL www.workplace-systems.vm so tests work

Next create our virtual host

Then restart Apache so we are serving our application

Lets initialize our new download directory as a dapper project

Next create our host file entry for our local URL www.wsys-jenkins.vm so we can access from vm if needed

Next create our virtual host

Then restart Apache so we are serving our Jenkins vhost


--- Mozilla dir fix

// @todo surely, captain, there must be a better way...
Here's a bug... but not one of mine... due to the following firefox bug - https://bugzilla.mozilla.org/show_bug.cgi?id=198863 when the phlagrant user tries to open Firefox, the profile dir is created as root and the Firefox program (opened as phlagrant) cannot open or write to it. Anyhow, we have to start firefox as that user, let it fail, delete the root profile dir then on next opening it will work