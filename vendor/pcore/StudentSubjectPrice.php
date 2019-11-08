<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 17.03.2019
 * Time: 22:51
 */

namespace pcore;


class StudentSubjectPrice
{
    private $student;
    private $subject;
    public $price;
    public $periodNumber;

    public function __construct($student, $subject,$price,$periodNumber)
    {
        $this->setSubject($subject);
        $this->setStudent($student);
        $this->setPrice($price);
        $this->setPeriodNumber($periodNumber);
    }

    /**
     * @param mixed $periodNumber
     */
    public function setPeriodNumber($periodNumber)
    {
        $this->periodNumber = $periodNumber;
    }
    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @param mixed $Subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param mixed $student
     */
    public function setStudent($student)
    {
        $this->student = $student;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getPeriodNumber()
    {
        return $this->periodNumber;
    }
}
