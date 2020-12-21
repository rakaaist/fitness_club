<?php

use App\App;

/**
 *
 * Checks if user(data) already exists in our saved file.
 *
 * If there is no such data(user) returns true.
 * If the data already exist in file, writes an error and returns false.
 *
 * @param string $field_value
 * @param array $field - input array
 * @return bool
 */
function validate_user_unique(string $field_value, array &$field): bool
{
    if (App::$db->getRowWhere('users', ['email' => $field_value])) {
        $field['error'] = 'This user already exists';

        return false;
    }

    return true;
}

/**
 * Function validates string not to have numbers.
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_text_no_numbers(string $field_value, array &$field): bool
{
    for ($i = 0; $i < strlen($field_value); $i++) {
        if (is_numeric($field_value[$i])) {
            $field['error'] = "Numbers can't be used";

            return false;
        }
    }

    return true;
}

/**
 * Validates text length to be up to 40 symbols.
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_text_length_40(string $field_value, array &$field): bool
{
    if (strlen($field_value) > 40) {
        $field['error'] = "Too many symbols - use up to 40";

        return false;
    }

    return true;
}

/**
 * Checks whether the user email already exists.
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_user_exists(string $field_value, array &$field): bool
{
    if (!App::$db->getRowWhere('users', ['email' => $field_value])) {
        $field['error'] = "This user doesn't exist";

        return false;
    }

    return true;
}

/**
 * Checks if there is such email and password in the database.
 *
 * If there is such user and password is the same as in database returns true.
 * If email is correct but password not - writes an error and returns false.
 *
 * @param array $filtered_input - clean inputs array with values
 * @param array $form - form array
 * @return bool
 */
function validate_login(array $filtered_input, array &$form): bool
{
    $user = App::$db->getRowWhere('users', [
        'email' => $filtered_input['email']]);

    if ($user) {
        if ($user['password'] === $filtered_input['password']) {
            return true;
    } else {
            $form['error'] = 'Incorrect password';

            return false;
        }
    }

    return false;
}

