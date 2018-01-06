import React, { Component } from 'react';
import { CellsTitle, Cells, CellHeader, CellBody, Cell, CellFooter } from 'react-weui';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';

export default class TotalPrice extends Component {
    render() {
        return (
            <div>
                <CellsTitle>付款金额</CellsTitle>
                <Cells>
                    <Cell>
                        <CellBody>
                            合计
                        </CellBody>
                        <CellFooter>
                            <div className="sl-payment-price">
                                <span className="sl-payment-price-currency">￥</span>
                                {strToMoney(this.props.total)}
                            </div>
                        </CellFooter>
                    </Cell>
                    <Cell>
                        <CellBody>
                            折扣(优惠券)
                        </CellBody>
                        <CellFooter>
                            <div className="sl-payment-price">
                                -<span className="sl-payment-price-currency">￥</span>
                                {strToMoney(this.props.discount)}
                            </div>
                        </CellFooter>
                    </Cell>
                    <Cell>
                        <CellBody>
                            运费
                        </CellBody>
                        <CellFooter>
                            <div className="sl-payment-price">
                                <span className="sl-payment-price-currency">￥</span>
                                {strToMoney(this.props.logisticfee)}
                            </div>
                        </CellFooter>
                    </Cell>
                    <Cell>
                        <CellBody>
                            应付
                        </CellBody>
                        <CellFooter>
                            <div className="sl-payment-totalprice">
                                <span className="sl-payment-price-currency">￥</span>
                                {strToMoney(
                                    parseInt(this.props.total) 
                                    + parseInt(this.props.logisticfee) 
                                    - parseInt(this.props.discount)
                                )}
                            </div>
                        </CellFooter>
                    </Cell>
                </Cells>
            </div>
        );
    }
}