<?php
include 'class.php';

if (isset($_POST['user_id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['message'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $message = $_POST['message'];

    $massage = new Message($user_id, $first_name, $last_name, $email, $role, $message);

    $full_name = $massage->getFullName();
    $role = $massage->getRole();
    
    // var_dump($massage);
    if (file_exists('massage.json')) {
        $current_data = file_get_contents('massage.json');
        $array_data = json_decode($current_data, true);
        var_dump($array_data);
        $array_data[] = $massage->GetMassage();
        $final_data = json_encode($array_data);
        file_put_contents('massage.json', $final_data);
    } else {
        $massage = $massage->GetMassage();
        $massage = json_encode($massage);
        $massage = file_put_contents('massage.json', $massage);
    }

    if ($massage) {
        header('Location: index.php?success=Message sent successfully');
    } else {
        header('Location: index.php?error=Something went wrong');
    }
} else {
    header('Location: index.php?error=Please fill in all fields');
}