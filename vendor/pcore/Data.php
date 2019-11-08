<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 23.03.2019
 * Time: 18:42
 */

namespace pcore;


class Data
{
    private $countLabels;
    public $labels = [];
    public $datasets = [];

    public function __construct($userId)
    {
        $groups = new ListenersGroups($userId);
        $this->setLabels($groups->labels);
        $this->setDataSets($groups->data);
        $this->countLabels = count($this->labels);
    }

    /**
     * @param array $labels
     */
    private function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @param array $dataSets
     */
    private function setDataSets($dataSets)
    {
        $this->datasets = $dataSets;
    }
}