import React, { Component } from 'react';

export default class PayButton extends Component {
    render() {
        return (
            <div className="sl-bottom-fixed">
                <a className="sl-bottom-fixed-full-button" onClick={this.props.payment}>付款</a>
            </div>
        );
    }
}