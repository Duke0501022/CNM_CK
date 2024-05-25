<style>
    /* Teacher section styling */
    .teacher-section {
        display: flex;
        align-items: center;
    }

    .teacher-photo {
        width: 80px;
        height: 80px;
        margin-right: 20px;
    }

    .teacher-info h5 {
        margin: 0;
        font-size: 1.25rem;
    }

    .teacher-info p {
        margin: 0;
        color: #666;
    }

    /* Chat container styling */
    .chat-container {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    #chat-messages {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 1rem;
        height: 400px;
        overflow-y: auto;
    }

    .message {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        max-width: 70%;
    }

    .message-sent {
        /* background-color: #d1ecf1; */
        align-self: flex-end;
        /* Tin nhắn từ người gửi */
        margin-left: auto;
        margin-right: 10px;
        /* Đặt margin-right để tin nhắn của phuhuynh nằm bên phải */
        background-color: #70D6F5;
        padding: 10px;
        border-radius: 10px;
        /* float: right; */
    }

    .message-received {
        background-color: #f8d7da;
        align-self: flex-start;
        /* Tin nhắn từ người nhận */
        margin-left: 10px;
        /* Đặt margin-left để tin nhắn của chuyenvien nằm bên trái */
        padding: 10px;
        border-radius: 10px;
    }

    /* Input group styling */
    .input-group {
        margin-top: 1rem;
    }

    #message-input {
        height: 45px;
    }

    #send-message-btn {
        height: 45px;
    }
</style>

<?php
$idPhuHuynh = $_GET['idPhuHuynh'];
?>

<div class="container-fluid container-feedback">
    <div class="row">
        <!-- Thông tin phụ huynh -->
        <div class="col-md-4">
            <div class="feedback-section">
                <h4>Phụ Huynh</h4>
                <?php
                // include_once("controller/TuVanKH/cTuVanKH.php");
                include_once("model/TuVanKH/mTuVanKH.php");
                $mTuVan = new mTuVanKH();
                $listcv = $mTuVan->select_PhuHuynh($idPhuHuynh);
                foreach ($listcv as $cv) {
                ?>
                    <div class="teacher-section mb-3"><?php
                    echo '<img src="/admin/assets/uploads/images/' . $cv["hinhAnh"] . '" alt="Ảnh Giáo Viên" class="teacher-photo img-fluid rounded-circle">';
                    ?>
                        <div class="teacher-info">
                            <h5><?php echo $cv['hoTen']; ?></h5>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- Khung chat -->
        <div class="chat-container">
            <div id="chat-messages" class="border rounded p-3" style="height: 400px; overflow-y: scroll;">
                <!-- Tin nhắn sẽ được hiển thị ở đây -->
            </div>
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Nhập tin nhắn của bạn..." id="message-input">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="send-message-btn">Gửi</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var sender_id = <?php echo json_encode($_SESSION['idChuyenVien']); ?>;
        var receiver_id = <?php echo json_encode($idPhuHuynh); ?>;

        if (!sender_id || !receiver_id) {
            console.error('Session variables not set correctly');
            return;
        }

        // Gửi tin nhắn
        function sendMessage() {
            var message = $('#message-input').val().trim();
            if (message === '') return;

            $.ajax({
                url: 'view/TuVan/ajax.php',
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
                        getMessages(); // Lấy lại tin nhắn sau khi gửi
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
            var message = $('#message-input').val();
            if (message.trim() === '') return;

            $.ajax({
                url: 'view/TuVan/ajax.php',
                type: 'GET',
                data: {
                    action: 'get_messages',
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    message: message
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
        function getNewMessages() {
            var message = $('#message-input').val();
            if (message.trim() === '') return;

            $.ajax({
                url: 'view/TuVan/ajax.php',
                type: 'GET',
                data: {
                    action: 'get_new_messages',
                    sender_id: sender_id,
                    receiver_id: receiver_id,
                    message: message
                },
                success: function(response) {
                    $('#chat-messages').append(response);
                    scrollChatToBottom();
                    markMessagesAsRead();
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
            sendMessage();
        });

        // Gửi tin nhắn khi nhấn phím Enter
        $('#message-input').keydown(function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                sendMessage();
            }
        });

        // Bắt đầu lấy tin nhắn khi trang được tải
        getMessages(sender_id, receiver_id);

        // Bắt đầu lấy tin nhắn mới khi trang được tải
        getNewMessages(sender_id, receiver_id);
    });
</script>