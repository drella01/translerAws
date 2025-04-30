<!-- resources/views/chat.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lex Chat Interface</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #chat-messages {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        #user-input {
            width: 80%;
            padding: 5px;
        }
        #send-button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div id="chat-messages"></div>
    <input type="text" id="user-input" placeholder="Type your message...">
    <button id="send-button">Send</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#send-button').click(sendMessage);
            $('#user-input').keypress(function(e) {
                if(e.which == 13) sendMessage();
            });

            function sendMessage() {
                var message = $('#user-input').val();
                if(message.trim() === '') return;

                appendMessage('You: ' + message);
                $('#user-input').val('');

                $.ajax({
                    url: '/lex/send-message',
                    method: 'POST',
                    data: { message: message },
                    success: function(response) {
                        appendMessage('Bot: ' + response.message);
                    },
                    error: function() {
                        appendMessage('Bot: Sorry, I encountered an error.');
                    }
                });
            }

            function appendMessage(message) {
                $('#chat-messages').append('<p>' + message + '</p>');
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
            }
        });
    </script>
</body>
</html>
