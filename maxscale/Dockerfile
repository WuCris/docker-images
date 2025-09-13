FROM mariadb/maxscale:24.02

RUN dnf install gettext -y

COPY custom-entrypoint.sh /usr/local/bin/
COPY maxscale.cnf.template /etc/

RUN chmod 555 /usr/local/bin/custom-entrypoint.sh

ENTRYPOINT [ "/usr/local/bin/custom-entrypoint.sh" ]
CMD ["maxscale","--nodaemon", "--log=stdout"]