import React, { Component } from 'react';

export default class ContinusButton extends Component {
    render() {
        return (
            <div className="sl-bottom-fixed">
                <a className="sl-bottom-fixed-full-button" onClick={this.props.continus}>保存并继续</a>
            </div>
        );
    }
}