import React, { Component } from 'react';
import {
    Panel, PanelHeader, PanelFooter, PanelBody,
    MediaBox, MediaBoxHeader, MediaBoxBody, MediaBoxTitle, 
    MediaBoxDescription, Cells, Cell, CellBody, CellFooter
} from 'react-weui';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';
import { getValueById } from '../../../common/utils/objectUtil.jsx';

export default class OrderCard extends Component {
    render() {
        let itemCount = this.props.items.length;
        return (
            <Panel onClick={() => this.props.toDetail(this.props.orderid)}>
                <PanelHeader>
                    订单号: {this.props.ordernumber}
                </PanelHeader>
                <PanelBody>
                    <MediaBox type="appmsg">
                        {this.props.items.map((item, index) => {
                            if (index > 3) {
                                return;
                            }
                            return (
                                <MediaBoxHeader><img src={item.product.picurl.titlepic}/></MediaBoxHeader>
                            );
                        })}
                        <MediaBoxBody style={itemCount > 1 ? {display: 'none'} : {display: 'block'}}>
                            <MediaBoxTitle>
                                <span style={{fontSize: '20px'}}>{this.props.items[0].product.name}&nbsp;&nbsp;</span>
                                <span style={{color: '#999', fontSize: '16px'}}>(类型: {getValueById(this.props.items[0].product.skus, this.props.items[0].sku)})</span>
                            </MediaBoxTitle>
                            <MediaBoxDescription>{this.props.items[0].product.description}</MediaBoxDescription>
                        </MediaBoxBody>
                    </MediaBox>
                </PanelBody>
                <PanelFooter>
                    <Cell link>
                        <CellBody></CellBody>
                        <CellFooter>共{itemCount}件商品 实付款: ¥ {strToMoney(this.props.totalprice)}</CellFooter>
                    </Cell>
                </PanelFooter>
            </Panel>
        );
    }
}