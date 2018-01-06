import React, { Component } from 'react';
import WeUI from 'react-weui';
const {Msg} = WeUI;

export default class PaySuccess extends Component {
    render() {
        return (
            <div className="sl-page">
                <div className="sl-payment-fullpage">
                    <Msg
                        type="warn"
                        title="付款失败"
                        description="请尽快联系我们了解订单状况"
                        buttons={[{
                            type: 'warn',
                            label: '联系客服'
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