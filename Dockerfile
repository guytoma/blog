FROM wordpress:4

VOLUME /var/www/html

COPY themes /usr/src/wordpress/wp-content/themes

ADD plugin-urls.txt /

ADD wp-offload-s3-1.1.3.zip /tmp/

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
