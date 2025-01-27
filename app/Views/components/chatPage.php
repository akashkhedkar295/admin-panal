<?= $this->extend('Maintmplet') ?>
<?= $this->section('chatPage') ?>
<link rel="stylesheet" href="<?= base_url('css/chatCss.css') ?>" />


<div class="container">
  <!-- Main Chat Screen -->
  <div id="chat-screen">
    <!-- Sidebar -->

    <div class="sidebar">
      <div class="user-profile ">
        <div>
          <img class="small-profile " src="<?= base_url('img/avatars/1.png') ?>" alt="User Avatar">
          <span><?= $loginDetails['name'] ?></span>
        </div>
        <span id="chat-mode"></span>

      </div>
      <ul id="users-list">
        <?php foreach ($userData as $user) {
          if ($user['emp_id'] === $loginDetails['emp_id']) {
            continue;
          }
          ?>
          <li id="agent-list" class="user" data-username="<?= $user['fname'] ?>">
            <img class="small-profile" src="<?= base_url('img/avatars/1.png') ?>" alt="User Avatar">
            <div class="user-info">
              <span id="userheader"><?= $user['fname'] ?></span>
              <small><?= $user['JobTitle'] ?> <small id="status"></small></small>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <!-- Chat Area -->
    <div id="chatarea" class="chat-area hidden">
      <div class="chat-header">
        <div>
          <img class="small-profile" src="<?= base_url('img/avatars/1.png') ?>" alt="User Avatar">
          <span id="receiverUser"><?= $loginDetails['name'] ?> </span>
        </div>
        <span id="chat-mode">WhatsApp</span>

      </div>
      <div id="messages" class="messages-container"></div>
      <div class="message-input">
        <div class="input-group input-group-merge speech-to-text">
          <input id="message-input" class="form-control" type="text" placeholder="Type a message...">
          <span class="input-group-text" id="text-to-speech-addon">
            <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
          </span>
        </div>
        <!-- <input type="text" id="message-input" class="" placeholder="Type a message..."> -->
        <button id="send-btn" class="btn btn-primary">Send</button>
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

  const sender = "<?= $loginDetails['name'] ?>";
  let receiver = null; //recevier stored a user object which user is currently chatting with
  const months =  ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];   
  socket.emit('logged', sender) // emait logged event to server with sender's name
  socket.on('online', (data) => {
    console.log(data);
    document.querySelectorAll('#agent-list').forEach(user => {
      user.addEventListener('click', () => {
        // document.getElementById('chatarea').removeAttribute('class');
        document.getElementById('chatarea').className = "chat-area";
        receiver = user.getAttribute("data-username");
        socket.on('online', (data) => {
          data.foreach((e) => {
            if (e.name == receiver) {
              document.getElementById('status').innerHTML = e.online;
            }
          })
        })
        console.log(sender);
        document.getElementById('receiverUser').innerHTML = receiver

        // document.querySelector('.receiver').textContent = currentReceiver;
        messagesContainer.innerHTML = '';
        socket.emit('joinRoom', { sender, receiver });
      });
    });
  })

  // this is a method to send message to server
  function sendMsg() {
    const message = messageInput.value.trim();
    if (message && receiver) {
      socket.emit('sendMsg', { sender: sender, receiver: receiver, message: message });
      messageInput.value = '';
    }
  }

   // this socket event is retrived previous messages from server
  socket.on('previousMessages', (messages) => {
    const chatHistory = document.getElementById('messages');
    chatHistory.innerHTML = ''; // every time chat section is refreshed and set to empty
    messages.forEach(msg => { // loop through each message
      const date = new Date(msg.timestamp);
      console.log(date.getHours()) 
      const messageElement = document.createElement('div');
      messageElement.className = `message ${msg.sender === sender ? 'sent alert alert-secondary' : 'received alert alert-primary'}`;
      messageElement.innerHTML = `${msg.message}<span class="time_date"> ${date.getHours()}:${date.getMinutes()}   | ${months[date.getMonth()]} ${date.getDay()}</span>`;
      chatHistory.appendChild(messageElement);
    });
    chatHistory.scrollTop = chatHistory.scrollHeight;
  });

  sendBtn.addEventListener('click', sendMsg); // click event is set on send button to send message to server
  messageInput.addEventListener('keypress', (e) => { // keypress event is set on message input to send message when enter is pressed
    if (e.key === 'Enter') {
      sendMsg();
    }
  });


  // this socket event listen for incoming messages from server
  socket.on("chat_msg", (data) => { 
    const date = new Date(data.timestamp);
    const messages = document.getElementById("messages");
    const msgElement = document.createElement("div");
    msgElement.className = `message ${data.sender === sender ? 'sent alert alert-secondary' : 'received alert alert-primary'}`;
    msgElement.innerHTML = `${data.message}<span class="time_date" >${date.getHours()}:${date.getMinutes()} | ${months[date.getMonth()]} ${date.getDay()} </span>`;
    messages.appendChild(msgElement);
    messages.scrollTop = messages.scrollHeight;
  });

</script>
<?= $this->endSection() ?>  