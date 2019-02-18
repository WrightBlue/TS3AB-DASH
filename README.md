# TS3AB-DASH

### Quick links to everything
- [Installing TS3AudioBot](#installing-ts3audiobot)
- [Installing DASH](#installing-dash)
- [Configuration](#configuration)
- [Teamspeak group permissions](#teamspeak-group-permissions)
- [Requirements](#requirements)
- [Support](#support)
- [Contribute or Donate](#contribution)
- [ScreenShot](#screenshot)
- [License](#license)

### Installing TS3AudioBot
```bash
cd /home
```

```bash
wget https://github.com/WrightProjects/TS3AB-DASH/releases/download/v0.1-alpha/installer.sh --no-check-certificate
```

```bash
chmod 0777 installer.sh
```

```bash
./installer.sh
```

### Installing DASH
```bash
cd /var/www/html
```

```bash
wget https://github.com/WrightProjects/TS3AB-DASH/archive/master.zip
```

```bash
unzip master.zip
```

```bash
rm master.zip
```

```bash
mv TS3AB-DASH-master TS3AB-DASH
```

### Installing PHP-7.2 + Apache2
```bash
apt-get install apt-transport-https lsb-release ca-certificates
```

```bash
curl -ssL -o /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
```

```bash
sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
```

```bash
apt-get update
```

```bash
apt-get install apache2 php7.2 php7.2-pdo php7.2-curl
```

```bash
echo "<Directory /var/www/>
    Options Indexes FollowSymLinks
    AllowOverride All
    Order allow,deny
    allow from all
</Directory>" >> /etc/apache2/sites-available/000-default.conf
```

```bash
a2enmod rewrite
```

```bash
service apache2 restart
```

### Configuration
- Open /var/www/html/TS3AB-DASH/application/config/config.php
- Find and change:
```php
$config['base_url'] = 'http://workspace.wright.priv/TS3AB-DASH/';
```
- Open and edit /var/www/html/TS3AB-DASH/application/config/database.php
- Open and edit /var/www/html/TS3AB-DASH/application/config/dashboard.php

### Teamspeak group permissions

* ts3audiobot_bot_group:
```
b_virtualserver_client_list
b_virtualserver_channel_list
b_client_use_channel_commander
b_client_ignore_antiflood
b_client_ignore_bans
i_client_max_avatar_filesize
i_client_max_channel_subscriptions
i_channel_subscribe_power
```

### Requirements
* PHP 7.2+
* PHP-CURL
* PHP-PDO
* MySQL Server
* Apache2 + mod_rewrite

### Support
* [TsForum.PL](https://tsforum.pl/) - Forum
* Wright@ogarnij.se - Email
* ts3.black - Teamspeak

### Contribution
* Yes, of course you can contribute in `TS3AB-DASH`!
* Either helping with code, or supporting the project with donation!
* Donate: [paypal.me/WrightPP](paypal.me/WrightPP)

### ScreenShot
![ScreenShot](https://i.imgur.com/E4z1oHP.png)

### License
* [GNU General Public License v3.0](https://github.com/WrightProjects/TS3AB-DASH/blob/master/LICENSEE)
