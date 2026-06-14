<?php

namespace backend\modules\licman\models;

use Yii;
use common\models\User;
use backend\modules\licman\models\LicApp;
/**
 * This is the model class for table "lic_activation".
 *
 * @property int $id
 * @property int $lic_app_relId App ID
 * @property string $activation_code Activation Code
 * @property int|null $activation_date Activation Date
 * @property int|null $active_duration Active Duration in days
 * @property int $status Status: 0=Inactive, 1=Active, -1=Expired, 2=scheduled for activation
 * @property string $dec_key Decryption Key
 * @property int $created_at Created At
 * @property int|null $updated_at Updated At
 * @property int $created_by Created By
 * @property int|null $updated_by Updated By
 * @property string|null $data Data
 *
 * @property User $createdBy
 * @property LicApp $licAppRel
 * @property User $updatedBy
 */
class LicActivation extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lic_activation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activation_date', 'active_duration', 'updated_at', 'updated_by', 'data'], 'default', 'value' => null],
            [['lic_app_relId', 'activation_code', 'status', 'dec_key', 'created_at', 'created_by'], 'required'],
            [['lic_app_relId', 'activation_date', 'active_duration', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['data'], 'string'],
            [['activation_code', 'dec_key'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['lic_app_relId'], 'exist', 'skipOnError' => true, 'targetClass' => LicApp::class, 'targetAttribute' => ['lic_app_relId' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lic_app_relId' => 'Lic App Rel ID',
            'activation_code' => 'Activation Code',
            'activation_date' => 'Activation Date',
            'active_duration' => 'Active Duration',
            'status' => 'Status',
            'dec_key' => 'Dec Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'data' => 'Data',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[LicAppRel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicAppRel()
    {
        return $this->hasOne(LicApp::class, ['id' => 'lic_app_relId']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

}
