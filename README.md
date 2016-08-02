# IUU-Vessels-API
An IUU Vessels API pulled in from the Combined IUU list (http://iuu-vessels.org/iuu/iuu/search) and Greenpeace Blacklist (http://www.greenpeace.org/international/en/campaigns/oceans/pirate-fishing/Blacklist1/Browse-all-blacklists/)

#Requirements
- PHP 5+
- Apache

#Usage
Create a folder called iuu in your web directory, cd into it and clone the repository e.g.

> mkdir /var/www/iuu

> cd iuu

> git clone https://github.com/ano/IUU-Vessels-API.git

To get a JSON feed from 

- Blacklisted Greenpeace use http://your_domain.com/iuu/greenpeace.php?search=NameOfVessel
- Combined IUU use http://your_domain.com/iuu/iuu.php?search=NameOfVessel

To get All vessels use
- Blacklisted Greenpeace use http://your_domain.com/iuu/greenpeace.php
- Combined IUU use http://your_domain.com/iuu/iuu.php

###Greenpeace Setup
Note that for greenpeace you will need this Bash Script to scap the website as their site has blocks setup. Instead 
- copy and paste the file into your linux environment 
- make it executable 
- and set up a CRON job to run it periodically 

What this will do is download the webpages and store them in the list directory. These files will then be used by the greenpeace.php script to covert the HTML Webpages into an API.

```
                    ----------------------
                    Shell Script Below
                    ----------------------
                    #!/bin/sh

                    # a shell script used to download a greenpeace blacklist.
                    # this is executed from a crontab entry every day.

                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&gp_blacklist=1&startswith=A-D" -O /var/www/iuu/list/blacklist_gp_A-D.html 
                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&gp_blacklist=1&startswith=E-H" -O /var/www/iuu/list/blacklist_gp_E-H.html 
                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&startswith=I-L&gp_blacklist=1" -O /var/www/iuu/list/blacklist_gp_I-L.html 
                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&startswith=M-P&gp_blacklist=1" -O /var/www/iuu/list/blacklist_gp_M-P.html 
                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&startswith=Q-T&gp_blacklist=1" -O /var/www/iuu/list/blacklist_gp_Q-T.html 
                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&startswith=U-X&gp_blacklist=1" -O /var/www/iuu/list/blacklist_gp_U-X.html 
                    wget "http://blacklist.greenpeace.org/9/vessel/list?official_blacklist=1&startswith=Y-Z&gp_blacklist=1" -O /var/www/iuu/list/blacklist_gp_Y-Z.html 

                    echo "`date -u` `usr/local/bin/get_iuu`" >> /var/www/iuu/logfile.txt
```
