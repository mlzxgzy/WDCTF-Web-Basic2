FROM mlzxgzy/caddy-php-mariadb
ENV MYSQL_USER=web3 MYSQL_PASS=web3 MYSQL_DATABASE=web3
COPY ./html/* /srv/
RUN echo 'if [ ! $FLAG ]; then export FLAG="{Flag_System_Was_Broken_Please_Contect_To_Administrator}"; fi' >> /n2r.sh \
  && echo 'sed -i "s/{IF_YOU_COULD_SEE_ME_PLEASE_CONTECT_TO_ADMINISTRATOR_THANKS}/$FLAG/g" /init.sql' >> /n2r.sh \
  && cat /srv/init.sql >> /init.sql \
  && rm /srv/init.sql
