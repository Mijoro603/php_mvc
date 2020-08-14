add to /etc/hosts
127.0.0.1    conf.test

nginx server conf:
server {
    server_name conf.test;
    listen 80;
    index  index.php index.html index.htm;
    root /home/hkovacs/Documents/conf-test/dev/public;

    location / {
        try_files $uri $uri/ /index.php?url=$uri&$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_pass unix:/run/php/php7.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
    }
}

sample urls:
http://conf.test/pages/about/3