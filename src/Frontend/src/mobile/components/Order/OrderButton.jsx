import React, { Component } from 'react';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

export default class OrderButton extends Component {
    render() {
        let total = strToMoney(this.props.total);
        return (
            <div className="sl-bottom-fixed sl-bottom-fixed-row">
                <div className="sl-bottom-fixed-block">
                    <div className="sl-settle">
                        应付: 
                        <span className="sl-settle-price-currency">￥</span>
                        <span className="sl-settle-price">{total}</span>
                    </div>
                </div>
                <a className="sl-bottom-fixed-sm-button" onClick={this.props.order}>提交订单</a>
            </div>
        );
    }
}