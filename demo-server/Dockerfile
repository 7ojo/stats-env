FROM debian:jessie

RUN apt-get -y update && apt-get -y upgrade && \
	apt-get -y install php5-fpm php5-apcu wget

RUN echo "apc.enabled=1\napc.enable_cli=1" >> /etc/php5/cli/conf.d/20-apcu.ini

WORKDIR /setup

ADD server.php /setup

RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/1b137f8bf6db3e79a38a5bc45324414a6b1f9df2/web/installer -O - -q | php -- --quiet

RUN php composer.phar -q require jimdo/prometheus_client_php

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "server.php"]
