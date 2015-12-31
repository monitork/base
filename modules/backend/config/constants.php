<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
/------------------------------------------------------------------
/
/ DEFINE ADMIN ROLE
/
/------------------------------------------------------------------
/ List admin role
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
/*
/------------------------------------------------------------------
/
/ DEFINE STATUS
/
/------------------------------------------------------------------
/ Status of post
/
/
*/
$status = array(
  'publish' =>'Published',
  'pending' =>'Pending Review',
  'draft' => 'Draft'
);
defined('POST_STATUS')              OR define('POST_STATUS', serialize($status));
