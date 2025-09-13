#!/bin/sh
set -e

sudo /usr/local/bin/envsubst.sh

exec /docker-entrypoint.sh "$@"


