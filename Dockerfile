FROM wordpress:4.8.2

COPY themes /usr/src/wordpress/wp-content/themes

COPY plugin-urls.txt /

RUN apt-get update && \
    apt-get install -y libxml2-dev && \
    docker-php-ext-install soap && docker-php-ext-enable soap && \
    apt-get remove -y libxml2-dev && \
    apt-get autoremove -y && \
    apt-get clean && \
    apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY private-blog-plugins/* /tmp/

RUN apt-get update && \
    apt-get install -y unzip wget && \
    wget --no-verbose -P /tmp -i /plugin-urls.txt && \
    cd /usr/src/wordpress/wp-content/plugins && \
    (unzip '/tmp/*.zip' || true) && \
    chown -R www-data:www-data /usr/src/wordpress/wp-content/* && \
    cd /tmp && \
    wget --no-verbose https://dl-ssl.google.com/dl/linux/direct/mod-pagespeed-stable_current_amd64.deb && \
    dpkg -i mod-pagespeed-stable_current_amd64.deb && \
    apt-get -f install && \
    rm mod-pagespeed-stable_current_amd64.deb && \
    apt-get remove -y unzip wget && \
    apt-get autoremove -y && \
    apt-get clean && \
    apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY cache.conf /etc/apache2/conf-enabled/

RUN ln -s /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/

ADD partup-consts.php /usr/src/wordpress

RUN echo "\nrequire_once(ABSPATH . 'partup-consts.php');" >> /usr/src/wordpress/wp-config-sample.php

VOLUME /var/www/html
