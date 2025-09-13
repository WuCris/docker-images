#!/bin/sh

envsubst < /etc/maxscale.cnf.template > /etc/maxscale.cnf

exec /docker-entrypoint.sh "$@"


