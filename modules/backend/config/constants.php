<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
/------------------------------------------------------------------
/
/ DEFINE ADMIN FOLDER
/
/------------------------------------------------------------------
/ Change admin folder in here
/
/
*/
$options = array(
  'subscriber'         => 'Subscriber',
  'contributor'           => 'Contributor',
  'author'         => 'Author',
  'editor'        => 'Editor',
  'administrator'        => 'Administrator',
);
defined('ADMIN_ROLE')              OR define('ADMIN_ROLE', serialize($options));
