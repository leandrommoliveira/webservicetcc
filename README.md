#### Preparar Ambiente

Criar um vhost (exemplo apache):

  <VirtualHost *:80>
      ServerName "webservicetcc.local"
      DocumentRoot "/caminho_do_projeto/webservicetcc/public"
    
      <Directory "/caminho_do_projeto/webservicetcc/public">
          Options -Indexes FollowSymLinks
          AllowOverride All
          Order Allow,Deny
          Allow from all
          
          RewriteEngine On
          RewriteCond %{REQUEST_FILENAME} !-f
          RewriteRule . index.php [L] 
    </Directory>        
        
  </VirtualHost>

Criar o host na sua máquina:

	127.0.0.1 webservicetcc.local

##### Composer

Instalar o composer.phar: 

	$ curl -sS https://getcomposer.org/installer | php

Utilizamos composer para carregar os projetos que vamos usar

* [Respect/Rest](http://github.com/Respect/Rest)
* [Respect/Relational](http://github.com/Respect/Relational)

Rodar o `php composer.phar install` no diretório do projeto