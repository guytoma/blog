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

RUN ln -s /etc/apache2/mods-available/expires.load /etc/apache2/mods-enabled/expires.load

COPY cache.conf /etc/apache2/conf-enabled/
