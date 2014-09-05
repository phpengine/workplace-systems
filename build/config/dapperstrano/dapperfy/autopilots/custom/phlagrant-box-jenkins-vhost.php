<?php

/*************************************
*      Generated Autopilot file      *
*     ---------------------------    *
*Autopilot Generated By Dapperstrano *
*     ---------------------------    *
*************************************/

Namespace Core ;

class AutoPilotConfigured extends AutoPilot {

    public $steps ;

    public function __construct() {
	    $this->setSteps();
    }

    /* Steps */
    private function setSteps() {

	    $this->steps =
	      array(

              array ( "Logging" => array( "log" => array( "log-message" => "Lets initialize our new download directory as a dapper project"), ) ),
              array ( "Project" => array( "init" => array(), ) , ) ,

              array ( "Logging" => array( "log" => array( "log-message" => "Next create our host file entry for our local URL"), ) ),
              array ( "HostEditor" => array( "add" => array (
                  "guess" => true,
                  "host-name" => "www.wsys-jenkins.vm",
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Next create our virtual host"), ) ),
              array ( "ApacheVHostEditor" => array( "add" => array (
                  "guess" => true,
                  "vhe-docroot" => "/var/www/workplace-systems/",
                  "vhe-url" => "www.wsys-jenkins.vm",
                  "vhe-ip-port" => $this->getCurrentTargetFromPapyrusLocal(),
                  "vhe-vhost-dir" => "/etc/apache2/sites-available",
                  "vhe-template" => $this->getTemplate(),
              ), ), ),

              array ( "Logging" => array( "log" => array( "log-message" => "Now lets restart Apache so we are serving our Jenkins vhost", ), ), ),
              array ( "ApacheControl" => array( "restart" => array(
                  "guess" => true,
              ), ), ),

	      );

	  }

    protected function getCurrentTargetFromPapyrusLocal() {
        $plf = file_get_contents("/var/www/workplace-systems/papyrusfilelocal") ;
        $pfu = unserialize($plf) ;
        if (is_array($pfu) && count($pfu)>0) {
            return $pfu["phlagrant-box"]["target"] ; }
        return null ;
    }


    private function getTemplate() {
        $template =
            <<<'TEMPLATE'
           NameVirtualHost ****IP ADDRESS****:80
 <VirtualHost ****IP ADDRESS****:80>
    ServerAdmin webmaster@localhost
 	ServerName ****SERVER NAME****
    ProxyPreserveHost On
    ProxyPass / http://127.0.0.1:8080/
    ProxyPassReverse / http://127.0.0.1:8080/
    ServerName hostname.example.com
</VirtualHost>

TEMPLATE;

        return $template ;
    }



}