<?php
/**
 * This code is licensed under AGPLv3 license or Afterlogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace Aurora\Modules\MailSignup;

/**
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0
 * @license https://afterlogic.com/products/common-licensing Afterlogic Software License
 * @copyright Copyright (c) 2023, Afterlogic Corp.
 *
 * @property Settings $oModuleSettings
 *
 * @package Modules
 */
class Module extends \Aurora\System\Module\AbstractModule
{
    public function init()
    {
    }

    /**
     *
     * @return Module
     */
    public static function Decorator()
    {
        return parent::Decorator();
    }

    /**
     *
     * @return Settings
     */
    public function getModuleSettings()
    {
        return $this->oModuleSettings;
    }

    /**
     * Obtains list of module settings for authenticated user.
     * @return array
     */
    public function GetSettings()
    {
        \Aurora\System\Api::checkUserRoleIsAtLeast(\Aurora\System\Enums\UserRole::Anonymous);

        return [
            'ServerModuleName'	=> $this->oModuleSettings->ServerModuleName,
            'HashModuleName'	=> $this->oModuleSettings->HashModuleName,
            'CustomLogoUrl'		=> $this->oModuleSettings->CustomLogoUrl,
            'InfoText'			=> $this->oModuleSettings->InfoText,
            'BottomInfoHtmlText'	=> $this->oModuleSettings->BottomInfoHtmlText,
            'DomainList'		=> $this->oModuleSettings->DomainList
        ];
    }

    /**
     * All actions occur in subscriptions
     *
     * @param string $Name
     * @param string $Login
     * @param string $Password
     * @return boolean
     */
    public function Signup($Name, $Login, $Password)
    {
        return false;
    }
}
