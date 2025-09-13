#!/bin/sh
set -e

echo "subsetting variables"
envsubst < /etc/maxscale.cnf.template > /etc/maxscale.cnf
