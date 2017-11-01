<?php
/**
 * Class CSRFChecker
 *
 * 徳丸本の CSRF の項を参考に、session_idをtokenとした
 *
 */
class CSRFChecker
{
    const FORM_NAME = 'token';

    public static function is_safe()
    {
        if (self::fetchToken() === Param::get(self::FORM_NAME)) {
            return true;
        }

        return false;
    }

    /**
     * @see http://co3k.org/blog/csrf-token-should-not-be-session-id
     * @return string
     */
    public static function fetchToken()
    {
        return sha1(session_id());
    }

    /**
     * token を持つ inputタグを返します
     */
    public static function generateTokenTag()
    {
        $token = htmlspecialchars(self::fetchToken(), ENT_COMPAT, 'UTF-8');
        return '<input type="hidden" name="' . self::FORM_NAME . '" value="' . $token . '" />';
    }

}
