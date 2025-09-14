ARG DRUPAL_VERSION
ARG DRUPAL_IMAGE
ARG PHP_VERSION
ARG NGINX_VERSION

FROM drupal:${DRUPAL_VERSION}${PHP_VERSION} as builder

FROM nginx:${NGINX_VERSION}

COPY etc/ /etc/nginx/
COPY docker-entrypoint.d/40-enable-cache.sh /docker-entrypoint.d/

RUN chmod 555 /docker-entrypoint.d/40-enable-cache.sh \
   && mkdir -p /opt/drupal/web

COPY --from=builder /opt/drupal/web /opt/drupal/web

ENV NGINX_ENTRYPOINT_LOCAL_RESOLVERS 1

# User ID must match in both PHP and Nginx containers for shared file access
RUN apk add shadow \
   && usermod -u 1001 nginx \
   && groupmod -g 1001 nginx

WORKDIR /opt/drupal/web
