const  Queue  = require("bull");
const { MongoClient } = require("mongodb");
const queue = Queue("fires-bull-queue",{redis :{
  host: '127.0.0.1',  
  port: 6379,
}});
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
// sadklgfklsdjgk?dl;sa
queue.process((job, done) => {
  console.log(job.data);
  db.collection('messages').insertOne(job.data);
  done();
});

queue.on('completed',job=>{
    console.log(job.data);
    job.remove();
})