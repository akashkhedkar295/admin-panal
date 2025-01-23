const express = require('express');
const { join } = require('node:path');
const  http  = require('http');
const { Server } = require('socket.io');
const cors = require('cors');
const  { CronJob }  = require('cron');

const app = express();
app.use(cors());
const server = http.createServer(app)
const io = new Server(server , {
  cors: {
    origin: "http://localhost:8080",
    methods: ["GET", "POST"],
  }
});

// io.on("connection",(socket)=>{
//   socket.on("chat_msg",(data)=>{
//     console.log(data);  
//     io.emit("chat_msg",{
//       msg:data.msg,
//       user:data.user
//     });
//   })
// })

// io.on("connection", (socket) => { 
//   console.log('a user connected:', socket.id)
//   // Join a room based on user ID or some unique identifier
//   socket.on("join_room", (room) => {
//     socket.join(room);
//     console.log(`User ${socket.id} joined room: ${room}`);
//   });

//   socket.on("chat_msg", (data) => {
//     console.log(data);

//     // Send message to the specific room
//     io.to(data.room).emit("chat_msg", {
//       msg: data.msg,
//       user: data.user
//     });
//   });

//   socket.on("disconnect", () => {
//     console.log('user disconnected:', socket.id);
//   });
// });



io.on('connection',(socket)=>{
  socket.on('username',(username)=>{
    console.log(username);
  })
  socket.on('join_room',({username , receiver})=>{
    
  })

})

server.listen(3000, () => {
  console.log('server running at http://localhost:3000');
});