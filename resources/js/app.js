require('./bootstrap');
import Echo from "laravel-echo"
import Pusher from "pusher-js"
Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'f6246dd44fcb04d400f2',
    cluster: 'eu',
    forceTLS: true
});

var channel = window.Echo.channel('my-channel');
channel.listen('.my-event', function(data) {
    alert(JSON.stringify(data));
});
