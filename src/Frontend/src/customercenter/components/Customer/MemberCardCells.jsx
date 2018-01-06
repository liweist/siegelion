import React, { Component } from 'react';
import WeUI from 'react-weui';
const {
    Cell, Cells, CellsTitle, CellHeader, CellBody, CellFooter, Badge
} = WeUI;

export default class MemberCardCells extends Component {
    render() {
        return (
            <Cells>
                <Cell access>
                    <CellBody>我的会员权益</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell access>
                    <CellBody>我的积分</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
                <Cell access>
                    <CellBody>我的优惠券</CellBody>
                    <CellFooter></CellFooter>
                </Cell>
            </Cells>
        );
    }
}