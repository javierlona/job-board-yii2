<?php

namespace app\models;

use yii\db\Security;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
//    Add as a property b/c we don't need/want it in the database
    public $confirm_password;

    public static function tableName()
    {
        return '{{%tbl_user}}';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['full_name', 'username', 'email', 'password', 'confirm_password'], 'required'],

            // the email attribute should be a valid email address
            ['email', 'email'],

            // compare passwords
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],

        ];
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    /**
     * @param string $password
     * @return bool if password is valid for current user
     */
    public function validatePassword($password)
    {
        $user = User::findByUsername($this->username);

        if (\Yii::$app->getSecurity()->validatePassword($password, $user->password)) {
            // all good, logging user in
            return true;
        } else {
            // wrong password
            return false;
        }
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getJob()
    {
        return $this->hasMany(Job::class, ['user_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            if(isset($this->password)) {
                $this->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }
}