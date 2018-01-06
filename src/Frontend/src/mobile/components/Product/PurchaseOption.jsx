import React, { Component } from 'react';

import RadioBoxes from '../Common/RadioBoxes.jsx';

export default class PurchaseOption extends Component {
    render() {
        return (
            <div className="sl-product-purchase">
                <div className="sl-product-purchase-option">
                    <div className="sl-product-purchase-option-title">类型:</div>
                    <RadioBoxes name="type" boxes={this.props.skus} handleOnChange={this.props.handleOnChange}/>
                </div>
            </div>
        );
    }
}
