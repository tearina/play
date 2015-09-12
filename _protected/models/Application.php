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
    private $file = NULL;
    
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
            [['name'], 'required', 'message' => 'Не указано наименование'],
            [['group_id'], 'required', 'integer', 'max' => count($this->groupList), 'message' => 'Не указана группа'],
            [['name'], 'string', 'max' => 255, 'message' => 'Слишком длинное наименование'],
            [['pic'], 'file', 'extensions' => 'jpg', 'message' => 'Файл должен быть с расширением jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'info' => 'Info',
            'pic' => 'Pic',
        ];
    }
    
    public function beforeSave($insert)
    {
        if ($this -> pic){
            $this -> file = UploadedFile::getInstance($this, 'file');
            $this -> pic = 1;
        }
        else
            $this -> pic = 0;
        return parent::beforeSave($insert);
    }
    
    public function afterSave($insert)
    {
        if ($this -> file)
            $this -> file->saveAs('uploads/' . $this -> file -> baseName . '.' . $this -> file -> extension);
        return parent::afterSave($insert);
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
