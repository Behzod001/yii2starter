<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 12.06.2019
 * Time: 17:07
 */

namespace vendor\charts;


use app\models\Assessment;
use app\models\GroupTeachers;
use app\models\Subject;
use app\models\TeacherChart;
use Yii;
use yii\base\Component;

class TeachersPrices extends Component
{
    public $teacher;
    public $company;

    public function __construct($teacherId)
    {
        $this->teacher = $teacherId;
        $this->company = Yii::$app->getCompany()->id;
    }

    public function getArrays($subjectId)
    {
        $groupTeacher = GroupTeachers::findAll(['teacher_id' => $this->teacher, 'company_id' => $this->company]);
        $all = [];
        for ($i = 0; $i < Assessment::getMaxPeriod(); $i++) {
            $all[$i]['y'] = date('Y-m-d', Assessment::getDateByPeriod($groupTeacher[0]->group->id, $i));
        }
        $isDataPushed = false;

        foreach ($groupTeacher as $groupT) {
            $period = 0;
            for ($i = 0; $i < Assessment::getMaxPeriod(); $i++) {
                if ($groupT->group->subject->id == $subjectId) {
                    $all[$i]['a'] += Assessment::getTeacherAssessment($groupT->group_id, $this->teacher, $groupT->group->subject->id, $period);
                    $period++;
                    $isDataPushed =true;
                }
            }
        }
        return ($isDataPushed)?$all:null;
    }




}