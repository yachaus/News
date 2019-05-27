<?php


namespace AdminPanel;


use App\View;

class AdminDataTable
{
    protected $models;
    protected $functions;
    protected $table = [];

    /**
     * AdminDataTable constructor.
     * @param $models
     * @param callable ...$functions
     */
    public function __construct($models, callable ...$functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    /**
     * @return array
     */
    public function render(){
        $this->table = [];
        foreach ($this->models as $k => $model){
            foreach ($this->functions as $function){
                $this->table[$k][] = $function($model);
            }
        }
        return $this->table;
    }

}