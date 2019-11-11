<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 17.03.2019
 * Time: 22:48
 */

namespace pcore;


use pcore\datasets\DataSet;
use yii\web\NotFoundHttpException;

class ListenersGroups
{
    public $maxPeriod;
    public $listenersGroups = [];

    public $data = [];
    public $labels = [];

    public function __construct($listenersId)
    {
        $listenersGroups = \app\models\GroupListeners::find()
            ->where(['listener_id' => $listenersId])
            ->all();

        if (!$listenersGroups) {
            throw new NotFoundHttpException("User groups not found", 404);
        }

        if (is_array($listenersGroups)) {
            //setting default max period when object created
            $this->maxPeriod = $listenersGroups[0]->group->subject->getPeriods();
            foreach ($listenersGroups as $listenersGroup) {
                try {
                    $dataSets = new DataSet($listenersId, $listenersGroup->group_id);
                    $this->setData($dataSets);
                } catch (NotFoundHttpException $e) {
                    throw new NotFoundHttpException($e, $e->getCode());
                }
                $this->setListenersGroups($listenersGroup);
                $this->setMaxPeriod($listenersGroup);
            }
        } else {
            //setting default max period when object created
            $this->maxPeriod = $listenersGroups->group->subject->getPeriods();
            try {
                $listenersGroup = new DataSet($listenersId, $listenersGroups->group_id);
            } catch (NotFoundHttpException $e) {
                throw new NotFoundHttpException($e, $e->getCode());
            }
            $this->setData($listenersGroup);
        }

        $this->generateLabels();

    }

    public function generateLabels()
    {
        $period = $this->maxPeriod;

        for ($index = 0; $index <= $period; $index++) {
            if ($index == 0) $periodLabel = "Boshlang'ich natija";
            elseif ($index == $period) $periodLabel = "Yakuniy natija";
            else $periodLabel = $index . " period";
            array_push($this->labels, $periodLabel);
        }
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        array_push($this->data, $data->getDataSetOptions());
    }

    /**
     * @param mixed $maxPeriod
     */
    public function setMaxPeriod($listenersGroup)
    {
        if ($this->maxPeriod < $listenersGroup->group->subject->getPeriods()) {
            $this->maxPeriod = $listenersGroup->group->subject->getPeriods();
        }
    }

    /**
     * @param array $listenersGroup
     */
    public function setListenersGroups($listenersGroup)
    {
        array_push($this->listenersGroups, $listenersGroup->group_id);
    }
}