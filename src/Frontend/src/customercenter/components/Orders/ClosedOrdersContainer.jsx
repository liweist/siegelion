import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import { Flex, FlexItem } from 'react-weui';

import OrderList from './OrderList.jsx';

class ClosedOrdersContainer extends Component {
    componentDidMount() {
        this.props.getClosedOrders();
    }

    render() {
        return (
            <div>
                <Flex>
                    <FlexItem>
                        <div style={{backgroundColor: '#f5f5f5', fontSize: '25px', padding: '15px'}}>已完成</div>
                    </FlexItem>
                </Flex>
                <OrderList cards={this.props.orders} toDetail={(orderid) => this.props.history.push(`/order/${orderid}`)}/>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    orders: state.orderService.closedOrders
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getClosedOrders: actions.closedOrders
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(ClosedOrdersContainer);