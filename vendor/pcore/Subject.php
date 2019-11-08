<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 17.03.2019
 * Time: 22:35
 */
namespace pcore;

class Subject extends \app\models\Subject
{

    public static $count = 0;
    public $name = 'Subject name';
    public $label;
    public $expired = 2592000;
    public $period = "One month";

    public function __construct($name,$expired,$period)
    {
        self::$count++;
        $this->setName($name);
        $this->setExpired($expired);
        $this->setPeriod($period);

    }

    /**
     * @param int $count
     */
    public static function setCount($count)
    {
        self::$count = $count;
    }

    /**
     * @param int $expired
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return int
     */
    public static function getCount()
    {
        return self::$count;
    }

    /**
     * @return int
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }


}