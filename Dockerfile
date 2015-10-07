FROM tutum/wordpress-stackable

ADD config-additions.php /

RUN cat /config-additions.php >> /app/wp-config.php

COPY themes/dante /app/wp-content/themes/dante
