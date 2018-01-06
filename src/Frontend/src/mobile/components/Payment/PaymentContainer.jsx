import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

import PayButton from './PayButton.jsx';
import PayOption from './PayOption.jsx';
import PayPrice from './PayPrice.jsx';

import '../../style/payment.css';

class PaymentContainer extends Component {
    constructor(props) {
        super(props);
        this.state = {
            gateway: 'wxpay'
        }
    }

    static defaultProps = {
        newOrder: {
            order: {
                totalprice: 0,
                logisticfee: 0,
                discount: 0
            }
        }
    }

    useGateway(gateway) {
        gateway = gateway == undefined ? 'wxpay' : gateway;
        this.setState({gateway: gateway});
    }

    componentDidMount() {
        this.props.createOrder();
    }

    render() {
        return (
            <div className="sl-page">
                <div className="sl-page-header-title">付款概览</div>
                <div className="sl-payment">
                    <PayPrice total={
                        strToMoney(
                            parseInt(this.props.newOrder.order.totalprice) 
                            + parseInt(this.props.newOrder.order.logisticfee) 
                            - parseInt(this.props.newOrder.order.discount)
                        )
                    }/>
                    <PayOption gateway={(gateway) => this.useGateway(gateway)}/>
                </div>
                <PayButton payment={() => window.location.replace(`http://api.couqiao.me/pay/${this.state.gateway}`)}/>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    newOrder: state.orderService.newOrder
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    createOrder: actions.createOrder
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(PaymentContainer);