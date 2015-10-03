<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $mobile_number
 * @property integer $mobileNumber
 * @property string $addressImage
 */
class User extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'mobile_number', 'mobileNumber'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'addressImage'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            //[['imageFile'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'mobile_number' => 'Mobile Number',
            'mobileNumber' => 'Mobile Number',
            'addressImage' => 'Address Image',
        ];
    }

    public function saveImage()
    {
      //$this->addressImage = 'uploads/' . $this->addressImage->baseName . '.' . $this->addressImage->extension;
      $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
      $this->addressImage='uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
      $this->save();
    }
}
