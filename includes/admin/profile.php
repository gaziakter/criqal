<?php
function criqal_user_contact($method){
    $method['facebook'] = __('Facebook', 'criqal');
    $method['twitter'] = __('Twitter', 'criqal');
    $method['linkedin'] = __('Linkedin', 'criqal');

    return $method;
}

add_filter( 'user_contactmethods', 'criqal_user_contact' );