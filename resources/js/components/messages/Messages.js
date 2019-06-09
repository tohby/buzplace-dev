import React, { Component } from "react";
import axios from "axios";

class Messages extends Component {
    constructor(props) {
        super(props);
        this.state = {
            message_content: [],
            recent_message: {},
            user: {},
            users: [],
            userAuth: {},
            tmp_msg: {}
        };
    }

    getPrerequisiteData() {
        axios.get("/loadMessage").then(response => {
            this.setState({
                recent_message: response.data.recent_message,
                message_content: response.data.message_content,
                user: response.data.user,
                users: response.data.users,
                userAuth: response.data.userAuth
            });
        });
    }

    componentWillMount() { this.getPrerequisiteData(); }

    componentDidMount() {
        Echo.private('new-message')
            .listen('BroadcastMessage', (e) => {
                this.setState({ tmp_msg: e });
            });
    }

    showFirstRecipient() {
        return (
            <React.Fragment>
                <li
                    className={`recipients-list
                        recipients-list--selected
                        selected-${this.state.user.slug}`}
                    onClick={ () => this.loadMessageBox(this.state.user.slug) }
                >
                    <img
                        src={`/images/${this.state.user.avatar}`}
                        alt="Profile Photo"
                        className="recipients-list--img"
                    />
                    <div>
                        <span className="recipients-list--name">
                            {this.state.user.name
                                ? this.state.user.name.substring(0, 30)
                                : ""}
                        </span>
                        <span className="recipients-list--msg">
                            {this.state.recent_message.from ===
                            this.state.userAuth.slug
                                ? `You: ${this.state.recent_message.text}`
                                : `${this.state.recent_message.text}`}
                        </span>
                    </div>
                </li>
            </React.Fragment>
        );
    }

    showOtherRecipients() {
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

    getUserLastMsg(user) {
        if (user.last_msg.from) {
            if (user.last_msg.from === this.state.userAuth) {
                return `You: ${user.last_msg.text}`;
            } else {
                return `${user.last_msg.text}`;
            }
        } else {
            return `${user.last_msg}`;
        }
    }

    loadMessageBox(id) {
        document.querySelector('.recipients-list--selected').classList.remove('recipients-list--selected');
        document.querySelector(`.selected-${id}`).classList.add('recipients-list--selected');

        document.querySelector('.messages-body').innerHTML = '';

        axios.post(`/admin/messages/getMessage/${id}`)
            .then(response => {
                let messages = response.data.messages;
                let user = response.data.user;
                this.state.user = user;
                document.querySelector('.messages-body').innerHTML = `
                        <span class="welcome-text">This is the beginning of your conversation with ${user.name}</span>
                    `;
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

    loadInitialMessageBox(id) {
        axios.post(`/admin/messages/getMessage/${id}`)
            .then(response => {
                let messages = response.data.messages;
                let user = response.data.user;
                document.querySelector('.messages-body').innerHTML = `
                        <span class="welcome-text">This is the beginning of your conversation with ${user.name}</span>
                    `;
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
                url: `/admin/messages/sendMessage/${slug}`,
                method: 'get',
                data: { to: slug, text: text },
                success: function(response) {
                    console.log('from sending message', response);
                    axios.post(`/admin/messages/getMessage/${slug}`)
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

    render() {
        const firstRecipient = this.showFirstRecipient();
        const otherRecipients = this.showOtherRecipients();

        return (
            <div className="container-fluid conversation-container" id="app">
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
                                    {this.state.user.name}
                                </span>
                            </div>
                            <hr />
                            <div className="messages-body">
                                { this.loadInitialMessageBox(this.state.user.slug) }
                            </div>
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
            </div>
        );
    }
}

export default Messages;
