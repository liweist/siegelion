import React, { Component } from 'react';
import { Cells, Cell, CellBody, CellHeader } from 'react-weui';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

export default class CartItem extends Component {
    render() {
        let price = strToMoney(this.props.unitprice);
        return (
            <Cell onClick={this.props.itemClick}>
                <CellHeader style={{position: 'relative', marginRight: '10px'}}>
                    <img className="sl-cart-item-image" src={this.props.picurl}/>
                </CellHeader>
                <CellBody>
                    <div className="sl-cart-item-desc-title">
                        {this.props.title}&nbsp;&nbsp;
                        <span className="sl-cart-item-desc-option">(类型: {this.props.option})</span>
                    </div>
                    <div className="sl-cart-item-desc-price">
                        <span className="sl-cart-item-desc-price-currency">￥</span>
                        {price}
                        <span className="sl-cart-item-desc-quantity">x{this.props.quantity}</span>
                    </div>
                </CellBody>
            </Cell>
        );
    }
}