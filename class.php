<?php

class Message {
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $role;
    public $message;

    public function __construct($user_id, $first_name, $last_name, $email, $role, $message)
    {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->role = $role;
        $this->message = $message;
    }

    public function getFullName()
    {
        if ($this->role == 1) {
            return $this->first_name . ' ' . $this->last_name;
        }elseif ($this->role == 2) {
            return 'Teacher_' . $this->first_name . ' ' . $this->last_name;
        }elseif ($this->role == 3) {
            return 'Parent_' . $this->first_name . ' ' . $this->last_name;
        }
        
    }

    public function getRole()
    {
        if ($this->role == 1) {
            return 'Student';
        } elseif ($this->role == 2) {
            return 'Teacher';
        } elseif ($this->role == 3) {
            return 'Parent';
        }
    }

    public function GetMassage()
    {
        if ($this->role == 1) {
            $this->role = 'Student';
            $full_name = $this->first_name . ' ' . $this->last_name;
        } elseif ($this->role == 2) {
            $this->role = 'Teacher';
            $full_name = 'Teacher_' . $this->first_name . ' ' . $this->last_name;
        } elseif ($this->role == 3) {
            $this->role = 'Parent';
            $full_name = 'Parent_' . $this->first_name . ' ' . $this->last_name;
        }
        
        return [
            'user_id' => $this->user_id,
            'full_name' => $full_name,
            'email' => $this->email,
            'role' => $this->role,
            'message' => $this->message,
            'date' => date('Y-m-d H:i:s')
        ];
    }
}
