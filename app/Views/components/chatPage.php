<?= $this->extend('Maintmplet') ?>
<?= $this->section('chatPage') ?>
<link rel="stylesheet" href="<?= base_url('css/chatCss.css')?>" />
<section>

<div class="container py-3">

<div class="row d-flex justify-content-center">
  <div class="col-md-10 col-lg-8 col-xl-6">

    <div class="card" id="chat2">
      <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h5 class="mb-0">Chat</h5>
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm" data-mdb-ripple-color="dark">Let's Chat
          App</button>
      </div>
      <div class="card-body" data-mdb-perfect-scrollbar-init style="position: relative; height: 400px">

        <div class="d-flex flex-row justify-content-start">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
          <div>
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">Hi</p>
            
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">How are you ...???
            </p>
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">What are you doing
              tomorrow? Can we come up a bar?</p>
            <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
          </div>
        </div>

        <div class="divider d-flex align-items-center mb-4">
          <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
        </div>

        <div class="d-flex flex-row justify-content-end mb-4 pt-1">
          <div>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Hiii, I'm good.</p>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">How are you doing?</p>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Long time no see! Tomorrow
              office. will
              be free on sunday.</p>
            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:06</p>
          </div>
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
        </div>

        <div class="d-flex flex-row justify-content-start mb-4">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
          <div>
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">Okay</p>
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">We will go on
              Sunday?</p>
            <p class="small ms-3 mb-3 rounded-3 text-muted">00:07</p>
          </div>
        </div>

        <div class="d-flex flex-row justify-content-end mb-4">
          <div>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">That's awesome!</p>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">I will meet you Sandon Square
              sharp at
              10 AM</p>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Is that okay?</p>
            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:09</p>
          </div>
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
        </div>

        <div class="d-flex flex-row justify-content-start mb-4">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
          <div>
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">Okay i will meet
              you on
              Sandon Square</p>
            <p class="small ms-3 mb-3 rounded-3 text-muted">00:11</p>
          </div>
        </div>

        <div class="d-flex flex-row justify-content-end mb-4">
          <div>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Do you have pictures of Matley
              Marriage?</p>
            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:11</p>
          </div>
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
        </div>

        <div class="d-flex flex-row justify-content-start mb-4">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
          <div>
            <p class="small p-2 ms-3 mb-1 rounded-3 bg-body-tertiary">Sorry I don't have. i changed my phone.</p>
            <p class="small ms-3 mb-3 rounded-3 text-muted">00:13</p>
          </div>
        </div>
        <div class="d-flex flex-row justify-content-end">
          <div>
            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Okay then see you on sunday!!
            </p>
            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:15</p>
          </div>
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
            alt="avatar 1" style="width: 45px; height: 100%;">
        </div>
        <ul class="message"></ul>
      </div>
      <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
          alt="avatar 3" style="width: 40px; height: 100%;">
        <input type="text" id="inpMsg" class="form-control form-control-lg" 
          placeholder="Type message">
        <button type="submit" id="send" onclick="sendMsg()" class="btn btn-success">Send</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="<?= base_url("socket.io/socket.io.js")?>"></script>
<script>
  const socket = io.connect("http://localhost:3000");
  const send = document.getElementById('send');
  const input = document.getElementById('inpMsg');
  const messages = document.getElementById('messages');

  funcction sendMsg(){
    const msg = input.value;
    console.log(msg);
    if (msg != ''){
      socket.emit('message', msg);
      input.value = '';
    }
    
    socket.on( 'message', (data) => {
      const msg = document.createElement('li');
      item.textContent = data;
      messages.appendChild(item);
      window.scrollTo(0, document.body.scrollHeight);
    });

  }

  send.addEventListener('click', (e) => {
    e.preventDefault();
    if (input.value) {
      socket.emit('chat message', input.value);
      input.value = '';
    }
  });

  socket.on('chat message', (msg) => {
    const item = document.createElement('li');
    item.textContent = msg;
    messages.appendChild(item);
    window.scrollTo(0, document.body.scrollHeight);
  });
</script>

</section>





<?= $this->endSection() ?>