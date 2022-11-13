const socket = require("socket.io");
const express = require("express");
const cors = require("cors");
const app = express();
const server = require("http").createServer(app);
const io = require("socket.io")(server, {
	cors: {
		origin: "*",
		methods: ["GET", "POST"],
		credentials: true,
	},
});
const port = process.env.PORT || 3030;

server.listen(port, function () {
	console.log("Server listening at port %d", port);
});
io.on("connection", function (socket) {
	socket.on("new_message", function (data) {
		io.sockets.emit("new_message", {
			message: data.message,
		});
	});
});
