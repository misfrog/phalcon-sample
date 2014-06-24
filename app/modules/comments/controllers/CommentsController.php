<?php
namespace Sample\Comments\Controllers;

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Sample\Controllers\ControllerBase;
use Sample\Comments\Models\Comments;

class CommentsController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for comments
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Comments", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $comments = Comments::find($parameters);
        if (count($comments) == 0) {
            $this->flash->notice("The search did not find any comments");

            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $comments,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displayes the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a comment
     *
     * @param string $id
     */
    public function editAction($id)
    {

        if (!$this->request->isPost()) {

            $comment = Comments::findFirstByid($id);
            if (!$comment) {
                $this->flash->error("comment was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "comments",
                    "action" => "index"
                ));
            }

            $this->view->id = $comment->id;

            $this->tag->setDefault("id", $comment->id);
            $this->tag->setDefault("model", $comment->model);
            $this->tag->setDefault("model_id", $comment->model_id);
            $this->tag->setDefault("body", $comment->body);
            
        }
    }

    /**
     * Creates a new comment
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "index"
            ));
        }

        $comment = new Comments();

        $comment->model = $this->request->getPost("model");
        $comment->model_id = $this->request->getPost("model_id");
        $comment->body = $this->request->getPost("body");
        

        if (!$comment->save()) {
            foreach ($comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "new"
            ));
        }

        $this->flash->success("comment was created successfully");

        $this->response->redirect("posts/view/" . $comment->model_id);
    }

    /**
     * Saves a comment edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "index"
            ));
        }

        $id = $this->request->getPost("id");

        $comment = Comments::findFirstByid($id);
        if (!$comment) {
            $this->flash->error("comment does not exist " . $id);

            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "index"
            ));
        }

        $comment->model = $this->request->getPost("model");
        $comment->model_id = $this->request->getPost("model_id");
        $comment->body = $this->request->getPost("body");
        

        if (!$comment->save()) {

            foreach ($comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "edit",
                "params" => array($comment->id)
            ));
        }

        $this->flash->success("comment was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "comments",
            "action" => "index"
        ));

    }

    /**
     * Deletes a comment
     *
     * @param string $id
     */
    public function deleteAction($id)
    {

        $comment = Comments::findFirstByid($id);
        if (!$comment) {
            $this->flash->error("comment was not found");

            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "index"
            ));
        }

        if (!$comment->delete()) {

            foreach ($comment->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "comments",
                "action" => "search"
            ));
        }

        $this->flash->success("comment was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "comments",
            "action" => "index"
        ));
    }

}
