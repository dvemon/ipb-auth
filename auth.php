<?php

$_SERVER['SCRIPT_FILENAME'] = __FILE__;
require_once 'init.php';

$init = \IPS\Session\Front::i();

$username = $_POST['username'];
$password = $_POST['password'];

$table = 'core_members';
$query = \IPS\Db::i()->select( '*', $table, 'name=' . "'$username'")->query;
$result = \IPS\Db::i()->query($query)->fetch_assoc();

$id = $result["member_id"];
$member = \IPS\Member::load($id);

$member_name = strtolower($member->name);

if ($member_name == strtolower($username) && password_verify($password, $member->members_pass_hash))
{
    echo "correct credentials";
}

else
{
	echo "incorrect credentials";
}

?>
