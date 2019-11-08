<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 21.03.2019
 * Time: 13:33
 */

namespace app\models;


class Listeners extends User
{
    const TEACHER = 1;
    const LISTENER = 2;


    /**
     * @param mixed $course
     */
    public function getCourse()
    {
        return $this->groupListeners->group->subject->name;
    }

    public function getMyGroup()
    {
        return $this->groupListeners->group->name;
    }
    public function getMyGroupId()
    {
        return $this->groupListeners->group->id;
    }

    public function getGroupListeners()
    {
        return $this->hasOne(GroupListeners::className(), ['listener_id' => 'id']);
    }

}