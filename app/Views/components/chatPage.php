<?= $this->extend('Maintmplet') ?>
<?= $this->section('chatPage') ?>
<link rel="stylesheet" href="<?= base_url('css/chatCss.css')?>" />


<div class="container"> 
        <!-- Main Chat Screen -->
         
        <div id="chat-screen">
            <!-- Sidebar -->
             <div class="sidebar">
                <div class="user-profile">
                
                     <div>
                       <img class="small-profile" src="<?= base_url('img/avatars/1.png')?>" alt="User Avatar">
                       <span><?= $loginDetails['name']?></span>
                     </div>
                    <span id="chat-mode"></span>
                
                </div>
                <ul id="users-list">
                  <?php foreach ($userData as $user) { 
                    if ($user['emp_id'] === $loginDetails['emp_id']) { continue; }
                  ?>
                  <li id="agent-list" class="user" data-username="<?= $user['email']?>">
                    <img  class="small-profile" src="<?= base_url('img/avatars/1.png')?>" alt="User Avatar">
                    <div class="user-info ">
                      <span id="userheader"><?= $user['fname'] ?></span>
                      <small><?= $user['JobTitle']?></small>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
            </div> 
            <!-- Chat Area -->
            <div class="chat-area">
                <div class="chat-header">
                     <div> 
                       <img class="small-profile" src="<?= base_url('img/avatars/1.png')?>" alt="User Avatar">
                       <span><?= $loginDetails['name']?> </span>
                      </div>
                    <span id="chat-mode">WhatsApp</span>
                </div>
                <div id="messages" class="messages-container"></div>
                <div class="message-input">
                    <input type="text" id="message-input" placeholder="Type a message...">
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/socket.io/socket.io.js"></script>

    <script>
      var socket = io.connect('http://localhost:3000');
      var chatScreen = document.getElementById('chat-screen');
      var chatMode = document.getElementById('chat-mode');
      var messageInput = document.getElementById('message-input');
      var sendBtn = document.getElementById('send-btn');
      var messagesContainer = document.getElementById('messages');
      var usersList = document.getElementById('users-list');
      var currentUser = document.getElementById('current-user');
      var chatHeader = document.getElementById('chat-header');
      var chatArea = document.getElementById('chat-area');
      var agentList = document.querySelectorAll('agent-list');

      const sender = "<?= $loginDetails['email'] ?>";
      let receiver = null;
      socket.emit('logged',sender)
      
      document.querySelectorAll('#agent-list').forEach(user => {
        user.addEventListener('click', () => {
          receiver = user.getAttribute("data-username");
          console.log(receiver);  
            // document.querySelector('.receiver').textContent = currentReceiver;
            // document.getElementById('messages').innerHTML = '';
            socket.emit('joinRoom', {
                sender: sender,
                receiver: receiver
            });
        });
      });


    </script>






<?= $this->endSection() ?>










<!-- <style>
    body {
      font-family: Arial, sans-serif;
    }
    #chat {
      display: flex;
      flex-direction: column;
      height: 80vh;
      border: 1px solid #ccc;
      padding: 10px;
    }
    #messages {
      flex: 1;
      overflow-y: auto;
    }
    #input {
      display: flex;
    }
    #input input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
    }
    #input button {
      padding: 10px;
    }
  </style>

  <h1>Chat App</h1>
  <div>
    <input id="room" placeholder="Room name">
    <button id="join">Join Room</button>
  </div>
  <div id="chat" style="display:none;">
    <div id="messages"></div>
    <div id="input">
      <input id="message" placeholder="Type a message">
      <button id="send">Send</button>
    </div>
  </div>

  <script src="/socket.io/socket.io.js"></script>
  <script>
    const socket = io("http://localhost:3000");

    document.getElementById("join").onclick = () => {
      const room = document.getElementById("room").value;
      if (room) {
        socket.emit("join_room", room);
        document.getElementById("chat").style.display = "flex";
      }
    };

    document.getElementById("send").onclick = () => {
      const message = document.getElementById("message").value;
      const room = document.getElementById("room").value;
      if (message && room) {
        socket.emit("chat_msg", { room: room, msg: message, user: "User" });
        document.getElementById("message").value = "";
      }
    };

    socket.on("chat_msg", (data) => {
      const messages = document.getElementById("messages");
      const msgElement = document.createElement("div");
      msgElement.textContent = `${data.user}: ${data.msg}`;
      messages.appendChild(msgElement);
      messages.scrollTop = messages.scrollHeight;
    });
  </script> -->
