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
     * @var integer
     */
    public $post_id;

    /**
     *
     * @var string
     */
    public $body;

}
