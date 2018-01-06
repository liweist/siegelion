import React, { Component } from 'react';

import NumberPanel from '../Common/NumberPanel.jsx';

export default class PurchaseQuantity extends Component {
    static propTypes = {
        getQuantity: React.PropTypes.func.isRequired
    }

    render() {
        return (
            <div className="sl-product-purchase" style={{paddingBottom: '20px'}}>
                <div className="sl-product-purchase-option">
                    <div className="sl-product-purchase-option-title">数量:</div>
                    <NumberPanel name="quantity" initialQuantity={1} getQuantity={this.props.getQuantity}/>
                </div>
            </div>
        );
    }
}