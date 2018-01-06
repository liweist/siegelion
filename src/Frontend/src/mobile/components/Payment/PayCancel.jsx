import React, { Component } from 'react';
import WeUI from 'react-weui';
const {Msg} = WeUI;

export default class PayCancel extends Component {
    render() {
        return (
            <div className="sl-page">
                <div className="sl-payment-fullpage">
                    <Msg
                        type="info"
                        title="付款中断"
                        description="不要犹豫，下单吧！"
                        buttons={[{
                            type: 'primary',
                            label: '重新下单',
                            onClick: () => window.location.replace('//api.couqiao.me/pay/wxpay')
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