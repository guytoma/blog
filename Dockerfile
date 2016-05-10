FROM wordpress:4

COPY themes /usr/src/wordpress/wp-content/themes

RUN apt-get update && \
    apt-get install -y unzip wget && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD plugin-urls.txt /

ADD wp-offload-s3-1.1.3.zip /tmp/

RUN wget -P /tmp -i /plugin-urls.txt && \
    cd /usr/src/wordpress/wp-content/plugins && \
    (unzip '/tmp/*.zip' || true) && \
    chown -R www-data:www-data /usr/src/wordpress/* && \
    rm /tmp/*

COPY cache.conf /etc/apache2/conf-enabled/
