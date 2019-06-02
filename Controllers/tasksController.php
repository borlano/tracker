<?php

class tasksController extends Controller
{
    private $limit = 3;

    public function index()
    {
        $this->render("index");
    }

    public function getAllTasks($page = 1, $column = "id", $sort = "asc")
    {
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();
        $offset = ($page - 1) * $this->limit;

        $res_tasks = $tasks->showAllTasks($offset, $this->limit, $column, $sort);
        $res_count = $tasks->getTotalCount();


        $res = "";
        foreach ($res_tasks as $task) {
            $res .= '<tr>';
            $res .= "<td>" . $task['id'] . "</td>";
            $res .= "<td>" . $task['username'] . "</td>";
            $res .= "<td>" . $task['email'] . "</td>";
            if($task["status"] == 1){
                $res .= "<td><i class=\"far fa-check-circle\"></i></td>";
            }else{
                $res .= "<td><i class=\"fas fa-star-of-life\"></i></td>";
            }
            $res .= "<td>";
            if($this->isAdmin()) {
                $res .= "<a class='btn btn-info btn-xs' href='/tasks/edit/?id=" . $task["id"] . "' > Редактировать</a>";
                if ($task["status"] != 1) {
                    $res .= "<a href='/tasks/agree/?id=" . $task["id"] . "' class='btn btn-info btn-xs'></span>Завершить задачу</a>";
                }
            }
            $res .= "</td>";
            $res .= "</tr>";
        }
        $data["tasks"] = $res;
        $data["count"] = $res_count;
        $data["limit"] = $this->limit;
        echo json_encode($data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $this->validate($_POST);

            if (empty($data["errors"])) {
                require(ROOT . 'Models/Task.php');

                $task = new Task();

                if ($task->create($data["username"], $data["email"], $data["description"])) {
                    header("Location: /tasks/index");
                }


                $this->render("create");
            } else {
                $this->set($data);
                $this->render("create");
            }
        } else {
            $this->render("create");
        }
    }

    public function edit($id)
    {
        if($this->isAdmin()) {
            require(ROOT . 'Models/Task.php');
            $task = new Task();

            $d["task"] = $task->showTask($id);

            if (isset($_POST["description"])) {
                if ($task->edit($id, $_POST["description"])) {
                    header("Location: /tasks/index");
                }
            }
            $this->set($d);
            $this->render("edit");
        }else{
            header("Location: /tasks/index");
        }
    }

    public function agree($id)
    {
        if($this->isAdmin()) {
            require(ROOT . 'Models/Task.php');

            $task = new Task();
            if ($task->setStatus($id)) {
                header("Location: tasks/index");
            }
        }else{
            header("Location: /tasks/index");
        }
    }

    private function validate($post)
    {
        $username = $post["username"];
        $email = $post["email"];
        $description = $post["description"];


        $username = $this->clean($username);
        $email = $this->clean($email);
        $description = $this->clean($description);

        $data = [];
        $data["username"] = $username;
        $data["email"] = $email;
        $data["description"] = $description;
        if (empty($username)) {
            $data["errors"]["username_error"] = "Заполните имя";
        }
        if (empty($email)) {
            $data["errors"]["email_error"] = "Заполните email";
        }
        if (empty($description)) {
            $data["errors"]["description_error"] = "Заполните описание задачи";
        }

        if (!empty($data["errors"])) {
            return $data;
        }

        $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email_validate) {
            $data["errors"]["email_error"] = "Неправильно заполнен email";
        }

        return $data;

    }

    private function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
}

?>