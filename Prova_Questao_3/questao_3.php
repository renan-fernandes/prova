<?php

class MyUserClass
{
    public function getUserList()
    {
        $dbconn = $this->connect();
        $results = $dbconn->query('select name from user');

        if ((isset($results)) && ($results != null)) {
            sort($results);

            $dbconn->close();
            return $results;
        }
        $dbconn->close();
    }

    public function connect()
    {
        $dbconn = new DatabaseConnection('localhost', 'user', 'password');
        return $dbconn;
    }
}
