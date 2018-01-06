import React, { Component } from 'react';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

export default class ProductDescription extends Component {
    render() {
        let price = strToMoney(this.props.price);
        return (
            <div className="sl-product-description">
                <div className="sl-product-title">{this.props.name}</div>
                <div className="sl-product-subtitle">{this.props.description}</div>
                <div className="sl-product-price">
                    <span className="sl-product-price-currency">￥</span>
                    <span className="sl-product-price-number">{price}</span>
                </div>
            </div>
        );
    }
}
