import React, { Component } from 'react';
import WeUI from 'react-weui';
const {Msg} = WeUI;

export default class PaySuccess extends Component {
    constructor(props) {
        super(props);
        this.handleOkClick = this.handleOkClick.bind(this);
    }

    handleOkClick() {

    }

    render() {
        return (
            <div className="sl-page">
                <div className="sl-payment-fullpage">
                    <Msg
                        type="success"
                        title="付款成功"
                        description="太棒了！我们将尽快处理您的订单"
                        buttons={[{
                            type: 'primary',
                            label: '查看订单',
                            onClick: () => window.location.replace('//c.couqiao.me/')
                        }, {
                            type: 'default',
                            label: '返回首页',
                            onClick: () => window.location.replace('//m.couqiao.me')
                        }]}
                    />
                </div>
            </div>
        );
    }
}