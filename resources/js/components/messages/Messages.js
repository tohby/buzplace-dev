import React, { Component } from "react";
import axios from "axios";
import MessageBody from './MessageBody';

class Messages extends Component {
    constructor(props) {
        super(props);
        this.state = {
            message_content: [],
            recent_message: {},
            user: {},
            users: [],
            userAuth: {},
            tmp_msg: {},
<<<<<<< HEAD
            tmp_res: {},
=======
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
            recent_user: {},
            no_msg: '',
            loading: false
        };
    }

    getPrerequisiteData() {
        this.setState({ loading: true });
        const urlSplit = window.location.href.split('/');
        const lastIndex = urlSplit[urlSplit.length - 1];
        const urlRequest = urlSplit.length > 4 ? `/loadMessage/${lastIndex}` : `/loadMessage`;
        axios.get(urlRequest).then(response => {
            if (!response.data.msg) {
                this.setState({
                    recent_message: response.data.recent_message,
                    user: response.data.user,
                    recent_user: response.data.user,
                    users: response.data.users,
                    userAuth: response.data.userAuth,
                    loading: false
                }, () => {
                    if (this.state.userAuth.slug === this.state.user.slug) {
                        alert("Sorry, but you're not allowed to message yourself");
                        window.location.href = `/messages`;
                    }
                });
            } else { this.setState({ no_msg: 'No msg', loading: false }); }
        });
    }

    componentWillMount() { this.getPrerequisiteData(); }

    componentDidMount() {
        Echo.private('new-message')
            .listen('BroadcastMessage', (e) => {
                this.setState({ tmp_msg: e });
            });
    }

    loadingTag() {
        if (this.state.loading === true) {
            return <React.Fragment>
                {
                    <div id="main">
                        <span className="spinner"></span>
                    </div>
                }
            </React.Fragment>
        }
    }

    getRecentMsg() {
<<<<<<< HEAD
        let msg;
        if (this.state.recent_message) {
            if (this.state.recent_message.from === this.state.userAuth.slug) {
                msg = this.state.recent_message.text ?
                    this.state.recent_message.text.length > 20 ?
                    `You: ${this.state.recent_message.text.substring(0, 20)} ...` :
                    `You: ${this.state.recent_message.text}` : '';
                return msg;
            } else {
                msg = this.state.recent_message.text ?
                    this.state.recent_message.text.length > 24 ?
                    `${this.state.recent_message.text.substring(0, 24)} ...` :
                    `${this.state.recent_message.text}` : '';
                return msg;
=======
        if(this.state.recent_message) {
            if(this.state.recent_message.from === this.state.userAuth.slug) {
                return `You: ${this.state.recent_message.text}`
            } else {
                return `${this.state.recent_message.text}`
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
            }
        } else {
            return `No recent message`
        }
    }

    showFirstRecipient() {
        if (this.state.recent_user) {
            return (
                <React.Fragment>
                    <li
                        className={`recipients-list
                            recipients-list--selected
                            selected-${this.state.recent_user.slug}`}
                        onClick={ () => this.loadMessageBox(this.state.recent_user.slug) }
                    >
                        <img
                            src={`/images/${this.state.recent_user.avatar}`}
                            alt="Profile Photo"
                            className="recipients-list--img"
                        />
                        <div>
                            <span className="recipients-list--name">
                                {this.state.recent_user.name
                                    ? this.state.recent_user.name.substring(0, 30)
                                    : ""}
                            </span>
                            <span className="recipients-list--msg">
                                {this.getRecentMsg()}
                            </span>
                        </div>
                    </li>
                </React.Fragment>
            );
        }
    }

    showOtherRecipients() {
        if (this.state.users) {
            return (
                <React.Fragment>
                    {this.state.users.map(user => (
                        <li
                            key={user.slug}
                            className={`recipients-list
                            selected-${user.slug}`}
                            onClick={ () => this.loadMessageBox(user.slug) }
                        >
                            <img
                                src={`/images/${user.avatar}`}
                                alt="Profile Photo"
                                className="recipients-list--img"
                            />
                            <div>
                                <span className="recipients-list--name">
                                    {user.name ? user.name.substring(0, 30) : ""}
                                </span>
                                <span className="recipients-list--msg">
                                    {this.getUserLastMsg(user)}
                                </span>
                            </div>
                        </li>
                    ))}
                </React.Fragment>
            );
        }
    }

    getUserLastMsg(user) {
<<<<<<< HEAD
        let msg;
        if (user.last_msg.from) {
            if (user.last_msg.from === this.state.userAuth.slug) {
                msg = user.last_msg.text.length > 20 ?
                    `You: ${user.last_msg.text.substring(0, 20)}...` :
                    user.last_msg.text;
                return msg;
            } else {
                msg = user.last_msg.text.length > 24 ?
                    `${user.last_msg.text.substring(0, 24)}...` :
                    user.last_msg.text;
                return msg;
=======
        if (user.last_msg.from) {
            if (user.last_msg.from === this.state.userAuth.slug) {
                return `You: ${user.last_msg.text}`;
            } else {
                return `${user.last_msg.text}`;
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
            }
        } else {
            return `${user.last_msg}`;
        }
    }

    loadMessageBox(id) {
        document.querySelector('.recipients-list--selected').classList.remove('recipients-list--selected');
        document.querySelector(`.selected-${id}`).classList.add('recipients-list--selected');

        document.querySelector('.messages-body').innerHTML = '';

        axios.post(`/messages/getMessage/${id}`)
            .then(response => {
                let messages = response.data.messages;
                let user = response.data.user;
                this.state.user = user;
                document.querySelector('.messages-body').innerHTML = `
                        <span class="welcome-text">This is the beginning of your conversation with ${user.name}</span>
                    `;
                document.querySelector('.messages-header-text').textContent = `${user.name}`;
                for (let i = 0; i < messages.length; i++) {
                    if (messages[i].to == user.slug) {
                        if (i > 0) {
                            if (messages[i].to == messages[i - 1].to) {
                                let div = document.getElementsByClassName('sender-msg');
                                let last_div = div[div.length - 1];
                                last_div.insertAdjacentHTML('beforeend', `<div><span title='${messages[i].time}'>${messages[i].text}</span></div>`);
                            } else {
                                let sender_div = document.querySelector('.messages-body');
                                sender_div.insertAdjacentHTML('beforeend',
                                    `<div class="sender">
                                            <div class="sender-msg">
                                                <div><span title="${messages[i].time}">${messages[i].text}</span></div>
                                            </div>
                                        </div>`
                                )
                            }
                        } else {
                            let sender_div = document.querySelector('.messages-body');
                            sender_div.insertAdjacentHTML('beforeend',
                                `<div class="sender">
                                            <div class="sender-msg">
                                                <div><span title="${messages[i].time}">${messages[i].text}</span></div>
                                            </div>
                                        </div>`
                            )
                        }
                    }

                    if (messages[i].from == user.slug) {
                        if (i > 0) {
                            if (messages[i].from == messages[i - 1].from) {
                                let div = document.getElementsByClassName('receiver-msg');
                                let last_div = div[div.length - 1];
                                last_div.insertAdjacentHTML('beforeend', `<div><span title='${messages[i].time}'>${messages[i].text}</span></div>`);
                            } else {
                                let msg_div = document.querySelector('.messages-body');
                                msg_div.insertAdjacentHTML('beforeend',
                                    `<div class="receiver">
                                            <img src="../images/${user.avatar}" alt="User Image">
                                            <div class="receiver-msg">
                                                <div><span title="${messages[i].time}">${messages[i].text}</span></div>
                                            </div>
                                        </div>`
                                )
                            }
                        } else {
                            let msg_div = document.querySelector('.messages-body');
                            msg_div.insertAdjacentHTML('beforeend',
                                `<div class="receiver">
                                            <img src="../images/${user.avatar}" alt="User Image">
                                            <div class="receiver-msg">
                                                <div><span title="${messages[i].time}">${messages[i].text}</span></div>
                                            </div>
                                        </div>`
                            )
                        }
                    }
                }
            })
    }

    formSubmit() {
        event.preventDefault();
        let slug = this.state.user.slug;
        this.sendMsg(slug);
    }

    keyPressed() {
        if (event.which == 13) {
            event.preventDefault();
            let slug = this.state.user.slug;
            this.sendMsg(slug);
        }
    }

    sendMsg(slug) {
        if (document.querySelector('#chat-msg').value !== '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let text = document.querySelector('#chat-msg').value;
            $.ajax({
                url: `/messages/sendMessage/${slug}`,
                method: 'get',
                data: { to: slug, text: text },
<<<<<<< HEAD
                success: () => {
=======
                success: function(response) {
                    console.log('from sending message', response);
>>>>>>> 025ba61e8ad480a6520216d2c5fc1a928e0619ff
                    axios.post(`/messages/getMessage/${slug}`)
                        .then(response => {
                            let user = response.data.user;
                            let messages = response.data.messages;
                            if (messages[messages.length - 1].to == user.slug) {
                                if (messages[messages.length - 1] !== messages[0]) {
                                    if (messages[messages.length - 1].to == messages[(messages.length - 1) - 1].to) {
                                        let div = document.getElementsByClassName('sender-msg');
                                        let last_div = div[div.length - 1];
                                        last_div.insertAdjacentHTML('beforeend', `<div><span title='${messages[messages.length - 1].time}'>${messages[messages.length - 1].text}</span></div>`);
                                    } else {
                                        let sender_div = document.querySelector('.messages-body');
                                        sender_div.insertAdjacentHTML('beforeend',
                                            `<div class="sender">
                                                    <div class="sender-msg">
                                                        <div><span title="${messages[messages.length - 1].time}">${messages[messages.length - 1].text}</span></div>
                                                    </div>
                                                </div>`
                                        )
                                    }
                                } else {
                                    let sender_div = document.querySelector('.messages-body');
                                    sender_div.insertAdjacentHTML('beforeend',
                                        `<div class="sender">
                                                <div class="sender-msg">
                                                    <div><span title="${messages[messages.length - 1].time}">${messages[messages.length - 1].text}</span></div>
                                                </div>
                                            </div>`
                                    )
                                }
                            }
                        })
                }
            });
            document.querySelector('#chat-msg').value = '';
        }
    }

    message() {
        const firstRecipient = this.showFirstRecipient();
        const otherRecipients = this.showOtherRecipients();

        return <React.Fragment>
            {
                <div className="row">
                    <div className="col-md-3 my-column">
                        <div className="recipients-container">
                            <div className="recipients-header">
                                <h3 className="recipients-header-text">
                                    Conversations
                                </h3>
                            </div>
                            <hr />
                            <div className="recipients-body">
                                <ul>
                                    {firstRecipient} {otherRecipients}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-9 my-column">
                        <div className="messages-container">
                            <div className="messages-header">
                                <span className="messages-header-text">
                                    {this.state.user ? this.state.user.name : ''}
                                </span>
                            </div>
                            <hr />
                            { this.state.user ? <MessageBody slug={this.state.user.slug} /> : '' }
                            <div className="messages-footer">
                                <form method="post" className="chat-msg" id="chat-form" onSubmit={() => this.formSubmit()}>
                                    <textarea placeholder="Type a message..." id="chat-msg" className="chat-msg-text" onKeyDown={() => this.keyPressed()}></textarea>
                                    <button type="submit" className="send-button">
                                        <ion-icon name="send" class="send"></ion-icon>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            }
        </React.Fragment>
    }

    noMessage() {
        return <React.Fragment>
            {
                <div className="no-msg">
                    <span className="no-msg--title">
                        <strong>Welcome to your conversations page</strong>
                    </span>
                    <span className="no-msg--text">
                        It's empty now, but it won't be for long.
                        Start chatting with people and you'll see Conversations
                        show up here.
                    </span>
                    <button className="no-msg--btn">
                        <a href="/the-hub">Get started</a>
                    </button>
                </div>
            }
        </React.Fragment>
    }

    render() {
        const message = this.message();
        const noMessage = this.noMessage();
        const loading = this.loadingTag();

        return (
            <div className="container-fluid conversation-container" id="app">
                { this.state.loading ? loading : this.state.no_msg ? noMessage : message}
                {/* { this.state.no_msg ? noMessage : message } */}
            </div>
        );
    }
}

export default Messages;
