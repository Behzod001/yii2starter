<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 23.03.2019
 * Time: 14:19
 */

namespace pcore\datasets;
use app\models\Groups;
use yii\base\NotSupportedException;
use yii\web\NotFoundHttpException;

/**
 * Class DataSet
 * @package pcore\datasets
 * Listeners one subject reults
 * generates chart optional datasets
 */

class DataSet
{

    static $count;
    public $label = 'label ';
    public $backgroundColor = "rgba(255,99,132,0.2)";
    public $borderColor = "rgba(255,99,132,1)";
    public $pointBackgroundColor = "rgba(255,99,132,1)";
    public $pointBorderColor = "#fff";
    public $pointHoverBackgroundColor = "#fff";
    public $pointHoverBorderColor = "rgba(255,99,132,1)";

    public $data = [];

    public function __construct($user,$group)
    {
        $group = \app\models\Groups::findOne($group);
        $user = \app\models\Listeners::findOne($user);

        $message =  false;
        $message .= (!$group)?$group."Group not fount":false;
        $message .= (!$user)?$user." User not found ":false;
        if($message){
            throw new NotFoundHttpException($message,404);
        }

        $this->setData($user->id,$group->id);
        $this->setLabel($group);
        $this->setBackgroundColor();
        $this->setBorderColor();
        $this->setPointBackgroundColor();
        $this->setPointBorderColor();
        $this->setPointHoverBackgroundColor();
        $this->setPointHoverBorderColor();
    }

    public function getDataSetOptions(){
        // getting reflection object from Self
        $ref = new \ReflectionClass(self::class);

        $index=0;
        // getting all public methods in $ref object

        foreach ($ref->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            // getting properties in $ref class

            $methodName = $ref->getProperties()[$index]->name;
            // check exists getter method in $ref

            if($ref->hasMethod("get".ucfirst($methodName))){
                    $dataSetOptions[$ref->getProperties()[$index]->name] = call_user_func([self::class,"get".ucfirst($methodName) ]);
            }
            $index++;
        }
        $dataSetOptions['data'] = $this->data;
        return $dataSetOptions;
    }


    /**
     * @param array $data
     */
    public function setData($user,$group)
    {
        if(intval($user) && intval($group)){
            $this->data = Data::getDataAsArray($user,$group);
        }
        else{
            throw new NotSupportedException("Properties not supprted");
        }
    }

    /**
     * @param string $pointHoverBorderColor
     */
    public function setPointHoverBorderColor()
    {
//        default "rgba(255,99,132,1)";
        $r = 255+self::$count/255;
        $g = 99+self::$count/255;
        $b = 132+self::$count/255;
        $this->pointHoverBorderColor = (self::$count>1)?"rgba($r,$g,$b,0.2)":$this->pointHoverBorderColor;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @return string
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * @return string
     */
    public function getPointBackgroundColor()
    {
        return $this->pointBackgroundColor;
    }

    /**
     * @return string
     */
    public function getPointBorderColor()
    {
        return $this->pointBorderColor;
    }

    /**
     * @return string
     */
    public function getPointHoverBackgroundColor()
    {
        return $this->pointHoverBackgroundColor;
    }

    /**
     * @return string
     */
    public function getPointHoverBorderColor()
    {
        return $this->pointHoverBorderColor;
    }

    /**
     * @param string $label
     */
    public function setLabel($group)
    {
        ($group instanceof Groups)? $this->label = $group->subject->name: $this->label .= self::$count;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor()
    {
        $r = 255+self::$count/255;
        $g = 99+self::$count/255;
        $b = 132+self::$count/255;
        $this->backgroundColor = (self::$count>1)?"rgba($r,$g,$b,0.2)":$this->backgroundColor;
    }

    /**
     * @param string $borderColor
     */
    public function setBorderColor()
    {
//        default "rgba(255,99,132,1)";
        $r = 255+self::$count/255;
        $g = 99+self::$count/255;
        $b = 132+self::$count/255;
        $this->borderColor = (self::$count>1)?"rgba($r,$g,$b,1)":$this->borderColor;
    }

    /**
     * @param string $pointBackgroundColor
     */
    public function setPointBackgroundColor()
    {
//        default "rgba(255,99,132,1)"
        $r = 255+self::$count/255;
        $g = 99+self::$count/255;
        $b = 132+self::$count/255;
        $this->pointBackgroundColor = (self::$count>1)?"rgba($r,$g,$b,1)":$this->pointBackgroundColor;
    }

    /**
     * @param string $pointBorderColor
     */
    public function setPointBorderColor()
    {
//        default "#fff"
        $r = 255+self::$count/255;
        $g = 99+self::$count/255;
        $b = 132+self::$count/255;
        $this->pointBorderColor = (self::$count>1)?"rgba($r,$g,$b,1)":$this->pointBorderColor;
    }

    /**
     * @param string $pointHoverBackgroundColor
     */
    public function setPointHoverBackgroundColor()
    {
//        default "#fff";
        $r = 255+self::$count/255;
        $g = 99+self::$count/255;
        $b = 132+self::$count/255;
        $this->pointHoverBackgroundColor = (self::$count>1)?"rgba($r,$g,$b,1)":$this->pointHoverBackgroundColor;
    }
}