<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
  'type'          => 'mysql',
  'connection'    => array(
    'hostname'    => 'mysql',
    'port'        => '3306',
    'database'    => 'MajicTV',
    'username'    => 'majictv',
    'password'    => 'pT7jCRwZMu32Rd7G'
    'persistent'  => false,
    'compress'    => false,
  ),
  'identifier'    => '`',
  'table_prefix'  => '',
  'charset'       => 'utf8',
  'enable_cache'  => true,
  'profiling'     => false,
);
