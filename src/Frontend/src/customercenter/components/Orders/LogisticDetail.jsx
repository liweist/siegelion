import React, { Component } from 'react';
import { connect } from 'react-redux'
import { bindActionCreators } from 'redux';
import * as actions from '../../../common/actions.jsx';

import {
    Flex, FlexItem, Cells, Cell, CellHeader, CellBody, CellFooter, Badge, LoadMore
} from 'react-weui';

import { datetime } from '../../../common/utils/stringUtil.jsx';

class LogisticDetail extends Component {
    static defaultProps = {
        logisticAndOrder: {
            logistic: {
                status: '',
                statusat: {
                    date: ''
                }
            },
            order: {
                orderid: 0
            }
        },
        logisticTraces: []
    }

    startLogistic() {
        if (this.props.logisticAndOrder.logistic.trackingnumber == null) {
            return false;
        }
        return true;
    }

    componentDidMount() {
        this.props.getLogistic(this.props.match.params.id);
        this.props.getTraces(this.props.match.params.id);
    }

    render() {
        return (
            <div>
                <Flex>
                    <FlexItem>
                        <div style={{backgroundColor: '#f5f5f5', fontSize: '25px', padding: '15px'}}>物流详情</div>
                    </FlexItem>
                </Flex>
                <Flex style={{marginTop: '-20px',paddingBottom: '50px', backgroundColor: '#f5f5f5'}}>
                    <FlexItem>
                        <Cells>
                            <Cell>
                                <CellBody>
                                    <div style={{fontSize: '13px', color: '#999'}}>{datetime(this.props.logisticAndOrder.logistic.statusat)}</div>
                                    <div>{this.props.logisticAndOrder.logistic.status}</div>
                                </CellBody>
                            </Cell>
                        </Cells>
                        <Cells>
                            <Cell>
                                <CellBody>
                                    <div>订单号: {this.props.logisticAndOrder.order.ordernumber}</div>
                                    <div style={this.startLogistic ? {display: 'block'} : {display: 'none'}}>
                                        物流单号: {this.props.logisticAndOrder.logistic.trackingnumber}
                                    </div>
                                    <div>物流公司: {this.props.logisticAndOrder.logistic.company}</div>
                                </CellBody>
                            </Cell>
                        </Cells>
                        <LoadMore loading style={this.props.logisticTraces.length > 0 ? {display: 'none'} : {display: 'block'}}>努力加载中</LoadMore>
                        <Cells style={this.props.logisticTraces.length > 0 ? {display: 'block'} : {display: 'none'}}>
                            {this.props.logisticTraces.map((trace, index) => {
                                return (
                                    <Cell style={index == 0 ? {color: '#f6325b'} : {color: '#000'}}>
                                        <CellHeader style={{position: 'relative', marginRight: '10px'}}>
                                            <Badge dot preset="footer" style={index == 0 ? {backgroundColor: '#f6325b'} : {backgroundColor: '#999'}}/>
                                        </CellHeader>
                                        <CellBody>
                                            <div style={{fontSize: '13px', color: '#999'}}>{trace.AcceptTime}</div>
                                            <div>{trace.AcceptStation}</div>
                                        </CellBody>
                                    </Cell>
                                );
                            })}
                        </Cells>
                    </FlexItem>
                </Flex>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    logisticAndOrder: state.logisticService.logisticAndOrder,
    logisticTraces: state.logisticService.logisticTraces
});

const mapDispatchToProps = (dispatch, ownProps) => bindActionCreators({
    getLogistic: actions.logistic,
    getTraces: actions.logisticTraces
}, dispatch);

export default connect(mapStateToProps, mapDispatchToProps)(LogisticDetail);