<?php

namespace Fjarfs\SrcGeneral\Helpers;

class Access
{

    /**
     * Access module user
     *
     * @param object $user, string $uri
     * @return bool
     */
    public static function module($uri, $user)
    {
        if ($uri) {
            $uri = explode('/', $uri);
            if (isset($uri[0]) && $uri[0] == 'api') {
                if (isset($uri[3])) {
                    $userType = isset($user->type) ? $user->type : null;

                    if ($uri[3] == $userType || in_array($uri[3], ['general', 'source', 'service']) == true) {
                        return true;
                    }

                    if ($uri[3] == 'paguyuban' && $userType == 'principal') {
                        return true;
                    }

                    if ($uri[3] == 'retailer' && in_array($userType, ['cashier', 'cashier-desktop'])) {
                        return true;
                    }

                    if ($uri[3] == 'principal' && in_array($userType, ['supplier', 'vendor'])) {
                        return true;
                    }
                }
            } else {
                return true;
            }
        }

        return false;
    }
}
