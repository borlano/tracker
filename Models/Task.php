<?php

class Task extends Model
{
    public function create($username, $email, $description)
    {
        $sql = "INSERT INTO tasks (username,email, description, created_at, updated_at) VALUES (:username,:email, :description, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'username' => $username,
            'email' => $email,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showAllTasks($offset, $limit, $column, $sort)
    {
        $sql = "SELECT * FROM tasks" . " ORDER BY " . "$column $sort" . " LIMIT " . $limit . " OFFSET " . $offset;

        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $description)
    {
        $sql = "UPDATE tasks SET description = :description, updated_at = :updated_at WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function setStatus($id)
    {
        $sql = 'UPDATE tasks SET status = 1 WHERE id = :id';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(["id" => $id]);
    }

    public function getTotalCount()
    {
        $sql = 'SELECT count(*) FROM tasks';
        $req = Database::getBdd()->query($sql)->fetchColumn();
        return $req;
    }
}

?>