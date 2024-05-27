<style>
    .message {
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    max-width: 70%;
}

.message-sent {
    align-self: flex-end;
    margin-right: auto;
    margin-left: 10px;
    background-color: #70D6F5;
    padding: 10px;
    border-radius: 10px;
    max-width: fit-content;
}

.message-received {
    align-self: flex-start;
    margin-left: 350px;
    margin-right: auto;
    background-color: #f8d7da;
    padding: 10px;
    border-radius: 10px;
    max-width: fit-content;
}

.chat-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align chat to the left */
}
#chat-messages {
    max-height: 400px; /* Set maximum height for chat messages container */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 10px;
    border: 1px solid #ccc; /* Add border for clarity */
    border-radius: 10px;
}

.message {
    margin-bottom: 10px; /* Add spacing between messages */
    padding: 10px; /* Add padding inside messages */
}

.message-sent {
    align-self: flex-end; /* Align sent messages to the right */
    background-color: #70D6F5; /* Set background color for sent messages */
}

.message-received {
    align-self: flex-start; /* Align received messages to the left */
    background-color: #f8d7da; /* Set background color for received messages */
}

</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin tài khoản</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS for custom button styles */
    .btn-primary,
    .btn-secondary {
        background-color: #007bff; /* Blue */
        border-color: #007bff; /* Blue */
        color: #fff; /* White text */
        padding: 10px 20px; /* Adjust padding as needed */
        border-radius: 5px; /* Rounded corners */
        font-size: 16px; /* Adjust font size as needed */
        cursor: pointer; /* Cursor style */
        transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Smooth transition */
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        border-color: #0056b3; /* Darker blue on hover */
    }

    .btn-primary:focus,
    .btn-secondary:focus {
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.5); /* Focus glow effect */
    }

    .btn-primary:active,
    .btn-secondary:active {
        background-color: #0056b3; /* Darker blue when clicked */
        border-color: #0056b3; /* Darker blue when clicked */
    }

    .btn-primary.disabled,
    .btn-primary:disabled,
    .btn-secondary.disabled,
    .btn-secondary:disabled {
        opacity: 0.65; /* Reduced opacity for disabled state */
        cursor: not-allowed; /* Cursor style */
    }
    .card {
    margin-bottom: 20px; /* Add some bottom margin for spacing */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
}

.card-body {
    padding: 20px; /* Add padding inside the card body */
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 10px; /* Rounded corners */
}

.card-title {
    color: #007bff; /* Blue title */
    font-size: 24px; /* Larger font size for title */
    margin-bottom: 0; /* Remove bottom margin for title */
}
</style>
</head>

<body>
<?php
// kiểm tra $idChuyenVien có tồn tại không
if (!isset($_SESSION['idChuyenVien'])) {
    echo "<script>alert('Bạn chưa đăng nhập!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit;
} else {
    $idChuyenVien = $_SESSION['idChuyenVien'];
}
$idPhuHuynh = $_GET['idPhuHuynh'];


?>

<div class="container user-info">
    <div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card">
    <div class="card-body text-center">
    <?php
    include_once("model/mTuVanKH.php");
    $mTuVan = new mTuVanKH();
    $listcv = $mTuVan->select_PhuHuynh($idPhuHuynh);
    foreach ($listcv as $cv) {
        echo "Tư vấn phụ huynh: " . $cv['hoTen'];
    }
    ?>
</div>
        </div>
        <!-- Khung chat -->
        <div class="">
        <div class="chat-messages-container" style="width: 600px;"> <!-- Adjust the width as needed -->
    <div id="chat-messages" class="border rounded p-3" style="height: 400px; overflow-y: scroll; width: 100%;"> <!-- Set width to 100% to fill its container -->
        <!-- Chat messages content -->
    </div>
</div>
                <div class="input-group mt-3">
                    <!-- Thêm một div để hiển thị "You:" -->
                    <div id="you-label" class="input-group-prepend" style="display: none;">
                        <span class="input-group-text">You:</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nhập tin nhắn của bạn..." id="message-input">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="send-message-btn">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
        </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var sender_id = <?php echo json_encode($idPhuHuynh); ?>;
        var receiver_id = <?php echo json_encode($idChuyenVien); ?>;

        if (!sender_id || !receiver_id) {
            console.error('Session variables not set correctly');
            return;
        }

        // Gửi tin nhắn
        function sendMessage(message) {
            $.ajax({
                url: 'view/ajax.php',
                type: 'POST',
                data: {
                    action: 'send_message',
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    message: message
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        $('#message-input').val('');
                        getMessages(sender_id, receiver_id); // Lấy lại tin nhắn sau khi gửi
                    } else {
                        console.error('Error: ' + result.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error: ' + status + ' - ' + error);
                }
            });
        }

        // Lấy tin nhắn
        function getMessages(sender_id, receiver_id) {
            $.ajax({
                url: 'view/ajax.php',
                type: 'GET',
                data: {
                    action: 'get_messages',
                    sender_id: sender_id,
                    receiver_id: receiver_id
                },
                success: function(response) {
                    $('#chat-messages').html(response);
                    scrollChatToBottom();
                },
                complete: function() {
                    setTimeout(function() {
                        getMessages(sender_id, receiver_id);
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error: ' + status + ' - ' + error);
                }
            });
        }

        // Lấy tin nhắn mới
        function getNewMessages(sender_id, receiver_id) {
            $.ajax({
                url: 'view/ajax.php',
                type: 'GET',
                data: {
                    action: 'get_new_messages',
                    sender_id: sender_id,
                    receiver_id: receiver_id
                },
                success: function(response) {
                    $('#chat-messages').append(response);
                    scrollChatToBottom();
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error: ' + status + ' - ' + error);
                }
            });
        }

        // Cuộn tin nhắn xuống dưới cùng
        function scrollChatToBottom() {
            var chatMessages = document.getElementById('chat-messages');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Gửi tin nhắn khi nhấn nút "Gửi"
        $('#send-message-btn').click(function() {
            var message = $('#message-input').val().trim();
            if (message !== '') {
                sendMessage(message);
            }
        });

        // Gửi tin nhắn khi nhấn phím Enter
        $('#message-input').keydown(function(event) {
            if (event.key === 'Enter') {
                var message = $('#message-input').val().trim();
                if (message !== '') {
                    sendMessage(message);
                }
            }
        });

        // Bắt đầu lấy tin nhắn khi trang được tải
        getMessages(sender_id, receiver_id);

        // Bắt đầu lấy tin nhắn mới khi trang được tải
        getNewMessages(sender_id, receiver_id);
    });
</script>