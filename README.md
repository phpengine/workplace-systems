=========
## workplace-systems
============

Hi Sean and Workplace Systems,

Here we have an example of a tested, devopsy PHP application.

Virtual Machine Management, Configuration Management, Automated application deployment, Infrastructure as Code,
Selenium Configuration, Behat Configuration and Testing, PHPUnit configuration and testing, with a custom PHP Module
and a custom PHP theme. I prepared this for you guys today as a real world example of my PHP Dev/ PHP DevOps /
Testing Skills.

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
