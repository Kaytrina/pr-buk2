<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "claim".
 *
 * @property int $id_claim
 * @property int $id_user
 * @property string $name
 * @property string|null $discr
 * @property int $id_cat
 * @property string $photo_before
 * @property string $photo_after
 * @property string $time
 * @property string $status
 *
 * @property Category $cat
 * @property User $user
 */
class Claim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'claim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'id_cat', 'photo_before', 'photo_after'], 'required'],
            [['id_user', 'id_cat'], 'integer'],
            [['time'], 'safe'],
            [['status'], 'string'],
            [['name', 'discr'], 'string', 'max' => 100],
            [['photo_before', 'photo_after'], 'string', 'max' => 300],
            [['id_cat'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_cat' => 'id_cat']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_claim' => 'Номер заявления',
            'id_user' => 'Пользователь',
            'name' => 'Название',
            'discr' => 'Описание',
            'id_cat' => 'Категория',
            'photo_before' => 'Фото "до"',
            'photo_after' => 'Фото "после"',
            'time' => 'Время создания',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::className(), ['id_cat' => 'id_cat']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
