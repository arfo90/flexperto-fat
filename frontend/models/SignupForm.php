<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $mobileNumber;
    public $imageFile;
    public $addressImage;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['mobileNumber', 'required'],
            ['mobileNumber', 'integer', 'min' => 8],

            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->mobileNumber = $this->mobileNumber;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->addressImage = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}
