<?php

namespace app\models;

use app\models\UploadForm;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "application".
 *
 * @property integer $id application id
 * @property string  $name application name
 * @property string  $info full application info
 * @property integer $group_id application group id
 * @property integer $pic application picture is exist
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * application group id
     */
    const GROUP_APPLICATION = 0;
    const GROUP_FILM = 1;
    const GROUP_MUSIC = 2;
    const GROUP_BOOK = 3;
    const GROUP_PRESS = 4;
    
    /**
     * application picture
     * @var file
     */
    public $pic_file;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'group_id'], 'required', 'message' => 'Необходимо заполнить обязательное поле'],
            [['name'], 'string', 'max' => 255, 'message' => 'Слишком длинное наименование'],
            [['group_id'], 'integer', 'max' => count($this -> groupList),'message' => 'Не указана группа'],
            [['info'], 'string'],
            [['pic'], 'integer'],
            [['pic_file'], 'safe'],
            [['pic_file'], 'image', 'extensions' => 'jpg', 'message' => 'Файл должен быть с расширением jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'info' => 'Описание',
            'group_id' => 'Группа',
            'pic' => 'Изображение',
            'pic_file' => 'Изображение'
        ];
    }
    
    public function beforeSave($insert)
    {
        $this -> pic = ($this -> pic_file)? 1 : 0;
        return parent::beforeSave($insert);
    }

    /**
     * Returns the array of group values.
     *
     * @return array
     */
    public function getGroupList()
    {
        $statusArray = [
            self::GROUP_APPLICATION  => 'Приложения',
            self::GROUP_FILM         => 'Фильмы',
            self::GROUP_MUSIC        => 'Музыка',
            self::GROUP_BOOK         => 'Книги',
            self::GROUP_PRESS        => 'Пресса'
        ];

        return $statusArray;
    }
}
