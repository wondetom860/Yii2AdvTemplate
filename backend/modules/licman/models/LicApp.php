<?php

namespace backend\modules\licman\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "lic_app".
 *
 * @property int $id
 * @property string $name Name
 * @property string $version Version
 * @property int $release_date Release Date
 * @property int $status Status: 0=Inactive, 1=Active
 * @property string|null $params_string_json Parameters in JSON format
 * @property string|null $params_array_serialized Parameters in serialized array format
 * @property int $org_relId Organization ID
 * @property string $enc_key Encryption Key
 * @property int $created_at Created At
 * @property int|null $updated_at Updated At
 * @property int $created_by Created By
 * @property int|null $updated_by Updated By
 * @property string|null $data Data
 *
 * @property User $createdBy
 * @property LicActivation[] $licActivations
 * @property LicOrg8n $orgRel
 * @property User $updatedBy
 */
class LicApp extends \yii\db\ActiveRecord
{
    public static $app_status = [
        0 => 'Inactive',
        1 => 'Active',
    ];

    public static function getAppStatusText($status)
    {
        return self::$app_status[$status] ?? 'Unknown';
    }

    public function getStatusLabel()
    {
        // look for any active activation entry exists.
        $activeActivation = $this->getLicActivations()->where(['status' => 1])->exists();
        if ($activeActivation) {
            if ($this->status != 1) {
                $this->status = 1;
            }
        } else {
            if ($this->status != 0) {
                $this->status = 0;
            }
        }
        $this->update(false, ['status']);
        return self::getAppStatusText($this->status);
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lic_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['params_string_json', 'params_array_serialized', 'updated_at', 'updated_by', 'data'], 'default', 'value' => null],
            [['name', 'version', 'release_date', 'status', 'org_relId', 'enc_key', 'created_at', 'created_by'], 'required'],
            [['release_date', 'status', 'org_relId', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['params_string_json', 'params_array_serialized', 'data', 'enc_key'], 'string'],
            [['name', 'version'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['org_relId'], 'exist', 'skipOnError' => true, 'targetClass' => LicOrg8n::class, 'targetAttribute' => ['org_relId' => 'id']],
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
            'name' => 'App Name',
            'version' => 'Version',
            'release_date' => 'Release Date',
            'status' => 'Status',
            'params_string_json' => 'Parameters (JSON)',
            'params_array_serialized' => 'Parameters (Encoded)',
            'org_relId' => 'Organization Name',
            'enc_key' => 'Enc Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'data' => 'Data',
        ];
    }

    public function suchExists($id = null)
    {
        $query = self::find()->where(['org_relId' => $this->org_relId, 'name' => $this->name, 'version' => $this->version]);
        if ($id) {
            $query->andWhere(['!=', 'id', $id]);
        }
        return $query->exists();
    }

    public function getData()
    {
        $this->data =  md5(serialize([
            'org_relId' => $this->org_relId,
            'name' => $this->name,
            'version' => $this->version,
            'release_date' => $this->release_date,
            'status' => $this->status,
            'params_string_json' => $this->params_string_json,
            'params_array_serialized' => $this->params_array_serialized,
            'enc_key' => $this->enc_key,

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
     * Gets query for [[LicActivations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicActivations()
    {
        return $this->hasMany(LicActivation::class, ['lic_app_relId' => 'id']);
    }

    /**
     * Gets query for [[OrgRel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgRel()
    {
        return $this->hasOne(LicOrg8n::class, ['id' => 'org_relId']);
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
