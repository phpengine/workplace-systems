sudo mkdir -p /var/lib/jenkins/jobs/workplace-systems_tests
sudo cp /var/www/workplace-systems/build/config/jenkins/config.xml /var/lib/jenkins/jobs/workplace-systems_tests/config.xml
sudo chmod -R 755 /var/lib/jenkins/jobs/workplace-systems_tests
sudo chown -R jenkins /var/lib/jenkins/jobs/workplace-systems_tests
sudo chgrp -R jenkins /var/lib/jenkins/jobs/workplace-systems_tests