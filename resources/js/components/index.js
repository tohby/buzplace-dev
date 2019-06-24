import React from 'react';
import ReactDOM from 'react-dom';
import Messages from './messages/Messages';
import './messages/Messages.css';

if (document.getElementById('messages')) {
    ReactDOM.render(<Messages />, document.getElementById('messages'));
}
