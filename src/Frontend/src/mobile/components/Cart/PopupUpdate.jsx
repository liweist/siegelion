import React, { Component } from 'react';
import {
    Flex, FlexItem, Button, Popup, PopupHeader, 
    Cells, Cell, CellHeader, CellBody, CellFooter, Icon
} from 'react-weui';
import { strToMoney } from '../../../common/utils/stringUtil.jsx';
import { getValueById } from '../../../common/utils/objectUtil.jsx';

import NumberPanel from '../Common/NumberPanel.jsx';

export default class PopupUpdate extends Component {
    render() {
        return (
            <Popup
                show={this.props.popupState}
                onRequestClose={this.props.hide}>
                <PopupHeader
                    left="取消"
                    right="保存修改"
                    leftOnClick={this.props.hide}
                    rightOnClick={() => {
                        this.props.hide();
                        this.props.handleRightOnClick();
                    }}
                />
                <div className="sl-cart-popup-container">
                    <Flex>
                        <FlexItem>
                            <Cells style={{marginTop: 0}}>
                                <Cell>
                                    <CellHeader style={{position: 'relative', marginRight: '10px'}}>
                                        <img className="sl-cart-item-image" src={this.props.item.product.picurl.titlepic}/>
                                    </CellHeader>
                                    <CellBody>
                                        <div className="sl-cart-item-desc-title">
                                            {this.props.item.product.name}&nbsp;&nbsp;
                                            <span className="sl-cart-item-desc-option">(类型: {getValueById(this.props.item.product.skus, this.props.item.sku)})</span>
                                        </div>
                                        <div className="sl-cart-item-desc-price">
                                            <span className="sl-cart-item-desc-price-currency">￥</span>
                                            {strToMoney(this.props.item.product.sellprice)}
                                        </div>
                                    </CellBody>
                                    <CellFooter>
                                        <Icon value="cancel" onClick={this.props.removeCartitem}/>
                                    </CellFooter>
                                </Cell>
                                <Cell>
                                    <CellHeader>
                                        <div>购买数量：</div>
                                    </CellHeader>
                                    <CellBody/>
                                    <CellFooter>
                                        <NumberPanel name="popupQuantity" initialQuantity={this.props.item.quantity} getQuantity={this.props.handleQuantityChange}/>
                                    </CellFooter>
                                </Cell>
                            </Cells>
                        </FlexItem>
                    </Flex>
                </div>
            </Popup>
        );
    }
}