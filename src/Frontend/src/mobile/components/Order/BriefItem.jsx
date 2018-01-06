import React, { Component } from 'react';
import { Cells, CellHeader, CellBody, Cell, CellFooter } from 'react-weui';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';
import { getValueById } from '../../../common/utils/objectUtil.jsx';

export default class BriefItem extends Component {
    static defaultProps = {
        item: {
            product: {
                picurl: {
                    titlepic: ''
                },
                name: '',
                sellprice: 0
            },
            quantity: 1
        }
    }

    render() {
        return (
            <Cell>
                <CellHeader style={{position: 'relative', marginRight: '10px'}}>
                    <img style={{height: '50px', width: '50px'}} className="sl-cart-item-image" src={this.props.item.product.picurl.titlepic}/>
                </CellHeader>
                <CellBody>
                    <div className="sl-cart-item-desc-title">
                        {this.props.item.product.name}&nbsp;&nbsp;
                        <span className="sl-cart-item-desc-option">(类型: {getValueById(this.props.item.product.skus, this.props.item.sku)})</span>
                    </div>
                    <div className="sl-cart-item-desc-price">
                        <span className="sl-cart-item-desc-price-currency">￥</span>
                        {strToMoney(this.props.item.product.sellprice)}
                        <span className="sl-cart-item-desc-quantity">x{this.props.item.quantity}</span>
                    </div>
                </CellBody>
            </Cell>
        );
    }
}