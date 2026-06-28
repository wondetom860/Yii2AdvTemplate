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
    public static $_activation_status = [
        1 => 'Activated',
        0 => 'Expired',
        2 => 'Scheduled'
    ];


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
            [['data', 'dec_key'], 'string'],
            [['activation_code'], 'string', 'max' => 255],
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
            'lic_app_relId' => 'Application/Software',
            'activation_code' => 'Activation Code',
            'activation_date' => 'Activation Date',
            'active_duration' => 'Active Duration',
            'status' => 'Status',
            'dec_key' => 'Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'data' => 'Data',
        ];
    }

    public function generateActivationCode()
    {
        $app_name_abrv = '';
        foreach (explode(' ', $this->licAppRel->name) as $key => $value) {
            $app_name_abrv .= strtoupper($value[0]);
        }

        return $this->licAppRel->orgRel->code . '-' . $app_name_abrv . "#" . (str_pad(count($this->licAppRel->licActivations) + 1, 3, '0', STR_PAD_LEFT));
    }

    public function updateActiveStatus()
    {
        $status = $this->determineStatus();
        if ($status != $this->status) {
            $this->getData();
            $this->status = $status;
            $this->save(false, ['status']);
            if($status == 1){
                // propagate up
                $this->licAppRel->activate();
            }
        }
    }

    public function determineStatus()
    {
        $time = time();
        $activation_date = strtotime(date('d-m-Y', $this->activation_date));
        $activa_duration = $this->active_duration * 86400; //convert to seconds
        $status = 0; //defaults to expired
        $grace_time = ($activation_date + $activa_duration);
        // var_dump($activation_date, $activa_duration, $grace_time, $time, ($grace_time > $time));
        // exit;

        if ($activation_date > $time) {
            // scheduled
            $status = 2;
        } elseif ($grace_time < $time) {
            // expired;
            $status = 0;
        } else {
            // active
            $status = 1;
        }

        return $status;
    }

    public function getStatusText()
    {
        $this->updateActiveStatus();
        return self::$_activation_status[$this->status] ?? "Uknown";
    }

    public function suchExists($id = null)
    {
        $query = self::find()->where(['lic_app_relId' => $this->lic_app_relId, 'status' => $this->status]);
        if ($id) {
            $query->andWhere(['!=', 'id', $id]);
        }
        return $query->exists();
    }

    public function getData()
    {
        $this->data =  md5(serialize([
            'lic_app_relId' => $this->lic_app_relId,
            'activation_code' => $this->activation_code,
            'activation_date' => $this->activation_date,
            'active_duration' => $this->active_duration,
            'status' => $this->status,
            'dec_key' => $this->dec_key,

            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]));
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
