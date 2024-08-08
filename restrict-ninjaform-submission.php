<?php
/*
Plugin Name: Restrict Ninjaform Submission after a certain date
Description: Restrict Ninjaform submission when a specified date is reached
Version: 1.0
Author: Casuarina Abdul Karim
*/

add_filter( 'ninja_forms_display_show_form', 'custom_check_form_expiration', 10, 2 );

//to utilise this feature:
//Add the Hidden Field: For each form where you want to apply an expiration date, include a hidden field key set to "custom_expiration_date" and set its default value to the desired expiration date in YYYY-MM-DD format.
//Add another Hidden Field: If you wish to customised the message, key set to "custom_expiration_message"

add_filter( 'ninja_forms_display_show_form', 'custom_check_form_expiration', 10, 2 );

function custom_check_form_expiration( $show_form, $form_id ) {
    $form_fields = Ninja_Forms()->form( $form_id )->get_fields();
    $expiration_message = "The form submission period has ended."; // Default message

    foreach ( $form_fields as $field ) {
        $field_settings = $field->get_settings();

        if ( isset( $field_settings['key'] ) && 'custom_expiration_date' == $field_settings['key'] ) {
            $expiration_date = $field_settings['default'];
            if ( new DateTime() > new DateTime( $expiration_date ) ) {
                // Look for the custom expiration message in the form fields
                foreach ($form_fields as $msg_field) {
                    $msg_field_settings = $msg_field->get_settings();
                    if ( isset( $msg_field_settings['key'] ) && 'custom_expiration_message' == $msg_field_settings['key'] ) {
                        $expiration_message = $msg_field_settings['default'];
                        break; // Break the loop once we find our message
                    }
                }
                echo "<div>{$expiration_message}</div>";
                return false; // Hide form if expired
            }
        }
    }
    return $show_form;
}



