<?php
namespace born05\twofactorauthentication\models;

use Craft;
use craft\base\Model;

class AuthenticationCode extends Model
{
    /**
     * Validates the authentication code.
     *
     * @param null $attributes
     * @param bool $clearErrors
     *
     * @return bool|null
     */
    public function validate($attributes = null, $clearErrors = true)
    {
        // Don't allow whitespace in the authenticationCode.
        if (preg_match('/\s+/', $this->authenticationCode))
        {
            $this->addError('authenticationCode', Craft::t('two-factor-authentication', 'Spaces are not allowed in the authentication code.'));
        }

        return parent::validate($attributes, false);
    }

    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array(
            'authenticationCode' => array(AttributeType::String, 'maxLength' => 100, 'required' => true),
        );
    }
}