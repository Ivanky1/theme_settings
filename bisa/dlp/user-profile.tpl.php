<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 */
?>
<div class="profile"<?php print $attributes; ?>>
	<div class="user-picture">
	<?php $user1 = user_load(arg(1));

print theme('user_picture', array('account' => $user1));?>
	</div>
	<div class="field field-name-field-surname">
		<div class="field-item even"><?php if (isset($field_surname['0']['value'])) print(check_markup($field_surname['0']['value'],'plain_text'));?></div>
	</div>
	<div class="field field-name-field-name">
		<div class="field-item even"><?php if (isset($field_name['0']['value'])) print(check_markup($field_name['0']['value'],'plain_text'));?></div>
	</div>


    <?php if (isset($field_post['0']['value'])) : ?>
        <div class="field field-name-field-post  field-label-inline">
            <div class="field-label"><?php print t('Post:')?></div>
            <div class="field-item even"><?php print(check_markup($field_post['0']['value'],'plain_text')); ?></div>
        </div>
    <?php endif ?>

    <?php if (isset($field_company['0']['value'])) : ?>
        <div class="field field-name-field-company field-label-inline">
            <div class="field-label"><?php print t('Company:')?></div>
            <div class="field-item even"><?php print(check_markup($field_company['0']['value'],'plain_text'));?></div>
        </div>
    <?php endif ?>


	<?php if (isset($field_about_user['0']['value']) && !array_key_exists(14, $user1->roles))  : ?>
        <div class="field field-name-field-about-user field-label-inline">
            <div class="field-label"><?php print t('About yourself:')?></div>
            <div class="field-item even"><?php print(check_markup($field_about_user['0']['value'],'plain_text'));?></div>
        </div>
     <?php elseif(isset($field_about_user['0']['value']) && array_key_exists(14, $user1->roles)) : ?>
        <div class="clear field-item even"><?php print(check_markup($field_about_user['0']['value'],'plain_text'));?></div>
	<?php endif ?>
    <?php
    if (isset($field_flag_country_user['0']['uri'])) {
        ?>
        <div class="field field-name-field-about-user field-label-inline">
            <div class="field-label"><?php print 'Участник проекта "Международный опыт":' ?></div><br /><br />
            <div class="field-item even"><?php print theme('image', array(
                    'path'       => $field_flag_country_user['0']['uri'],
                ));?></div>
        </div>
    <?php }?>
<?php //print render($user_profile);



  ?>
</div>
