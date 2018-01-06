import React, { Component } from 'react';
import WeUI from 'react-weui';
const {
    Cell, Cells, CellsTitle, CellHeader, CellBody, CellFooter, Badge
} = WeUI;

export default class MyOrderCells extends Component {
    render() {
        return (
            <Cells>
                <Cell onClick={this.props.openOrders} access>
                    <CellBody>
                        待付款
                    </CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell onClick={this.props.paidOrders} access>
                    <CellBody>
                        待收货
                    </CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell onClick={this.props.closedOrders} access>
                    <CellBody>
                        已完成
                    </CellBody>
                    <CellFooter></CellFooter>
                </Cell>
            </Cells>
        );
    }
}