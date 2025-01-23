const express = require('express');
const { join } = require('node:path');
const  http  = require('http');
const { Server } = require('socket.io');
const cors = require('cors');
const { MongoClient } = require("mongodb");
const  { CronJob }  = require('cron');
const { timeStamp } = require('node:console');

const app = express();
app.use(cors());
const server = http.createServer(app)
const io = new Server(server , {
  cors: {
    origin: "http://localhost:8080",
    methods: ["GET", "POST"],
  }
});

const uri = "mongodb://localhost:27017/";
const client = new MongoClient(uri);
let db;
async function connectToMongo() {
  try {
    await client.connect();
    db = client.db("chatApp");
    console.log("Connected to MongoDB");
  } catch (err) {
    console.error("Failed to connect to MongoDB", err);
  }
}
connectToMongo();

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

  socket.on('logged',(username)=>{
    console.log(username+" user connectied");
  })


  socket.on('joinRoom',async ({sender , receiver})=>{
    const room = [sender , receiver].sort().join('-');
    socket.join(room);
    console.log(`User ${sender} joined room: ${room}`);
    try{
      const messages = await db.collection('messages').find({
        $or: [
          { sender, receiver },
          { sender: receiver, receiver: sender }
        ],
      }).sort({ timestamp: 1 }).toArray();
      // console.log(messages);
      socket.emit("previousMessages", messages);
    }catch(err){
      console.log(err);
    }
  })

  socket.on('sendMsg', ({sender , receiver , message})=>{
    try{
      const room = [sender , receiver].sort().join('-');
      console.log(room)
      const msg = {
        sender , 
        receiver ,
        message ,
        timestamp: new Date().getTime(),
      }
      db.collection('messages').insertOne(msg);
      io.to(room).emit('chat_msg',msg);
      }catch(err){
        console.log(err);
      }
    });
    socket.on('disconnect', () => {
      console.log('user disconnected');
    });
})

server.listen(3000, () => {
  console.log('server running at http://localhost:3000');
});