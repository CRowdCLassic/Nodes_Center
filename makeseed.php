<?php
/* This script create a Unique ID Seed */
/* Version 1.0 */
/* Author : https://github.com/Robin-73 */

function seed_mt_rand() {
static $done;
   if (!$done) {
        $hash = md5(microtime());
        $length = ((substr($hash,0,1) < '8') ? 8 : 7 );
        mt_srand((int)base_convert(substr($hash,0,$length),16,10));
        $done = TRUE;
   }
}
function get_seed($IP) {
  seed_mt_rand();
  $Randval = mt_rand(111111111,999999999);
  $Date=time();
  $RawSeed =  SHA1 ($Date.$IP.$Randval, FALSE);
  $SplitSeed = str_split($RawSeed, 10);
  $Seed = implode ("-",$SplitSeed);
  return $Seed;
}

$IP='127.0.0.1';
echo get_seed($IP)."\n";
