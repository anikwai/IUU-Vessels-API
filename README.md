# IUU-Vessels-API
An IUU Vessels API pulled in from the Combined IUU list (http://iuu-vessels.org/iuu/iuu/search) and Greenpeace Blacklist (http://www.greenpeace.org/international/en/campaigns/oceans/pirate-fishing/Blacklist1/Browse-all-blacklists/)

#Requirements
- PHP 5+
- Apache

#Usage
Create a folder called iuu, cd into it and clone the repository
> cd iuu
> git clone https://github.com/ano/IUU-Vessels-API.git

To get a JSON feed from 

- Blacklisted Greenpeace use http://your_domain.com/iuu/greenpeace.php?search=NameOfVessel
- Combined IUU use http://your_domain.com/iuu/iuu.php?search=NameOfVessel

To get All vessels use
- Blacklisted Greenpeace use http://your_domain.com/iuu/greenpeace.php
- Combined IUU use http://your_domain.com/iuu/iuu.php
