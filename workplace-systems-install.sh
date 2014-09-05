#!/bin/sh
sudo apt-get install -y php5 git
git clone http://git.pharaohtools.com/git/phpengine/cleopatra.git
sudo php cleopatra/install-silent
cd /var/www
git clone https://github.com/phpengine/workplace-systems
cd workplace-systems
sudo cleopatra auto x --af="build/config/cleopatra/cleofy/autopilots/custom/Phlagrant/cleofy-cm-cap-workstation.php"
phlagrant up now
