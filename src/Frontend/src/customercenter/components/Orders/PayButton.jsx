import React, { Component } from 'react';

export default class PayButton extends Component {
    render() {
        return (
            <div className="sl-bottom-fixed" style={!this.props.show ? {display: 'none'} : {display: 'block'}}>
                <a className="sl-bottom-fixed-full-button" onClick={this.props.payment}>付款</a>
            </div>
        );
    }
}