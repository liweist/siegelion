import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';

import {
    CellsTitle, Cells, Cell, CellHeader, CellBody, CellFooter
} from 'react-weui';
import PayButton from './PayButton.jsx';
import { strToMoney, datetime } from '../../../common/utils/stringUtil.jsx';

import '../../style/orders.css';

class OrderDetail extends Component {
    static defaultProps = {
        response: {
            address: {
                name: '',
                tel: ''
            },
            order: {},
            items: [],
            logistics: []
        }
    }

    componentDidMount() {
        this.props.getOrder(this.props.match.params.id);
    }

    render() {
        return (
            <div className="sl-page">
                <div className="sl-page-header-title">订单详情</div>
                <div style={{paddingBottom: '100px'}}>
                    <CellsTitle></CellsTitle>
                    <Cells>
                        <Cell>
                            <CellBody>
                                <div>{this.props.response.address.name}&nbsp;&nbsp;&nbsp;&nbsp;{this.props.response.address.tel}</div>
                                <div style={{fontSize: '14px', paddingTop: '5px'}}>{this.props.response.address.country}{this.props.response.address.province}{this.props.response.address.city}{this.props.response.address.detail}</div>
                            </CellBody>
                            <CellFooter/>
                        </Cell>
                    </Cells>
                    <CellsTitle></CellsTitle>
                    <Cells>
                        {this.props.response.logistics.map((logistic) => {
                            return (
                                <Cell access onClick={() => this.props.history.push(`/logistic/${logistic.logisticid}`)}>
                                    <CellBody>
                                        <div style={{fontSize: '13px', color: '#999'}}>{datetime(logistic.statusat)}</div>
                                        <div>{logistic.status}</div>
                                    </CellBody>
                                    <CellFooter>
                                        物流详情
                                    </CellFooter>
                                </Cell>
                            );
                        })}
                    </Cells>
                    <CellsTitle></CellsTitle>
                    <Cells>
                    {this.props.response.items.map((item) => {
                        return (
                            <Cell>
                                <CellHeader style={{position: 'relative', marginRight: '10px'}}>
                                    <img style={{height: '50px', width: '50px'}} className="sl-cart-item-image" src={item.product.picurl.titlepic}/>
                                </CellHeader>
                                <CellBody>
                                    <div className="sl-cart-item-desc-title">{item.product.name}</div>
                                    <div className="sl-cart-item-desc-price">
                                        <span className="sl-cart-item-desc-price-currency">￥</span>
                                        {strToMoney(item.product.sellprice)}
                                        <span className="sl-cart-item-desc-quantity">x{item.quantity}</span>
                                    </div>
                                </CellBody>
                            </Cell>
                        );
                    })}
                    </Cells>
                    <CellsTitle></CellsTitle>
                    <Cells>
                        <Cell>
                            <CellBody>
                                <div>订单编号:</div>
                            </CellBody>
                            <CellFooter>{this.props.response.order.ordernumber}</CellFooter>
                        </Cell>
                        <Cell>
                            <CellBody>
                                <div>下单时间:</div>
                            </CellBody>
                            <CellFooter>{datetime(this.props.response.order.createdat)}</CellFooter>
                        </Cell>
                        <Cell style={this.props.response.order.paidat == null ? {display: 'none'} : {display: 'flex'}}>
                            <CellBody>
                                <div>付款时间:</div>
                            </CellBody>
                            <CellFooter>{datetime(this.props.response.order.paidat)}</CellFooter>
                        </Cell>
                    </Cells>
                    <CellsTitle></CellsTitle>
                    <Cells>
                        <Cell>
                            <CellBody>
                                合计
                            </CellBody>
                            <CellFooter>
                                <div className="sl-payment-price">
                                    <span className="sl-payment-price-currency">￥</span>
                                    {strToMoney(this.props.response.order.totalprice)}
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
                                    {strToMoney(this.props.response.order.discount)}
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
                                    {strToMoney(this.props.response.order.logisticfee)}
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
                                        this.props.response.order.totalprice 
                                        + this.props.response.order.logisticfee 
                                        - this.props.response.order.discount
                                    )}
                                </div>
                            </CellFooter>
                        </Cell>
                    </Cells>
                </div>
                <PayButton 
                    show={this.props.response.order.paidat == null}
                    payment={() => window.location.replace(`http://api.couqiao.me/pay/wxpay`)}
                />
            </div>
        );
    }
}

const mapStateToProps = state => ({
    response: state.orderService.response,
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getOrder: actions.order
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(OrderDetail);