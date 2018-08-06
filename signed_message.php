<?php
/* This script permit to confirm that a <MESSAGE> has been signed <SIGNATURE> by the <CRC_ADDRESS> */
/* You give the <MESSAGE> to <CRC_ADDRESS> owner. Owner send you back <SIGNATURE>  */
/* version 1.0 */
/* Author : https://github.com/Robin-73/ */

require('crc.jsonrpc.class.php');

$username='crowdcoin';
$password='password';

$crc= new CRC\crc_jsonrpc($username,$password);
print_r ($crc->getinfo());
print_r ($crc->mnsync('status'));

$crowdcoinaddress='<CRC_ADDRESS>';
$signature = '<SIGNATURE>';
$message = '<MESSAGE>';

if ($crc->verifymessage($crowdcoinaddress,$signature,$message)) {
 echo "**Success** Message valid\n";
} else {
 echo "**Warning** Message not valid\n";
}
