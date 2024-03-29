<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty mb_truncate modifier plugin
 *自带的截取不支持中文，做了一个支持中文的截取
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_mb_truncate($string, $length = 80, $etc = '..',
                                  $break_words = false, $middle = false)
{
    if ($length == 0)
        return '';

    if (strlen($string) > $length) {
        $length -= min($length, strlen($etc));
//         if (!$break_words && !$middle) {
//             $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length+1,'utf-8'));
//         }
        if(!$middle) {
            return mb_substr($string, 0, $length,'utf-8') . $etc;
        } else {
            return mb_substr($string, 0, $length/2,'utf-8') . $etc . mb_substr($string, -$length/2,'utf-8');
        }
    } else {
        return $string;
    }
}

/* vim: set expandtab: */

?>
