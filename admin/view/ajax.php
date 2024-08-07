<?php

session_start();
include_once(__DIR__ . '/../model/mTuVanKH.php');

if (isset($_POST['action']) && $_POST['action'] === 'send_message') {
    $message = $_POST['message'];
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];

    if (isset($_SESSION['idChuyenVien'])) {
        $idChuyenVien = $_SESSION['idChuyenVien'];
        $tuvan = new mTuVanKH();

        // Insert the chat message
        $insert_chat = $tuvan->insert_tuvanphuhuynh($sender_id, $receiver_id, $message);

        if ($insert_chat) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Could not insert message']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Session variables not set correctly']);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'get_messages') {
    $sender_id = $_GET['sender_id'];
    $receiver_id = $_GET['receiver_id'];

    $tuvan = new mTuVanKH();
    $messages = $tuvan->get_messages($sender_id, $receiver_id);

    // Render messages
    foreach ($messages as $message) {
        if ($message['sender_id'] == $sender_id) {
            echo '<div class="message message-sent">' . htmlspecialchars($message['message']) . '</div>';
        } else {
            echo '<div class="message message-received">' . htmlspecialchars($message['message']) . '</div>';
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'get_new_messages') {
    $sender_id = $_GET['sender_id'];
    $receiver_id = $_GET['receiver_id'];

    $tuvan = new mTuVanKH();
    $new_messages = $tuvan->get_new_messages($sender_id, $receiver_id);

    // Render messages
    foreach ($new_messages as $message) {
        if ($message['sender_id'] != $sender_id) {
            echo '<div class="message message-received">' . htmlspecialchars($message['message']) . '</div>';
        }
    }
}
?>
