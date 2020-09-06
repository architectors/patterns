FROM php:7.4-cli
COPY . /patterns

RUN pecl install pecl install xdebug-2.9.6 \
    && curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc \
    && cp /patterns/docker/php/xdebug.ini /usr/local/etc/php/conf.d/

ENV PHP_IDE_CONFIG serverName=patterns

CMD [ "php", "-a" ]

WORKDIR /patterns
