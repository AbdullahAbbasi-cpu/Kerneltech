<?php

/**
 * AssetHelper
 *
 */

use Intervention\Image\Facades\Image;

/**
 * Return's admin assets directory
 *
 * CALLING PROCEDURE
 *
 * In controller call it like this:
 * $adminAssetsDirectory = adminAssetsDir() . $site_settings->site_logo;
 *
 * In View call it like this:
 * {{ asset(adminAssetsDir() . $site_settings->site_logo) }}
 *
 * @param string $role
 *
 * @return bool
 */
function uploadsDir($path = '')
{
    return $path != '' ? 'uploads/' . $path . '/' : 'uploads/';
}

function uploadsUrl($file = '')
{
    return $file != '' && file_exists(uploadsDir('users') . $file) ? uploadsDir('users') . $file : 'avatar.jpg';
}

function adminHasAssets($image)
{
    if (!empty($image) && file_exists(uploadsDir() . $image)) {
        return true;
    } else {
        return false;
    }
}

function matchChecked($param1, $param2)
{
    return $param1 == $param2 ? ' checked="checked" ' : '';
}

function matchSelected($param1, $param2)
{
    return $param1 == $param2 ? ' selected="selected" ' : '';
}

function generateRandomString($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getGender($id = null)
{
    $values = [
        '1' => 'Male',
        '2' => 'Female',
    ];

    return isset($id) && $id <= 2 && $id >= 1 ? $values[$id] : $values;
}

function getStatus($id = null)
{
    $values = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    return isset($id) && $id <= 2 && $id >= 1 ? $values[$id] : $values;
}

function filterUrl($key = '', $value = '')
{
    $data = $_SERVER['QUERY_STRING'];

    $data = str_replace(urlencode($key) . '=' . $value, '', $data);
    $data = str_replace('&&', '&', $data);

    return $data;
}

function convertImage($file, $filename)
{
    $image = Image::make($file);
    $image->resize(800, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $image->encode('webp', 75);

    return $image->save(public_path('uploads/' . $filename));
}
