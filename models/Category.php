<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $create_date
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        // return '{{%tbl_category}}';
        // If a table name is given as {{%TableName}}, then the percentage character % will be
        // replaced with the table prefix. For example, {{%post}} becomes {{tbl_post}}.
        return 'tbl_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            // Safe is provided so that you can declare an attribute to be safe without actually
            // validating it. In this case MySQL auto inserts it.
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // Displayed to end users in places such as form inputs and error messages
    public function attributeLabels()
    {
        return [
            'name' => 'Category Name',
        ];
    }

    public function getJob()
    {
        return $this->hasMany(Job::class, ['category_id' => 'id']);
    }
}
