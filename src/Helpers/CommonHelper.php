<?php
/**
 * @author Slave of God <iamtheslaveofgod@gmail.com>
 */
if (! function_exists('locale_country')) {
    /**
     * Get country by locale.
     *
     * @param  string  $locale
     * 
     * @return string
     */
    function locale_country(string $locale)
    {
        $data = [
            'en' => 'gb',
            'zh-TW' => 'tw',
            'zh-HK' => 'cn'
        ];

        return isset($data[$locale]) ?  $data[$locale] : $locale;
    }
}
?>