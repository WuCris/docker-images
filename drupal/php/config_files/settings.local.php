<?php

$databases['default']['default'] = array (
  'database' => getenv('MARIADB_DATABASE'),
  'username' => getenv('MARIADB_USER'),
  'password' => getenv('MARIADB_PASSWORD'),
  'prefix' => '',
  'host' => getenv('DATABASE_MASTER'),
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver' => 'mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);

$databases['default']['replica'] = array (
  'database' => getenv('MARIADB_DATABASE'),
  'username' => getenv('MARIADB_USER'),
  'password' => getenv('MARIADB_PASSWORD'),
  'prefix' => '',
  'host' => getenv('DATABASE_SLAVE'),
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver' => 'mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);

$settings['hash_salt'] = getenv('HASH_SALT');

$settings['trusted_host_patterns'] = [
  '^www\.$SITE_URL',
  '^$SITE_URL',
  '^localhost$'
];

// Get the site URL from the environment variable.
$site_url_from_env = getenv('SITE_URL');

// Initialize the array with a default value.
$settings['trusted_host_patterns'] = ['^localhost$'];

// Only proceed if the environment variable was actually found.
if ($site_url_from_env) {
  // Escape any dots in the URL for regex safety. This is CRITICAL.
  $escaped_site_url = str_replace('.', '\.', $site_url_from_env);

  // Append the dynamic host patterns to the array.
  $settings['trusted_host_patterns'][] = "^www\.{$escaped_site_url}$";
  $settings['trusted_host_patterns'][] = "^{$escaped_site_url}$";
}
