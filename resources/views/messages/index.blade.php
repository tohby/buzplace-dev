@extends('layouts/master')
@section('content')
    <div id="messages"></div>

    {{--<div class="container-fluid conversation-container" id="app">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-3 my-column">--}}
                {{--<div class="recipients-container">--}}
                    {{--<div class="recipients-header">--}}
                        {{--<h3 class="recipients-header-text">Conversations</h3>--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<div class="recipients-body">--}}
                        {{--<ul>--}}
                            {{--<li class="recipients-list recipients-list--selected selected-{{$user->slug}}" onclick="loadMessageBox('{{$user->slug}}')">--}}
                                {{--<img src="{{ asset('images/'.$user->avatar) }}" alt="Profile Photo" class="recipients-list--img">--}}
                                {{--<div>--}}
                                    {{--<span class="recipients-list--name">{{ str_limit($user->name, 30) }}</span>--}}
                                    {{--<span class="recipients-list--msg">--}}
                                        {{--@if ($recent_message->from === Auth::user()->slug)--}}
                                            {{--You: {{ $recent_message->text }}--}}
                                        {{--@else--}}
                                            {{--{{ $recent_message->text }}--}}
                                        {{--@endif--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--@foreach ($users as $person)--}}
                                {{--<li class="recipients-list selected-{{$person->slug}}" onclick="loadMessageBox('{{ $person->slug }}')">--}}
                                    {{--<img class="recipients-list--img" src="{{ asset('images/'.$person->avatar) }}" alt="Profile Photo">--}}
                                    {{--<div>--}}
                                        {{--<span class="recipients-list--name">{{ str_limit($person->name, 30) }}</span>--}}
                                        {{--<span class="recipients-list--msg">--}}
                                            {{--@if (isset($person->last_msg->from))--}}
                                                {{--@if ($person->last_msg->from === Auth::user()->slug)--}}
                                                    {{--You: {{ $person->last_msg->text }}--}}
                                                {{--@else--}}
                                                    {{--{{ $last_msg->text }}--}}
                                                {{--@endif--}}
                                            {{--@else--}}
                                                {{--{{ $person->last_msg }}--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-9 my-column">--}}
                {{--<div class="messages-container">--}}
                    {{--<div class="messages-header">--}}
                        {{--<span class="messages-header-text">{{ $user->name }}</span>--}}
                        {{--<span class="green-dot" title="Online"></span>--}}
                        {{--<span class="red-dot" title="Offline"></span>--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<div class="messages-body">--}}
                        {{--<span class="welcome-text">This is the beginning of your conversation with {{ $user->name }}</span>--}}
                        {{--@for ($i = 0; $i < count($message_content); $i++)--}}
                            {{--@if ($message_content[$i]->from === Auth::user()->slug)--}}
                                {{--@if ($i > 0)--}}
                                    {{--@if ($message_content[$i]->from === $message_content[$i - 1]->from)--}}
                                        {{--<script>--}}
                                            {{--let msg = '{{ $message_content[$i]->text }}';--}}
                                            {{--let time = '{{$message_content[$i]->time}}';--}}
                                            {{--let divs = document.getElementsByClassName('sender-msg');--}}
                                            {{--let last_div = divs[divs.length - 1];--}}
                                            {{--last_div.insertAdjacentHTML('beforeend', `<div><span title='${time}'>${msg}</span></div>`);--}}
                                        {{--</script>--}}
                                    {{--@else--}}
                                        {{--<div class="sender">--}}
                                            {{--<div class="sender-msg">--}}
                                                {{--<div><span title='{{ $message_content[$i]->time }}'>{{ $message_content[$i]->text }}</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--@else--}}
                                    {{--<div class="sender">--}}
                                        {{--<div class="sender-msg">--}}
                                            {{--<div><span title='{{ $message_content[$i]->time }}'>{{ $message_content[$i]->text }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            {{--@endif--}}

                            {{--@if ($message_content[$i]->to === Auth::user()->slug)--}}
                                {{--@if ($i > 0)--}}
                                    {{--@if ($message_content[$i]->to === $message_content[$i - 1]->to)--}}
                                        {{--<script>--}}
                                            {{--let receiver_msg = '{{ $message_content[$i]->text }}';--}}
                                            {{--let receiver_div = document.querySelector('.receiver-msg').lastElementChild.parentElement;--}}
                                            {{--let receiver_time = '{{ $message_content[$i]->time }}';--}}
                                            {{--receiver_div.insertAdjacentHTML('beforeend', `<div><span title='${receiver_time}'>${receiver_msg}</span></div>`);--}}
                                        {{--</script>--}}
                                    {{--@else--}}
                                        {{--<div class="receiver">--}}
                                            {{--<img src="{{ asset('images/'.$user->avatar) }}" alt="User Image">--}}
                                            {{--<div class="receiver-msg">--}}
                                                {{--<div><span title='{{ $message_content[$i]->time }}'>{{ $message_content[$i]->text }}</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                {{--@else--}}
                                    {{--<div class="receiver">--}}
                                        {{--<img src="{{ asset('images/'.$user->avatar) }}" alt="User Image">--}}
                                        {{--<div class="receiver-msg">--}}
                                            {{--<div><span title='{{ $message_content[$i]->time }}'>{{ $message_content[$i]->text }}</span></div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            {{--@endif--}}
                        {{--@endfor--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<div class="messages-footer">--}}
                        {{--<form method="post" class="chat-msg" id="chat-form" onsubmit="formSubmit()">--}}
                            {{--@csrf--}}
                            {{--<input type="hidden" id="hidden" value="{{$user->slug}}">--}}
                            {{--<textarea placeholder="Type a message..." id="chat-msg" class="chat-msg-text" onkeydown="keyPressed()"></textarea>--}}
                            {{--<button type="submit" class="send-button">--}}
                                {{--<ion-icon name="send" class="send"></ion-icon>--}}
                            {{--</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

{{--@section('scripts')--}}
    {{--<script>--}}
        {{--function formSubmit() {--}}
            {{--event.preventDefault();--}}
            {{--let slug = document.querySelector('#hidden').value;--}}
            {{--sendMsg(slug);--}}
        {{--}--}}

        {{--function keyPressed() {--}}
            {{--if (event.which == 13) {--}}
                {{--event.preventDefault();--}}
                {{--let slug = document.querySelector('#hidden').value;--}}
                {{--sendMsg(slug);--}}
            {{--}--}}
        {{--}--}}

        {{--function sendMsg(slug) {--}}
            {{--if (document.querySelector('#chat-msg').value !== '') {--}}
                {{--$.ajaxSetup({--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                    {{--}--}}
                {{--});--}}
                {{--let text = document.querySelector('#chat-msg').value;--}}
                {{--$.ajax({--}}
                    {{--url: `/admin/messages/sendMessage/${slug}`,--}}
                    {{--method: 'post',--}}
                    {{--data: { to: slug, text },--}}
                    {{--success: function(response) {--}}
                        {{--console.log('from sending message', response);--}}
                        {{--getMsgArr(slug)--}}
                            {{--.then(dataReturned => {--}}
                                {{--let user = dataReturned[0];--}}
                                {{--let messages = dataReturned[1];--}}
                                {{--if (messages[messages.length - 1].to == user.slug) {--}}
                                    {{--if (messages[messages.length - 1] !== messages[0]) {--}}
                                        {{--if (messages[messages.length - 1].to == messages[(messages.length - 1) - 1].to) {--}}
                                            {{--let sender_div = document.querySelector('.sender-msg').lastElementChild.parentElement;--}}
                                            {{--sender_div.insertAdjacentHTML('beforeend', `<div><span title='${messages[messages.length - 1].time}'>${messages[messages.length - 1].text}</span></div>`);--}}
                                        {{--} else {--}}
                                            {{--let sender_div = document.querySelector('.messages-body');--}}
                                            {{--sender_div.insertAdjacentHTML('beforeend',--}}
                                                {{--`<div class="sender">--}}
                                                    {{--<div class="sender-msg">--}}
                                                        {{--<div><span title="${messages[messages.length - 1].time}">${messages[messages.length - 1].text}</span></div>--}}
                                                    {{--</div>--}}
                                                {{--</div>`--}}
                                            {{--)--}}
                                        {{--}--}}
                                    {{--} else {--}}
                                        {{--let sender_div = document.querySelector('.messages-body');--}}
                                        {{--sender_div.insertAdjacentHTML('beforeend',--}}
                                            {{--`<div class="sender">--}}
                                                {{--<div class="sender-msg">--}}
                                                    {{--<div><span title="${messages[messages.length - 1].time}">${messages[messages.length - 1].text}</span></div>--}}
                                                {{--</div>--}}
                                            {{--</div>`--}}
                                        {{--)--}}
                                    {{--}--}}
                                {{--}--}}
                            {{--})--}}
                    {{--}--}}
                {{--});--}}
                {{--document.querySelector('#chat-msg').value = '';--}}
            {{--}--}}
        {{--}--}}

        {{--function loadMessageBox(id) {--}}
            {{--document.querySelector('.recipients-list--selected').classList.remove('recipients-list--selected');--}}
            {{--document.querySelector(`.selected-${id}`).classList.add('recipients-list--selected');--}}

            {{--document.querySelector('.messages-body').innerHTML = '';--}}

            {{--axios.post(`/admin/messages/getMessage/${id}`)--}}
                {{--.then(response => {--}}
                    {{--let messages = response.data.messages;--}}
                    {{--let user = response.data.user;--}}
                    {{--document.querySelector('.messages-body').innerHTML = `--}}
                        {{--<span class="welcome-text">This is the beginning of your conversation with ${user.name}</span>--}}
                    {{--`;--}}
                    {{--for (let i = 0; i < messages.length; i++) {--}}
                        {{--if (messages[i].to == user.slug) {--}}
                            {{--if (i > 0) {--}}
                                {{--if (messages[i].to == messages[i - 1].to) {--}}
                                    {{--let sender_div = document.querySelector('.sender-msg').lastElementChild.parentElement;--}}
                                    {{--sender_div.insertAdjacentHTML('beforeend', `<div><span title='${messages[i].time}'>${messages[i].text}</span></div>`);--}}
                                {{--} else {--}}
                                    {{--let sender_div = document.querySelector('.messages-body');--}}
                                    {{--sender_div.insertAdjacentHTML('beforeend',--}}
                                        {{--`<div class="sender">--}}
                                            {{--<div class="sender-msg">--}}
                                                {{--<div><span title="${messages[i].time}">${messages[i].text}</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>`--}}
                                    {{--)--}}
                                {{--}--}}
                            {{--} else {--}}
                                {{--let sender_div = document.querySelector('.messages-body');--}}
                                {{--sender_div.insertAdjacentHTML('beforeend',--}}
                                    {{--`<div class="sender">--}}
                                            {{--<div class="sender-msg">--}}
                                                {{--<div><span title="${messages[i].time}">${messages[i].text}</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>`--}}
                                {{--)--}}
                            {{--}--}}
                        {{--}--}}

                        {{--if (messages[i].from == user.slug) {--}}
                            {{--if (i > 0) {--}}
                                {{--if (messages[i].from == messages[i - 1].from) {--}}
                                    {{--let msg_div = document.querySelector('.receiver-msg').lastElementChild.parentElement;--}}
                                    {{--msg_div.insertAdjacentHTML('beforeend', `<div><span title='${messages[i].time}'>${messages[i].text}</span></div>`);--}}
                                {{--} else {--}}
                                    {{--let msg_div = document.querySelector('.messages-body');--}}
                                    {{--msg_div.insertAdjacentHTML('beforeend',--}}
                                        {{--`<div class="receiver">--}}
                                            {{--<img src="images/${user.avatar}" alt="User Image">--}}
                                            {{--<div class="receiver-msg">--}}
                                                {{--<div><span title="${messages[i].time}">${messages[i].text}</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>`--}}
                                    {{--)--}}
                                {{--}--}}
                            {{--} else {--}}
                                {{--let msg_div = document.querySelector('.messages-body');--}}
                                {{--msg_div.insertAdjacentHTML('beforeend',--}}
                                    {{--`<div class="receiver">--}}
                                            {{--<img src="images/${user.avatar}" alt="User Image">--}}
                                            {{--<div class="receiver-msg">--}}
                                                {{--<div><span title="${messages[i].time}">${messages[i].text}</span></div>--}}
                                            {{--</div>--}}
                                        {{--</div>`--}}
                                {{--)--}}
                            {{--}--}}
                        {{--}--}}
                    {{--}--}}
                {{--})--}}
        {{--}--}}

        {{--function getMsgArr(slug) {--}}
            {{--return axios.post(`/admin/messages/getMessage/${slug}`)--}}
                {{--.then(response => {--}}
                    {{--return [response.data.user, response.data.messages]--}}
                {{--});--}}
        {{--}--}}
    {{--</script>--}}
{{--@endsection--}}
