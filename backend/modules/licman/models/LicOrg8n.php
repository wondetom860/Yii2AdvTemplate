<?php

namespace backend\modules\licman\models;

use Yii;
use common\models\User;
use backend\modules\licman\models\LicApp;

/**
 * This is the model class for table "lic_org".
 *
 * @property int $id
 * @property string $name Name
 * @property string $code Code: row-columun
 * @property int $created_at Created At
 * @property int|null $updated_at Updated At
 * @property int $created_by Created By
 * @property int|null $updated_by Updated By
 * @property string|null $data Data
 *
 * @property User $createdBy
 * @property LicApp[] $licApps
 * @property User $updatedBy
 */
class LicOrg8n extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lic_org';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_at', 'updated_by', 'data'], 'default', 'value' => null],
            [['name', 'code', 'created_at', 'created_by'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['data'], 'string'],
            [['name', 'code'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'name' => 'Name',
            'code' => 'Code',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'data' => 'Data',
        ];
    }

    public function suchExists($id = null)
    {
        $query = self::find()->where(['name' => $this->name, 'code' => $this->code]);
        if ($id) {
            $query->andWhere(['!=', 'id', $id]);
        }
        return $query->exists();
    }

    public function getData()
    {
        $this->data =  md5(serialize([
            'name' => $this->name,
            'code' => $this->code,

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
     * Gets query for [[LicApps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicApps()
    {
        return $this->hasMany(LicApp::class, ['org_relId' => 'id']);
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
