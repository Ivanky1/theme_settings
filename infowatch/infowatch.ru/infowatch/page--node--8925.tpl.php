<?php

$f = fopen($_SERVER['DOCUMENT_ROOT'].'/sites/all/themes/infowatch/files/marketing.csv','r');
$i = 0;
while( $userFull =  fgetcsv($f, 1000,',')) {
    if ($i) {

        $account = __user_db_return($userFull[1]);
        __user_to_array_return($userFull, $account);
    }
    $i++;
}

function __user_to_array_return($userFull, $account = null) {
    if (is_null($account)) {
        $fields = array();
        $fields = array(
            'name' => preg_replace('/(.*) .*/', "$1", $userFull[0]),
            'mail' => $userFull[1],
            'init' => $userFull[1],
            'roles'=> array(DRUPAL_AUTHENTICATED_RID => TRUE),
        );
        $fields['roles'][8]  = roles_user();
        if (is_null($account)) {
            $password = user_password(8);
            $fields['pass'] = $password;
            $fields['status'] = 1;
        }
        $fields['field_fio'][LANGUAGE_NONE][0]['value'] = $userFull[0];
        user_save($account, $fields);
    } elseif (!is_null($account) && !array_key_exists(8, $account->roles)) {
        $account->roles[8] = roles_user();
        user_save($account);
    }

}

function __user_db_return($mail=null) {
    if (!is_null($mail)) {
        $uid = db_query("select uid from users where mail = :mail",
            array(':mail'=>$mail))->fetchField();
        $userFull = (is_numeric($uid)) ?user_load($uid) : null;
        return $userFull;
    }
    return null;
}

function roles_user() {
    $q = db_select('role','r');
    $q->fields('r', array('rid','name'));
    $q->condition('r.rid', array(8));
    $roles = $q->execute();
    foreach($roles as $role) {
        return $role->name;
    }
}


?>

