const express = require("express");
const { join } = require("node:path");
const http = require("http");
const { Server } = require("socket.io");
const cors = require("cors");
const { MongoClient } = require("mongodb");
const Queue = require("bull");
const queue = Queue("fires-bull-queue", {
  redis: {
    host: "127.0.0.1",
    port: 6379,
  },
});

const app = express();
app.use(cors());
const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: "http://localhost:8080",
    methods: ["GET", "POST"] ,
  },
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


io.on("connection", (socket) => {
  let Status, userName;
  socket.on("logged", async (username) => {
    userName = username;
    db.collection("userOnline").updateOne(
      { name: username },
      { $set: { online: "online" } },
      { upsert: true }
    );
    Status = await db.collection("userOnline").find().toArray();
    console.log(Status);
    io.emit("online", Status);
    console.log(username + " user connectied");
  });

  socket.on("joinRoom", async ({ sender, receiver }) => {
   

    const room = [sender, receiver].sort().join("-");
    socket.join(room);
    console.log(`User ${sender} joined room: ${room}`);
    try {
      const messages = await db
        .collection("messages")
        .find({
          $or: [
            { sender, receiver },
            { sender: receiver, receiver: sender },
          ],
        })
        .sort({ timestamp: 1 })
        .toArray();

      socket.emit("previousMessages", messages);
    } catch (err) {
      console.log(err);
    }
  });

  socket.on("sendMsg", async ({ sender, receiver, message }) => {
    try {
      
      console.log(Status);
      const room = [sender, receiver].sort().join("-");
      console.log(room);
      const msg = {
        sender,
        receiver,
        message,
        timestamp: new Date().getTime(),
      };
      queue.add(msg);
      io.to(room).emit("chat_msg", msg);
    } catch (err) {
      console.log(err);
    }
  });

  socket.on("disconnect", () => {
    db.collection("userOnline").updateOne(
      { name: userName },
      { $set: { online: "offline" } },
      { upsert: true }
    );
    let ttt = db.collection("userOnline").find().toArray();

    socket.emit("online", ttt);
    console.log("user disconnected");
  });
});

server.listen(3000, () => {
  console.log("server running at http://localhost:3000");
});
