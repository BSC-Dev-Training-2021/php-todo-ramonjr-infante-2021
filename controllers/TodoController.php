<?php
    include("model/TodoModel.php");
    class TodoController{

        public $TodoModel;
        
        function __construct() {
            $this->TodoModel = new TodoModel();
        }
        
        public function save_todo(){
            if(isset($_POST['save_todo_btn'])){
                if($_POST['todo_content'] != ""){
                 $this->TodoModel->save_todo($_POST['todo_content']);
                }
                else{
                    echo "<script>window.alert('Empty field')</script>'";
                }
            }
        }
        
        public function get_todos($todo_status){
            $limit_length = $this->TodoModel->get_length_limit();
            $page = 1;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            return $this->TodoModel->get_todos($todo_status,$page,$limit_length[0]['list_length']);
        }
        public function complete_task(){
            if(isset($_POST['complete_task_btn'])){
               $this->TodoModel->complete_task($_POST['todo_id']);
               header("Location: http://localhost/php-todo-ramonjr-infante-2021/index.php");
            }
        }
        public function total_pagination($todo_status){
            $limit_length = $this->TodoModel->get_length_limit();
            return $this->TodoModel->total_pagination($todo_status,$limit_length[0]['list_length']);
        }
        public function total_complete_tasks($todo_status){
            return $this->TodoModel->get_todos($todo_status,1,100000000000);
        }
        public function save_per_page(){
            if(isset($_POST['save_length_btn'])){
                if($_POST['list_length']  != "0"){
                    $this->TodoModel->save_per_page($_POST['list_length']);
                    echo "<script>window.alert('Success. Limit per page updated to ".$_POST['list_length']."')</script>";
                    
                }
                else{
                    echo "<script>window.alert('Select number for page limit')</script>";
                }
            }
        }
    }
?>