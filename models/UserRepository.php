<?php

/**
 * UserRepository.
 *
 * @author y.takai
 */
class UserRepository extends DbRepository
{
    public function insert($email_address, $password)
    {
        $password = $this->hashPassword($password);
        $now = new DateTime();

        $sql = "
            INSERT INTO user(email_address, password, created_at)
                VALUES(:email_address, :password, :created_at)
        ";

        $stmt = $this->execute($sql, array(
            ':email_address'  => $email_address,
            ':password'   => $password,
            ':created_at' => $now->format('Y-m-d H:i:s'),
        ));
    }

    public function hashPassword($password)
    {
        return sha1($password . 'SecretKey');
    }

    public function fetchByUserName($email_address)
    {
        $sql = "SELECT * FROM user WHERE email_address = :email_address";

        return $this->fetch($sql, array(':email_address' => $email_address));
    }

    public function isUniqueUserName($email_address)
    {
        $sql = "SELECT COUNT(id) as count FROM user WHERE email_address = :email_address";

        $row = $this->fetch($sql, array(':email_address' => $email_address));
        if ($row['count'] === '0') {
            return true;
        }

        return false;
    }

    public function fetchAllFollowingsByUserId($user_id)
    {
        $sql = "
            SELECT u.*
                FROM user u
                    LEFT JOIN following f ON f.following_id = u.id
                WHERE f.user_id = :user_id
        ";

        return $this->fetchAll($sql, array(':user_id' => $user_id));
    }
}
