import React, { Component } from 'react';
import WeUI from 'react-weui';
const {Agreement} = WeUI;

export default class Agreements extends Component {
    render() {
        return (
            <Agreement>
            	&nbsp;&nbsp;我同意 <a href="javascript:;">凑巧COUQIAO用户协议</a>
            </Agreement>
        );
    }
}