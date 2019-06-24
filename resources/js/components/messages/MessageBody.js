import React, { Component } from 'react';
import axios from 'axios';

class MessageBody extends Component {
    constructor(props) {
        super(props);
        this.msgListRef = React.createRef();
    }

    componentWillUpdate() {
        const node = this.msgListRef.current;
        this.shouldScrollToBottom = node.scrollTop + node.clientHeight + 100 <= node.scrollHeight;
    }

    componentDidUpdate() {
        if (this.shouldScrollToBottom) {
            const node = this.msgListRef.current;
            node.scrollTop = node.scrollHeight;
        }
    }

    loadInitialMessageBox(id) {
        axios.post(`/messages/getMessage/${id}`)
            .then(response => {
                let messages = response.data.messages;
                let user = response.data.user;
                // this.state.user = user;
                document.querySelector('.messages-wrapper').innerHTML = `
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
                                let sender_div = document.querySelector('.messages-wrapper');
                                sender_div.insertAdjacentHTML('beforeend',
                                    `<div class="sender">
                                            <div class="sender-msg">
                                                <div><span title="${messages[i].time}">${messages[i].text}</span></div>
                                            </div>
                                        </div>`
                                )
                            }
                        } else {
                            let sender_div = document.querySelector('.messages-wrapper');
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
                                let msg_div = document.querySelector('.messages-wrapper');
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
                            let msg_div = document.querySelector('.messages-wrapper');
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

    render() {
        return (
            <div className="messages-body" ref={this.msgListRef}>
                <div className="messages-wrapper">
                    { this.loadInitialMessageBox(this.props.slug) }
                </div>
            </div>
        )
    }
}

export default MessageBody;
