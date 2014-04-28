<?php
require_once 'Controller.php';
class GroupsController extends Controller{

    public function groupslist(){
        $this->isAdmin();
        $this->groups->groupslist();
    }
    public function roleedit($id){
        $this->isId();
        $this->groups->roleedit($id);
    }
}

?>
