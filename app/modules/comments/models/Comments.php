<?php
namespace Sample\Comments\Models;

class Comments extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $model;

    /**
     *
     * @var integer
     */
    public $model_id;

    /**
     *
     * @var string
     */
    public $body;

}
