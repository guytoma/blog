FROM tutum/wordpress-stackable

ADD config-additions.php /

RUN cat /config-additions.php >> /app/wp-config.php

COPY themes /app/wp-content/themes
