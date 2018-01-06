import React, { Component } from 'react';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

export default class SettleButton extends Component {
    static defaultProps = {
        totalprice: 0
    }

    render() {
        let totalprice = strToMoney(this.props.totalprice);
        return (
            <div className="sl-bottom-fixed sl-bottom-fixed-row">
                <div className="sl-bottom-fixed-block">
                    <div className="sl-settle">
                        合计: 
                        <span className="sl-settle-price-currency">￥</span>
                        <span className="sl-settle-price">{totalprice}</span>
                    </div>
                </div>
                <a className="sl-bottom-fixed-sm-button" onClick={this.props.next}>结算</a>
            </div>
        );
    }
}