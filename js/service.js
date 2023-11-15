// Replace "ws://your-websocket-server-address" with the actual address of your WebSocket server
const socket = new WebSocket("localhost:5500");

// WebSocket Event Handlers
socket.addEventListener("open", (event) => {
	console.log("WebSocket connection opened:", event);
});

socket.addEventListener("message", (event) => {
	console.log("Message from server:", event.data);
	// Handle the received message and update your UI
});

socket.addEventListener("close", (event) => {
	console.log("WebSocket connection closed:", event);
});

socket.addEventListener("error", (error) => {
	console.error("WebSocket error:", error);
});
