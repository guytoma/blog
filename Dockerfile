FROM wordpress:4

COPY themes /usr/src/wordpress/wp-content/themes

RUN apt-get update && \
    apt-get install unzip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD https://downloads.wordpress.org/plugin/easy-wp-smtp.zip /tmp/

RUN cd /usr/src/wordpress/wp-content/plugins && \
    unzip /tmp/easy-wp-smtp.zip && \
    chown -R www-data:www-data /usr/src/wordpress/* && \
    rm /tmp/easy-wp-smtp.zip

COPY cache.conf /etc/apache2/conf-enabled/
