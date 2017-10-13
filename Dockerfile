FROM alpine AS downloader

RUN apk add --no-cache openssl

COPY plugin-urls.txt /

COPY private-blog-plugins/* /tmp/

RUN for url in $(cat /plugin-urls.txt); do wget --no-verbose -P /tmp $url; done

RUN mkdir -p /wp-plugins && \
    for zip in /tmp/*.zip; do unzip -d /wp-plugins $zip; done



FROM wordpress:4.8.2

COPY themes /usr/src/wordpress/wp-content/themes

COPY --from=downloader /wp-plugins/* /usr/src/wordpress/wp-content/plugins/

COPY cache.conf /etc/apache2/conf-enabled/

RUN ln -s /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/

ADD partup-consts.php /usr/src/wordpress

RUN echo "\nrequire_once(ABSPATH . 'partup-consts.php');" >> /usr/src/wordpress/wp-config-sample.php

RUN chown -R www-data:www-data /usr/src/wordpress/wp-content/*

VOLUME /var/www/html
