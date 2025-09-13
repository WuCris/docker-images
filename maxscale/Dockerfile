FROM mariadb/maxscale:24.02

RUN dnf install gettext sudo -y \
  && dnf upgrade -y

COPY scripts/custom-entrypoint.sh /usr/local/bin/
COPY scripts/envsubst.sh /usr/local/bin/

COPY maxscale.cnf.template /etc/

RUN chmod 555 /usr/local/bin/custom-entrypoint.sh /usr/local/bin/envsubst.sh \
  && echo 'Defaults:maxscale env_keep += "SLAVE_HOST SLAVE_PORT MASTER_SERVER MASTER_PORT SLAVE_SERVER MAXSCALE_USER MAXSCALE_PASS MON_INTERVAL MAXSCALE_VERSION"'  >> /etc/sudoers.d/allowedscript \
  && echo 'maxscale ALL=(ALL) NOPASSWD: /usr/local/bin/envsubst.sh' >> /etc/sudoers.d/allowedscript

USER maxscale

ENTRYPOINT [ "/usr/local/bin/custom-entrypoint.sh" ]
CMD ["maxscale","--nodaemon", "--log=stdout"]