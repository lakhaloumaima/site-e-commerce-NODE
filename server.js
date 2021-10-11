const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const db = require('./config/database')
const cors = require('cors')



app.use(express.urlencoded({ extended: false }));

// parse application/json
app.use(express.json());

app.use(cors())
//child routes
const userrouter = require("./routes/UserRouter");
const adminrourter =  require('./routes/AdminRouter')
const clientrouter =  require('./routes/ClientRouter')
const productrouter =  require('./routes/ProductRouter')
const categoryrouter =  require('./routes/CategoryRouter')
const orderrouter =  require('./routes/OrderRouter')
//const contactrouter =  require('./routes/ContactRouter')

//parent routes
app.use("/users",userrouter);
app.use("/admins", adminrourter);
app.use("/clients", clientrouter);
app.use("/products", productrouter);
app.use("/categories", categoryrouter);
app.use("/orders", orderrouter);
//app.use("/contacts", contactrouter);

app.get("/", (req, res) => {
  res.send("hello");
});

app.get("/hello/:name", (req, res) => {
  res.send("hello" + req.params.name);
});


app.get("/getfile/:image", function (req, res) {
  res.sendFile(__dirname + "/uploads/" + req.params.image);
});

app.listen(5000, () => {
  console.log("server is running on port 5000");
});
