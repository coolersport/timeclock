<?php
session_start();
require '../common.php';

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

if ($request !== 'POST') {
    include 'header_get.php';
    include 'topmain.php';
}
echo "<title>$title - Create User</title>\n";

if (!isset($_SESSION['valid_user'])) {

    echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
    echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>PHP Timeclock Administration</td></tr>\n";
    echo "  <tr class=right_main_text>\n";
    echo "    <td align=center valign=top scope=row>\n";
    echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
    echo "        <tr class=right_main_text><td align=center>You are not presently logged in, or do not have permission to view this page.</td></tr>\n";
    echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='../login.php'><u>here</u></a> to login.</td></tr>\n";
    echo "      </table><br /></td></tr></table>\n";
    exit;
}

if ($request == 'GET') {

    echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
    echo "  <tr valign=top>\n";
    echo "    <td class=left_main width=180 align=left scope=col>\n";
    echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";
    echo "        <tr><td class=left_rows height=11></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Users</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user.png' alt='User Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='useradmin.php'>User Summary</a></td></tr>\n";
    echo "        <tr><td class=current_left_rows height=18 align=left valign=middle><img src='../images/icons/user_add.png' alt='Create New User' />
                &nbsp;&nbsp;<a class=admin_headings href='usercreate.php'>Create New User</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/magnifier.png' alt='User Search' />&nbsp;&nbsp;
                <a class=admin_headings href='usersearch.php'>User Search</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Offices</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick.png' alt='Office Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='officeadmin.php'>Office Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick_add.png' alt='Create New Office' />&nbsp;&nbsp;
                <a class=admin_headings href='officecreate.php'>Create New Office</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Groups</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group.png' alt='Group Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='groupadmin.php'>Group Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group_add.png' alt='Create New Group' />&nbsp;&nbsp;
                <a class=admin_headings href='groupcreate.php'>Create New Group</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>In/Out Status</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application.png' alt='Status Summary' />
                &nbsp;&nbsp;<a class=admin_headings href='statusadmin.php'>Status Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_add.png' alt='Create Status' />&nbsp;&nbsp;
                <a class=admin_headings href='statuscreate.php'>Create Status</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>Miscellaneous</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/clock.png' alt='Add/Edit/Delete Time' />
                &nbsp;&nbsp;<a class=admin_headings href='timeadmin.php'>Add/Edit/Delete Time</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_edit.png' alt='Edit System Settings' />
                &nbsp;&nbsp;<a class=admin_headings href='sysedit.php'>Edit System Settings</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/database_go.png'
                alt='Upgrade Database' />&nbsp;&nbsp;&nbsp;<a class=admin_headings href='dbupgrade.php'>Upgrade Database</a></td></tr>\n";
    echo "      </table></td>\n";
    echo "    <td align=left class=right_main scope=col>\n";
    echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
    echo "        <tr class=right_main_text>\n";
    echo "          <td valign=top>\n";
    echo "            <br />\n";
    echo "            <form name='form' action='$self' method='post'>\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_add.png' />&nbsp;&nbsp;&nbsp;Create User
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_username'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='display_name'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'><input type='password' size='25' maxlength='25' name='password'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Confirm Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <input type='password' size='25' maxlength='25' name='confirm_password'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='75' name='email_addy'>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Barcode:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='75' name='barcode'></td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
    echo "                      </select>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='group_name'>\n";
    echo "                      </select>&nbsp;*</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin User?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Time Admin User?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='time_admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='time_admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports User?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='reports_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='reports_perms' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Account Disabled?</td>\n";
    echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='disabled' value='1'>&nbsp;Yes
                    <input type='radio' name='disabled' value='0' checked>&nbsp;No</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Initial Punch:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='inout'><option value=''>...</option>" . html_options(tc_select("punchitems", "punchlist")) . "</select></td></tr>\n";
    echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=40>&nbsp;</td></tr>\n";
    echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png' 
                      border='0'></td></tr></table></form></td></tr>\n";
    include '../footer.php';
} elseif ($request == 'POST') {

    include 'header_post.php';
    include 'topmain.php';

    $post_username = $_POST['post_username'];
    $display_name = $_POST['display_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email_addy = $_POST['email_addy'];
    $user_barcode = value_or_null($_POST['barcode']);// UNIQUE constraint so no empty strings
    $office_name = $_POST['office_name'];
    @$group_name = $_POST['group_name'];
    $admin_perms = $_POST['admin_perms'];
    $reports_perms = $_POST['reports_perms'];
    $time_admin_perms = $_POST['time_admin_perms'];
    $post_disabled = $_POST['disabled'];
    $inout = $_POST['inout'];

    $tmp_username = tc_select_value("empfullname", "employees", "empfullname = ? ORDER by empfullname", $post_username);

    $string = strstr($post_username, "\"");
    $string2 = strstr($display_name, "\"");

    if ((@$tmp_username == $post_username) || ($password !== $confirm_password) ||
        (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) || (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $display_name)) || (empty($post_username)) ||
        (empty($display_name)) || (empty($email_addy)) || (empty($office_name)) || (empty($group_name)) ||
        (!preg_match('/' . "^([[:alnum:]]|~|\!|@|#|\$|%|\^|&|\*|\(|\)|-|\+|`|_|\=|[{]|[}]|\[|\]|\||\:|\<|\>|\.|,|\?)+$" . '/i', $password)) ||
        (!preg_match('/' . "^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$" . '/i', $email_addy)) || (($admin_perms != '1') && (!empty($admin_perms))) ||
        (($reports_perms != '1') && (!empty($reports_perms))) || (($time_admin_perms != '1') && (!empty($time_admin_perms))) ||
        (($post_disabled != '1') && (!empty($post_disabled))) || (!empty($string)) || (!empty($string2))
    ) {
        echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
        echo "  <tr valign=top>\n";
        echo "    <td class=left_main width=180 align=left scope=col>\n";
        echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";
        echo "        <tr><td class=left_rows height=11></td></tr>\n";
        echo "        <tr><td class=left_rows_headings height=18 valign=middle>Users</td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user.png' alt='User Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='useradmin.php'>User Summary</a></td></tr>\n";
        echo "        <tr><td class=current_left_rows height=18 align=left valign=middle><img src='../images/icons/user_add.png' alt='Create New User' />
                &nbsp;&nbsp;<a class=admin_headings href='usercreate.php'>Create New User</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/magnifier.png' alt='User Search' />&nbsp;&nbsp;
                <a class=admin_headings href='usersearch.php'>User Search</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=33></td></tr>\n";
        echo "        <tr><td class=left_rows_headings height=18 valign=middle>Offices</td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick.png' alt='Office Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='officeadmin.php'>Office Summary</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick_add.png' alt='Create New Office' />&nbsp;&nbsp;
                <a class=admin_headings href='officecreate.php'>Create New Office</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=33></td></tr>\n";
        echo "        <tr><td class=left_rows_headings height=18 valign=middle>Groups</td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group.png' alt='Group Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='groupadmin.php'>Group Summary</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group_add.png' alt='Create New Group' />&nbsp;&nbsp;
                <a class=admin_headings href='groupcreate.php'>Create New Group</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=33></td></tr>\n";
        echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>In/Out Status</td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application.png' alt='Status Summary' />
                &nbsp;&nbsp;<a class=admin_headings href='statusadmin.php'>Status Summary</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_add.png' alt='Create Status' />&nbsp;&nbsp;
                <a class=admin_headings href='statuscreate.php'>Create Status</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=33></td></tr>\n";
        echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>Miscellaneous</td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/clock.png' alt='Add/Edit/Delete Time' />
                &nbsp;&nbsp;<a class=admin_headings href='timeadmin.php'>Add/Edit/Delete Time</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_edit.png' alt='Edit System Settings' />
                &nbsp;&nbsp;<a class=admin_headings href='sysedit.php'>Edit System Settings</a></td></tr>\n";
        echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/database_go.png'
                alt='Upgrade Database' />&nbsp;&nbsp;&nbsp;<a class=admin_headings href='dbupgrade.php'>Upgrade Database</a></td></tr>\n";
        echo "      </table></td>\n";
        echo "    <td align=left class=right_main scope=col>\n";
        echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
        echo "        <tr class=right_main_text>\n";
        echo "          <td valign=top>\n";
        echo "            <br />\n";

        // begin post validation //

        if (empty($post_username)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Username is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($display_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Display Name is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Double Quotes are not allowed when creating an Username.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!empty($string2)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Double Quotes are not allowed when creating an Display Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($email_addy)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    An Email Address is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($office_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    An Office is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (empty($group_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    A Group is required.</td></tr>\n";
            echo "            </table>\n";
        } elseif (@$tmp_username == $post_username) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    User already exists. Create another username.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $post_username)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when creating a Username.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]| |-|'|,)+$" . '/i', $display_name)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, hyphens, apostrophes, commas, and spaces are allowed when creating a Display Name.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]|~|\!|@|#|\$|%|\^|&|\*|\(|\)|-|\+|`|_|\=|[{]|[}]|\[|\]|\||\:|\<|\>|\.|,|\?)+$" . '/i', $password)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Single and double quotes, backward and forward slashes, semicolons, and spaces are not allowed when creating a 
                    Password.</td></tr>\n";
            echo "            </table>\n";
        } elseif ($password != $confirm_password) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Passwords do not match.</td></tr>\n";
            echo "            </table>\n";
        } elseif (!preg_match('/' . "^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$" . '/i', $email_addy)) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Alphanumeric characters, underscores, periods, and hyphens are allowed when creating an Email Address.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($admin_perms != '1') && (!empty($admin_perms))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for Sys Admin Perms.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($reports_perms != '1') && (!empty($reports_perms))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for Reports Perms.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($time_admin_perms != '1') && (!empty($time_admin_perms))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for Time Admin Perms.</td></tr>\n";
            echo "            </table>\n";
        } elseif (($post_disabled != '1') && (!empty($post_disabled))) {
            echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
            echo "              <tr>\n";
            echo "                <td class=table_rows width=20 align=center><img src='../images/icons/cancel.png' /></td><td class=table_rows_red>
                    Choose \"yes\" or \"no\" for User Account Disabled.</td></tr>\n";
            echo "            </table>\n";
        }

        if (!empty($office_name)
            and is_null(tc_select_value("officename", "offices", "officename = ?", $office_name))
        ) {
            echo "Office is not defined.\n";
            exit;
        }

        if (!empty($group_name)
            and is_null(tc_select_value("groupname", "groups", "groupname = ?", $group_name))
        ) {
            echo "Group is not defined.\n";
            exit;
        }

        // end post validation //
        $password = crypt($password, 'xy');
        $confirm_password = crypt($confirm_password, 'xy');

        echo "            <br />\n";
        echo "            <form name='form' action='$self' method='post'>\n";
        echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
        echo "              <tr>\n";
        echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_add.png' />&nbsp;&nbsp;&nbsp;Create User
                </th></tr>\n";
        echo "              <tr><td height=15></td></tr>\n";
        echo "              <tr><td class=table_rows  height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:11px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='post_username' value=\"$post_username\">&nbsp;*</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:11px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='50' name='display_name' value=\"$display_name\">&nbsp;*</td></tr>\n";

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'><input type='password' size='25' maxlength='25' name='password'></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Confirm Password:</td><td colspan=2 width=80%
                      style='padding-left:20px;'>
                      <input type='password' size='25' maxlength='25' name='confirm_password'></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:11px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='75' name='email_addy' value=\"$email_addy\">&nbsp;*</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Barcode:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <input type='text' size='25' maxlength='75' name='barcode' value='$user_barcode'></td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='office_name' onchange='group_names();'>\n";
        echo "                      </select>&nbsp;*</td></tr>\n";
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td colspan=2 width=80%
                      style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                      <select name='group_name' onfocus='group_names();'>
                        <option selected>$group_name</option>\n";
        echo "                      </select>&nbsp;*</td></tr>\n";

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin User?</td>\n";
        if ($admin_perms == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='admin_perms' value='1'
                    checked>&nbsp;Yes<input type='radio' name='admin_perms' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
        }

        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Time Admin User?</td>\n";
        if ($time_admin_perms == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='time_admin_perms' value='1'
                    checked>&nbsp;Yes<input type='radio' name='time_admin_perms' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='time_admin_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='time_admin_perms' value='0' checked>&nbsp;No</td></tr>\n";
        }
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports User?</td>\n";
        if ($reports_perms == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='reports_perms' value='1'
                    checked>&nbsp;Yes<input type='radio' name='reports_perms' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='reports_perms' value='1'>&nbsp;Yes
                    <input type='radio' name='reports_perms' value='0' checked>&nbsp;No</td></tr>\n";
        }
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Account Disabled?</td>\n";
        if ($post_disabled == "1") {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='disabled' value='1'
                    checked>&nbsp;Yes<input type='radio' name='disabled' value='0'>&nbsp;No</td></tr>\n";
        } else {
            echo "                <td class=table_rows align=left width=80% style='padding-left:20px;'><input type='radio' name='disabled' value='1'>&nbsp;Yes
                    <input type='radio' name='disabled' value='0' checked>&nbsp;No</td></tr>\n";
        }
        echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Initial Punch:</td><td colspan=2 width=80%
                          style='color:red;font-family:Tahoma;font-size:10px;padding-left:20px;'>
                          <select name='inout'><option value=''>...</option>" . html_options(tc_select("punchitems", "punchlist"), $inout) . "</select></td></tr>\n";
        echo "              <tr><td class=table_rows align=right colspan=3 style='color:red;font-family:Tahoma;font-size:10px;'>*&nbsp;required&nbsp;</td></tr>\n";
        echo "            </table>\n";
        echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
        echo "              <tr><td height=40>&nbsp;</td></tr>\n";
        echo "              <tr><td width=30><input type='image' name='submit' value='Create User' align='middle'
                      src='../images/buttons/next_button.png'></td><td><a href='useradmin.php'><img src='../images/buttons/cancel_button.png' 
                      border='0'></td></tr></table></form></td></tr>\n";
        include '../footer.php';
        exit;
    }

    $password = crypt($password, 'xy');
    $confirm_password = crypt($confirm_password, 'xy');

    tc_insert_strings("employees", array(
        'empfullname'     => $post_username,
        'displayname'     => $display_name,
        'employee_passwd' => $password,
        'email'           => $email_addy,
        'barcode'         => $user_barcode,
        'groups'          => $group_name,
        'office'          => $office_name,
        'admin'           => $admin_perms,
        'reports'         => $reports_perms,
        'time_admin'      => $time_admin_perms,
        'disabled'        => $post_disabled
    ));

    if (has_value($inout)) {
        $inout = tc_select_value("punchitems", "punchlist", "punchitems = ?", $inout);
        if (has_value($inout)) {
            $tz_stamp = time();
            $clockin = array("fullname" => $post_username, "inout" => $inout, "timestamp" => $tz_stamp);
            if (yes_no_bool($ip_logging)) {
                $clockin["ipaddress"] = $connecting_ip;
            }
            tc_insert_strings("info", $clockin);
            tc_update_strings("employees", array("tstamp" => $tz_stamp), "empfullname = ?", $post_username);
        }
    }

    echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
    echo "  <tr valign=top>\n";
    echo "    <td class=left_main width=180 align=left scope=col>\n";
    echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";
    echo "        <tr><td class=left_rows height=11></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Users</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/user.png' alt='User Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='useradmin.php'>User Summary</a></td></tr>\n";
    echo "        <tr><td class=current_left_rows height=18 align=left valign=middle><img src='../images/icons/user_add.png' alt='Create New User' />
                &nbsp;&nbsp;<a class=admin_headings href='usercreate.php'>Create New User</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/magnifier.png' alt='User Search' />&nbsp;&nbsp;
                <a class=admin_headings href='usersearch.php'>User Search</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Offices</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick.png' alt='Office Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='officeadmin.php'>Office Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/brick_add.png' alt='Create New Office' />&nbsp;&nbsp;
                <a class=admin_headings href='officecreate.php'>Create New Office</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle>Groups</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group.png' alt='Group Summary' />&nbsp;&nbsp;
                <a class=admin_headings href='groupadmin.php'>Group Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/group_add.png' alt='Create New Group' />&nbsp;&nbsp;
                <a class=admin_headings href='groupcreate.php'>Create New Group</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>In/Out Status</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application.png' alt='Status Summary' />
                &nbsp;&nbsp;<a class=admin_headings href='statusadmin.php'>Status Summary</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_add.png' alt='Create Status' />&nbsp;&nbsp;
                <a class=admin_headings href='statuscreate.php'>Create Status</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=33></td></tr>\n";
    echo "        <tr><td class=left_rows_headings height=18 valign=middle colspan=2>Miscellaneous</td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/clock.png' alt='Add/Edit/Delete Time' />
                &nbsp;&nbsp;<a class=admin_headings href='timeadmin.php'>Add/Edit/Delete Time</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/application_edit.png' alt='Edit System Settings' />
                &nbsp;&nbsp;<a class=admin_headings href='sysedit.php'>Edit System Settings</a></td></tr>\n";
    echo "        <tr><td class=left_rows height=18 align=left valign=middle><img src='../images/icons/database_go.png'
                alt='Upgrade Database' />&nbsp;&nbsp;&nbsp;<a class=admin_headings href='dbupgrade.php'>Upgrade Database</a></td></tr>\n";
    echo "      </table></td>\n";
    echo "    <td align=left class=right_main scope=col>\n";
    echo "      <table width=100% height=100% border=0 cellpadding=10 cellspacing=1>\n";
    echo "        <tr class=right_main_text>\n";
    echo "          <td valign=top>\n";
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr>\n";
    echo "                <td class=table_rows width=20 align=center><img src='../images/icons/accept.png' /></td><td class=table_rows_green>
                    &nbsp;User created successfully.</td></tr>\n";
    echo "            </table>\n";
    echo "            <br />\n";
    echo "            <table align=center class=table_border width=60% border=0 cellpadding=3 cellspacing=0>\n";
    echo "              <tr>\n";
    echo "                <th class=rightside_heading nowrap halign=left colspan=3><img src='../images/icons/user_add.png' />&nbsp;&nbsp;&nbsp;Create User
                </th></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";

    $result4 = tc_select(
        "empfullname, displayname, email, barcode, groups, office, admin, reports, time_admin, disabled",
        "employees", "empfullname = ? ORDER BY empfullname", $post_username
    );
    while ($row = mysqli_fetch_array($result4)) {
        $username = "" . $row['empfullname'] . "";
        $displayname = "" . $row['displayname'] . "";
        $user_email = "" . $row['email'] . "";
        $user_barcode = "" . $row['barcode'] . "";
        $office = "" . $row['office'] . "";
        $groups = "" . $row['groups'] . "";
        $admin = "" . $row['admin'] . "";
        $reports = "" . $row['reports'] . "";
        $time_admin = "" . $row['time_admin'] . "";
        $disabled = "" . $row['disabled'] . "";
    }
    ((mysqli_free_result($result4) || (is_object($result4) && (get_class($result4) == "mysqli_result"))) ? true : false);

    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Username:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$username</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Display Name:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$displayname</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Password:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>***hidden***</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Email Address:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$user_email</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Barcode:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$user_barcode</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Office:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$office</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Group:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$groups</td></tr>\n";

    if ($admin == "1") {
        $admin = "Yes";
    } else {
        $admin = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Sys Admin User?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$admin</td></tr>\n";
    if ($time_admin == "1") {
        $time_admin = "Yes";
    } else {
        $time_admin = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Time Admin User?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$time_admin</td></tr>\n";
    if ($reports == "1") {
        $reports = "Yes";
    } else {
        $reports = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Reports User?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$reports</td></tr>\n";
    if ($disabled == "1") {
        $disabled = "Yes";
    } else {
        $disabled = "No";
    }
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>User Account Disabled?</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$disabled</td></tr>\n";
    echo "              <tr><td class=table_rows height=25 width=20% style='padding-left:32px;' nowrap>Initial Punch:</td><td align=left class=table_rows
                      colspan=2 width=80% style='padding-left:20px;'>$inout</td></tr>\n";
    echo "              <tr><td height=15></td></tr>\n";
    echo "            </table>\n";
    echo "            <table align=center width=60% border=0 cellpadding=0 cellspacing=3>\n";
    echo "              <tr><td height=20 align=left>&nbsp;</td></tr>\n";
    echo "              <tr><td><a href='usercreate.php'><img src='../images/buttons/done_button.png' border='0'></td></tr></table></td></tr>\n";
    include '../footer.php';
    exit;
}
?>
