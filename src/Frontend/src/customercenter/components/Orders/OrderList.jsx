import React, { Component } from 'react';
import OrderCard from './OrderCard.jsx';

export default class OrderList extends Component {
    static defaultProps = {
        cards: []
    }
    render() {
        return (
            <div style={{paddingBottom: '50px'}}>
                {this.props.cards.map((card) => {
                    return (
                        <OrderCard
                            orderid={card.order.orderid}
                            ordernumber={card.order.ordernumber}
                            totalprice={card.order.totalprice + card.order.logisticfee - card.order.discount}
                            items={card.items}
                            toDetail={this.props.toDetail}
                        />
                    );
                })}
            </div>
        );
    }
}