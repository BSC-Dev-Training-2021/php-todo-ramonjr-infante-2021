<?php
    class TodoModel{
        public $conn;

        function __construct() {
            include("connection/connection.php");
            $this->conn = $conn;
        }   

        public function save_todo($todo_content){
            $sql = "INSERT INTO todos (todo_content) VALUES 
            ('". $todo_content . "')";
            
            if (mysqli_query($this->conn, $sql)) {
                $last_id = mysqli_insert_id($this->conn);
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            }
        }
        public function get_todos($todo_status,$page,$per_page){
            $start_from=($page-1)*$per_page;
            $sql = "SELECT * FROM todos 
            WHERE todo_status='".$todo_status."' ORDER BY todo_id DESC LIMIT $start_from,$per_page";
            $result = $this->conn->query($sql);
            $data_array = $result->fetch_all(MYSQLI_ASSOC);
            // echo $result->num_rows;
            // echo json_encode($data_array);
            return $data_array;
            
        }
        public function complete_task($todo_id){
            $sql = "UPDATE todos
            SET todo_status = '0'
            WHERE todo_id = '". $todo_id ."'";
            if (mysqli_query($this->conn, $sql)) {
                // echo "Affected rows: " . $conn->affected_rows;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            }
        }
        public function get_length_limit(){
            $sql = "SELECT * FROM options";
            $result = $this->conn->query($sql);
            $data_array = $result->fetch_all(MYSQLI_ASSOC);
            return $data_array;

        }
        public function total_pagination($todo_status,$limit_length){
            $get="SELECT * from todos WHERE todo_status = '" . $todo_status . "'";
            $run_get= mysqli_query($this->conn,$get);
            //count the total posts
            $total_posts= mysqli_num_rows($run_get);
            $total_pages=ceil($total_posts/$limit_length);
            return $total_pages;
        }
    }
?>