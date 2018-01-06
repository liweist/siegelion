import React, { Component } from 'react';
import { Cells } from 'react-weui';

import CartItem from './CartItem.jsx';
import { getValueById } from '../../../common/utils/objectUtil.jsx';

export default class CartList extends Component {
    static defaultProps = {
        items: []
    }

    render() {
        return (
            <Cells>
                {this.props.items.map((item) => {
                    return (
                        <CartItem 
                            title={item.product.name} 
                            quantity={item.quantity} 
                            option={getValueById(item.product.skus, item.sku)} 
                            picurl={item.product.picurl.titlepic} 
                            unitprice={item.product.sellprice}
                            itemClick={() => this.props.itemClick(item)}
                        />
                    );
                })}
            </Cells>
        );
    }
}