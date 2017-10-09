<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------CUSTOM FUNCTION--------------------------------

function displayUser($stringforguest ,$stringforuser)
{
	if (!isset($_SESSION['Username'])) {
		return $stringforguest;
	}

	return $stringforuser;
}

/**
 * Function to user and guest
 *
 * write by Wlion98
 *
 * @param	String $url	URL for redirect if user is guest or banned
 * @return	void
 */
function permissionUser($url = '')
{
	$username = $_SESSION['Username'];
	$permission = $_SESSION['Permission'];

	if (($username) === null||($permission == 4)) {
		redirect($url);
	}
}

/**
 * Function to manager
 *
 * write by Wlion98
 *
 * @param	Array	$mngcate	Value manager of table Categories
 * @param	array	$mngtype	Value manager of table Types
 * @return	boolean
 */
function permissionManager($mngcate, $mngtype)
{
	$arrcate = explode('|', $mngcate);
	$arrtype = explode('|', $mngtype);
	$iduser = $_SESSION['ID'];
	$peruser = $_SESSION['Permission'];

	if ((in_array($iduser,$arrcate) || in_array($iduser,$arrtype))&&($peruser != 4)) {
		return true;
	}

	return false;
}