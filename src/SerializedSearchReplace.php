<?php

class SerializedSearchReplace {
    /**
     * @var string Regular expression matching serialized strings
     */
    private static $serializedPattern = '!s:(\d+):([\\\\]?"[\\\\]?"|[\\\\]?"((.*?)[^\\\\])[\\\\]?");!';

    /**
     * Unespace quotes
     * 
     * @param string $string String containing escaped quotes
     * @return string
     */
    private static function unescapeQuotes($string)
    {
        return str_replace('\"', '"', $string);
    }

    /**
     * Repair serialized data by correcting invalid length values
     * 
     * @param string $string
     * @return string
     */
    public static function repair($string)
    {
        return preg_replace_callback(self::$serializedPattern, function($matches) {
            $string = $matches[2];

            $string = self::unescapeQuotes($string);
            $string = str_replace('"', '', $string);

            $length = \strlen($string);

            return 's:' . $length . ':"' . $string . '";';
        }, $string);
    }

    /**
     * Safely replace all occurrences of a string in serialized data
     * 
     * @param string|array $search
     * @param string|array $replace
     * @param string $subject
     * @param int|null &$count
     * @return string
     */
    public static function replace($search, $replace, $subject, &$count = null)
    {
        return self::repair(
            str_replace($search, $replace, $subject, $count)
        );
    }
}
