ARG MARIADB_VERSION
FROM mariadb:${MARIADB_VERSION}

COPY docker-entrypoint-initdb.d /docker-entrypoint-initdb.d
RUN chmod 555 /docker-entrypoint-initdb.d/user-init.sh